@extends('layouts.app')

@section('content')

<div class="container">
  <form class="ui form" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
  <div class="field">
    <label class="label">Email</label>
    <div class="control">
      <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus>

      @if ($errors->has('email'))
              <p class="help is-danger">{{ $errors->first('email') }}</p>
      @endif    </div>
  </div>

  <div class="field">
    <label class="label">Password</label>
    <div class="control">
      <input id="password" type="password" class="form-control" name="password" required>

      @if ($errors->has('password'))
              <p class="help is-danger">{{ $errors->first('password') }}</p>
      @endif    </div>
  </div>



  <button type="submit" class="button is-primary">
      Login
  </button>

  <a class=" " href="{{ route('password.request') }}">
      Forgot Your Password?
  </a>
</div>
</form>
@endsection
