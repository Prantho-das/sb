<?php
ob_start("minifier");
function minifier($code){
$search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s','/<!--(.|\s)*?-->/');
$replace = array('>', '<', '\\1');
$code = preg_replace($search, $replace, $code);
return $code;
}
function minify_html($html)
{
$search = array('/(\n|^)(\x20+|\t)/','/(\n|^)\/\/(.*?)(\n|$)/','/\n/','/\<\!--.*?-->/','/(\x20+|\t)/');
$replace = array("\n","\n"," ",""," ","><","$1>","=$1");
$html = preg_replace($search,$replace,$html);
return $html;
}
function minifyPHP($html){
global $minificationStore;
$html_special_chars = array(
new RegexSequenceFinder('javascript', "/<\s*script(?:[^>]*)>(.*?)<\s*\/script\s*>/si"), // javascript, can have type attribute
new RegexSequenceFinder('css', "/<\s*style(?:[^>]*)>(.*?)<\s*\/style\s*>/si"), // css, can have type/media attribute
new RegexSequenceFinder('pre', "/<\s*pre(?:[^>]*)>(.*?)<\s*\/pre\s*>/si") // pre
);
$html = preserveEmeddedPHP($html);
// pull out everything that needs to be pulled out and saved
while ($sequence = getNextSpecialSequence($html, $html_special_chars)){
$placeholder = getNextMinificationPlaceholder();
$quote = substr($html, $sequence->start_idx, $sequence->end_idx - $sequence->start_idx);
// subsequence (css/javascript/pre) needs special handeling, tags can still be minimized using minifyPHP
$sub_start = $sequence->sub_start_idx- $sequence->start_idx;
$sub_end = $sub_start + strlen($sequence->sub_match);
switch ($sequence->type){
case 'javascript':
$quote = minifyPHP(substr($quote, 0, $sub_start)) . minifyJavascript($sequence->sub_match) . minifyPHP(substr($quote, $sub_end));
break;
case 'css':
$quote = minifyPHP(substr($quote, 0, $sub_start)) . minifyCSS($sequence->sub_match) . minifyPHP(substr($quote, $sub_end));
break;
default: // strings that need to be preservered, e.g. between <pre> tags
$quote = minifyPHP(substr($quote, 0, $sub_start)) . $sequence->sub_match . minifyPHP(substr($quote, $sub_end));
}
$minificationStore[$placeholder] = $quote;
$html = substr($html, 0, $sequence->start_idx) . $placeholder . substr($html, $sequence->end_idx);
}
// condense white space
$html = preg_replace(
array('/\s+/', '/<\s+/', '/\s+>/'),
array(' ', '<', '>'),
$html);
// remove comments
$html = preg_replace('/<!--([^-](?!(->)))*-->/', '', $html);
// put back the preserved strings
foreach($minificationStore as $placeholder => $original){
$html = str_replace($placeholder, $original, $html);
}
return trim($html);
}
?>
