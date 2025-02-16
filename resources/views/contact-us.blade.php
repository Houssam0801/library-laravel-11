@extends('layout')

@section('title', 'Contactez-nous')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header text-white text-center bg-primary rounded-top-4">
                <h2 class="mb-0">📬 Contactez-nous</h2>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-12">
                        <h2 class="fw-bold text-primary">Nous serions ravis de recevoir vos commentaires ou questions.</h2>
                        <form action="{{ route('contactSend') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ Auth::check() ? Auth::user()->email : old('email') }}"
                                    {{ Auth::check() ? 'disabled' : '' }} required>
                            </div>

                            <div class="mb-3">
                                <label for="objet" class="form-label">Objet</label>
                                <input type="text" name="objet" id="objet" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Message</label>
                                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-success fw-bold">Envoyer le message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Retour Button -->
        <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-secondary fw-bold rounded-3">
                ⬅️ Retour à l'accueil
            </a>
        </div>
    </div>
@endsection
