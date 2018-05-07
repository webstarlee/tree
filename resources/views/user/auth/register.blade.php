@extends('layouts.appAuth')
@section('title')
join
@endsection
@section('content')
    <div class="m-login__signin">
        <div class="m-login__head">
            <h3 class="m-login__title">
                Sing Up
            </h3>
        </div>
        <form class="m-login__form m-form" action="{{route('register')}}" method="post" style="margin: 2rem 0 4rem 0;">
            <div class="form-group m-form__group">
                <input type="text" class="form-control m-input" name="username" placeholder="Username*" aria-describedby="basic-addon1">
            </div>
            <div class="form-group m-form__group">
                <input type="text" class="form-control m-input" name="first_name" placeholder="First name*" aria-describedby="basic-addon1">
            </div>
            <div class="form-group m-form__group">
                <input type="text" class="form-control m-input" name="last_name" placeholder="Last name*" aria-describedby="basic-addon1">
            </div>
            <div class="form-group m-form__group">
                <input type="email" class="form-control m-input" name="email" placeholder="Email*" aria-describedby="basic-addon1">
            </div>
            <div class="form-group m-form__group">
                <input type="password" class="form-control m-input" id="confirm_password" name="password" placeholder="Password*" aria-describedby="basic-addon1">
            </div>
            <div class="form-group m-form__group">
                <input type="password" class="form-control m-input" name="password_confirmation" placeholder="Confirm Password*" aria-describedby="basic-addon1">
            </div>
			<div class="row form-group m-form__group m-login__form-sub">
				<div class="col m--align-left">
					<label class="m-checkbox m-checkbox--focus">
						<input type="checkbox" name="agree">
						I Agree the
						<a href="{{route('term')}}" target="_blank" class="m-link m-link--focus">
							terms and conditions
						</a>
						.
						<span></span>
					</label>
					<span class="m-form__help"></span>
				</div>
			</div>
			<div class="m-login__form-action">
				<a href="{{route('login')}}" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                    <span>
						<span>
							Go Login
						</span>
					</span>
				</a>
                <button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
					Submit
				</button>
			</div>
		</form>
    </div>
@endsection
