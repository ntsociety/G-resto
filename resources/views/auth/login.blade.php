@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        @if (session()->has('error'))
            <div class="alert alert-success">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-center mt-5" style="background-image: url('frontend/images/b2.jpg')">
        <div class="col-md-6 mb-5">
            <div class="card mt-5">
                <div class="card-header text-white" style="background-color: #D10024">Se Connecter</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Addresse Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se rappeler de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Connecter') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe Oublié?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                Vous n'avez pas de compte? 
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('S\'inscrire') }}
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <a href="{{ route('login.google') }}" class="btn btn-danger btn-user text-white">
                                <i class="fab fa-google fa-fw"></i> Se connecter avec Google
                            </a>
                            <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-user text-white mt-2">
                                <i class="fab fa-facebook-f fa-fw"></i> Se connecter avec Facebook
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
