@extends('layouts.front')
@section('title')
    Bienvenue sur Dtech Resto
@endsection
@section('content')

<div class="container mt-5">
    <div class="col-md-12">
        <div class="row">

            <div class="col-lg-8 float-end">
                @guest
                <div class="row ">
                    <div class="col-md-12 float-end">
                        <div class="card  text-white mb-5 mt-5" style="background-image: url('frontend/images/b2.jpg')">
                            <div class="card-header bg-primary text-white">{{ __('Envoyer Nous Un Message') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ url('contactstore') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="row mb-3">
                                        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                        <div class="col-md-6">
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus placeholder="Prénom">

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __(' Téléphone') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Téléphone">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Addresse Email') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="sujet" class="col-md-4 col-form-label text-md-end">{{ __('Sujet') }}</label>

                                        <div class="col-md-6">
                                            <input id="sujet" type="text" class="form-control @error('sujet') is-invalid @enderror" name="sujet" value="{{ old('sujet') }}" required autocomplete="sujet" autofocus placeholder="Sujet">

                                            @error('sujet')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="message" class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>

                                        <div class="col-md-6">
                                            <textarea type="text" row="3" class="form-control @error('message') is-invalid @enderror" name="message" required autofocus placeholder="Votre message"></textarea>
                                            
                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Envoyer') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="card text-white mb-5 mt-5" style="background-image: url('frontend/images/b2.jpg')">
                            <div class="card-header bg-primary">{{ __('Envoyer Nous Un Message') }}</div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('contactstore') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="row mb-3">
                                        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                        <div class="col-md-6">
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" autocomplete="last_name" autofocus placeholder="Prénom">

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __(' Téléphone') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus placeholder="Téléphone">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Addresse Email') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="sujet" class="col-md-4 col-form-label text-md-end">{{ __('Sujet') }}</label>

                                        <div class="col-md-6">
                                            <input id="sujet" type="text" class="form-control @error('sujet') is-invalid @enderror" name="sujet" value="{{ old('sujet') }}" required autocomplete="sujet" autofocus placeholder="Sujet">

                                            @error('sujet')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="message" class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>

                                        <div class="col-md-6">
                                            <textarea type="text" row="3" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="message" autofocus placeholder="Votre message"></textarea>

                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Envoyer') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                @endguest
            </div>
            <div class="col-md-4 float-start mb-5" style="margin-top: 100px;">
                @foreach ($admin as $item)
                <div class="card pl-5 shadow">
                    <h3 class="text-center text-borde text-success"> Informations Administrateur :</h3>
                    <div class="card-title p-4">
                        <h4>Nom : {{ $item->name }}</h4>
                        <h3>Téléphne : +228 {{ $item->phone }}</h3>
                        <h3>Email : {{ $item->email }}</h3>
                        <span>Addresse : {{ $item->address }}</span>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection

