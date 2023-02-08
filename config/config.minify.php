<?php
function preserveEmeddedPHP($string){
global $minificationStore, $singleQuoteSequenceFinder, $doubleQuoteSequenceFinder;
$start_idx = strpos($string, '<?'); //matches both <? and <?php
if (strlen($string)==0){return $string;}
if ($start_idx !== false){
//need to find first end terminator not in quote
$php_len = 2;
while (true){
// start looking for the PHP terminator from the PHP start
$tmp_string = substr($string, $start_idx + $php_len);
$end_php = strpos($tmp_string, '?>');
$end_php = ($end_php !== false ? $end_php+2 : strlen($tmp_string));
// find the closest string
$quote_start = false;
$singleQuoteSequenceFinder->findFirstValue($tmp_string);
$doubleQuoteSequenceFinder->findFirstValue($tmp_string);
if ($singleQuoteSequenceFinder->isValid() &&
(!$doubleQuoteSequenceFinder->isValid() || $singleQuoteSequenceFinder->start_idx < $doubleQuoteSequenceFinder->start_idx)){
$quote_start = $singleQuoteSequenceFinder->start_idx;
$quote_end = $singleQuoteSequenceFinder->end_idx;
} else if ($doubleQuoteSequenceFinder->isValid()){
$quote_start = $doubleQuoteSequenceFinder->start_idx;
$quote_end = $doubleQuoteSequenceFinder->end_idx;
}
// check if end terminator before string declared. If not, start search again after the string declared
if ($quote_start === false || $end_php <= $quote_start){
$php_len += $end_php;
break;
} else{
$php_len += $quote_end;
}
}
// store the found PHP
$php_substr = substr($string, $start_idx, $php_len);
$placeHolder = getNextMinificationPlaceholder();
$newstring = substr($string, 0, $start_idx) . $placeHolder . substr($string, $start_idx+$php_len);
$minificationStore[$placeHolder] = $php_substr;
// search for next emedded PHP to preserve
return preserveEmeddedPHP($newstring);
}
return $string;
}
?>
