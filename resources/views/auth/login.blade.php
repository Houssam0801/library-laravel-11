@extends('layout')

@section('title', 'Connexion')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Connexion</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Adresse e-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required autofocus placeholder="Entrez votre adresse e-mail">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Entrez votre mot de passe">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i> Se connecter
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('custom.register') }}" class="text-primary">Vous n'avez pas de compte ? Inscrivez-vous ici.</a>
                        <br>
                        <a href="{{ route('password.request') }}" class="text-danger">Mot de passe oublié ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
