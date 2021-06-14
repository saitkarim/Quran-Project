@extends('menu')

@section('head')
    
@endsection

@section('title')
{{ __('lang.sign_up') }}
@endsection

@section('main_content')
    <div class="row" style="margin-top: 45px">
        <div class="col-md-4 col-md-offset-4" style=" margin-left: 400px">
            <h2>{{ __('lang.register') }}</h2>
            <form action="{{ route('auth.save') }}" method="POST">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="">{{ __('lang.name') }}</label>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('lang.your_name') }}" value="{{ old('name') }}">
                    <span class="text-danger">
                        @error('name')
                            {{ $message  }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">{{ __('lang.email') }}</label>
                    <input type="text" name="email" class="form-control" placeholder="{{ __('lang.your_email_address') }}" value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message  }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">{{ __('lang.password') }}</label>
                    <input type="password" name="password" class="form-control">
                    <span class="text-danger">
                        @error('password')
                            {{ $message  }}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-block btn-primary">{{ __('lang.sign_up') }}</button><br>
                <a href="{{ route('auth.login') }}">{{ __('lang.already_have_login') }}</a>
            </form>
        </div>
    </div>
@endsection