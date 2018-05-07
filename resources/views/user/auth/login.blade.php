@extends('layouts.appAuth')
@section('title')
join
@endsection
@section('content')
    <div class="m-login__signin">
        <div class="m-login__head">
            <h3 class="m-login__title">
                Login
            </h3>
        </div>
        <form class="m-login__form m-form" action="{{route('login')}}">
            <div class="form-group m-form__group">
                <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
            </div>
            <div class="row m-login__form-sub">
                <div class="col m--align-left m-login__form-left">
                    <label class="m-checkbox  m-checkbox--light" style="color: #fff;">
                        <input type="checkbox" name="remember">
                        Remember me
                        <span></span>
                    </label>
                </div>
                <div class="col m--align-right m-login__form-right">
                    <a href="javascript:;" id="m_login_forget_password" class="m-link" style="color: #fff;">
                        Forget Password ?
                    </a>
                </div>
            </div>
            <div class="m-login__form-action">
                <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                    Log In
                </button>
            </div>

            <div class="m-login__account">
				<span class="m-login__account-msg">
					Don't have an account yet ?
				</span>
				&nbsp;&nbsp;
				<a href="{{route('register')}}" class="m-link m-link--focus m-login__account-link">
					Sign Up
				</a>
			</div>
        </form>
    </div>
@endsection
