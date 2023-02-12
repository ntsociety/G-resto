@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header text-white " style="background-color: #D10024">{{ __('S\'inscrire') }}</div>

                <div class="card-body text-white" style="background-image: url('frontend/images/b2.jpg')">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name">{{ __('Nom') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Votre Nom">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">{{ __('Prénom') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"autocomplete="last_name" autofocus placeholder="Votre prénom">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone">{{ __(' Téléphone') }}</label>
                                <input id="number" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Votre Numero de téléphone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="address" >{{ __(' Addresse Locale') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"autocomplete="address" autofocus placeholder="Addresse locale">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <div class="col-md-6">
                                <label for="avatar">Photo de profile ( Facultatif)</label>
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> --}}
                            <div class="col-md-12">
                                <label for="email">{{ __('Addresse Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Votre Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password">{{ __('Mot de pass') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" >{{ __('Confirmer mot de passe') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer le mot de passe">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <button type="submit" class="btn btn-primary btn-user text-white mt-2">
                                {{ __('Inscrit') }}
                            </button>
                            <p>Vous avez déjà un compte?
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm text-white mt-2">
                                   Connecter
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
