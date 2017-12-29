@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="login-page">
   <div class="conatiner">

      <form action="{{ route('auth.auth') }}" method="POST" class="form-login">
         <h2 class="form-login-heading">sign in now</h2>
         {{ csrf_field() }}
         <div class="login-wrap">
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
            <br>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            <label class="checkbox">
               <span class="pull-right">
                  <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
               </span>
            </label>

            <button type="submit" class="btn btn-theme btn-block"><i class="fa fa-lock"></i> SIGN IN</button>
            <hr>
            <div class="login-social-link centered">
               <p>or You can sign in via your social network</p>
               <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"> Facebook</i></button>
               <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"> Twitter</i></button>
            </div>
            <div class="registration">
               Don't have an account yet?
               <br>
               <a href="#">
                  Create an account
               </a>
            </div>
         </div>
      </form>
   </div>
</div>

<!--Modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
            <h4 class="modal-title">Forggot Password ?</h4>
         </div>
         <div class="modal-body">
            <p>Enter Your e-mail address below to rest your password</p>

            <input type="email" name="email" id="email" placeholder="Email"  autofocus class="form-control placeholder-no-fix" />
         </div>
         <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            <button class="btn btn-theme" type="button">Submit</button>
            </div>
         </div>
      </div>
   </div>


   @stop
