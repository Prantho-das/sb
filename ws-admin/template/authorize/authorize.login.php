<div class="card-body">
<form name="form" onsubmit="return validateFormOnSubmit(this)" class="form" action="#" id="loginForm">
<div class="form-group mb-3 text-center">
<p id="result" class="results"></p>
</div>
<div class="form-group mb-3">
<label>Email Address</label>
<div class="input-group">
<input name="userEmail_address" type="email" class="form-control form-input-custome" placeholder="Email Address"   required/>
<span class="input-group-text">
<i class="bx bx-user text-4"></i>
</span>
<p class="help-block text-danger"></p>
</div>
</div>
<div class="form-group mb-3">
<div class="clearfix">
<label class="float-left">Password</label>
<a href="password" class="float-end font-size-11">Lost Password ?</a>
</div>
<div class="input-group">
<input name="passwordLogs" id="password" type="password" class="form-control form-input-custome" placeholder="Password"  required/>
<span class="input-group-text">
<i class="bx bx-lock text-4"></i>
</span>
<p class="help-block text-danger"></p>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="checkbox-custom checkbox-default">
<input id="RememberMe" name="rememberme" type="checkbox"/>
<label for="RememberMe">Remember Me</label>
</div>
</div>
<div class="col-sm-8 text-end">
<button type="submit" class="btn btn-primary form-btn-runded mt-4 submit">Sign In</button>
</div>
</div>
<span class="mt-3 mb-3 line-thru text-center text-uppercase">
<span>or</span>
</span>
<div class="mb-1 text-center">
<a class="btn btn-facebook mb-3 ms-1 me-1" href="#">Connect with <i class="fab fa-facebook-f"></i></a>
<a class="btn btn-twitter mb-3 ms-1 me-1" href="#">Connect with <i class="fab fa-twitter"></i></a>
</div>
<p class="text-center font-size-11">Don't have an account yet ?</p>
</form>
</div>
