@extends('layouts.app')

@section('content')
<div class=" ui container">
                      @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="ui form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                                <button type="submit" class="ui  button">
                                  <i class="ui mail icon"></i>
                                    Send Password Reset Link
                                </button>
                        </div>
                    </form>

</div>
@endsection
