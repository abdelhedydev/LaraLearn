@extends('layouts.app')

@section('content')
<section class="section">
  <h3>Rgister</h3>

                      <form class="form" method="POST" action="{{ route('register') }}">
                          {{ csrf_field() }}

                          <div class="{{ $errors->has('name') ? ' has-error' : '' }} field">
                              <label for="name" class="">Name</label>

                              <div class="field">
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} field">
                              <label for="email" class="">E-Mail Address</label>

                              <div class="field">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} field">
                              <label for="password" class="">Password</label>

                              <div class="field">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="field">
                              <label for="password-confirm" class="">Confirm Password</label>

                              <div class="">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                              </div>
                          </div>

                          <div class="field">
                              <div class="">
                                  <button type="submit" class="ui green button">
                                      Register
                                  </button>
                              </div>
                          </div>
                      </form>
</div>
</section>
@endsection
