@extends('layout')

@section('title', 'Inscription')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Inscription</h4>
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

                    <form method="POST" action="{{ route('custom.register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Entrez votre nom">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Adresse e-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="Entrez votre adresse e-mail">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Entrez un mot de passe">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-bold">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Confirmez le mot de passe">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-user-plus"></i> S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('custom.login') }}" class="text-primary">Vous avez déjà un compte ? Connectez-vous ici.</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
