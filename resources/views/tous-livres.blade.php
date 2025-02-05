@extends('layout')

@section('title', 'Livres')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-5">
            @if (@session('success'))
            <div class="alert alert-success text-center" role="alert">
                {{session('success')}}
            </div>
                
            @endif
            <h1 class="display-4">Bienvenue à la Bibliothèque Électronique</h1>
            <p class="lead">Découvrez et réservez des livres facilement depuis notre collection.</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <form action="{{ route('tousLivres') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Recherchez un livre..."
                            value="{{ request('search') }}">
                        <select name="categorie" class="form-select">
                            <option value="">Toutes les catégories</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}"
                                    {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->nomcategorie }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Chercher</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Books Listing -->
        <div class="row">
            @foreach ($livres as $livre)
            <div class="col-md-4 mb-4">
                <div class="card h-100 animate__animated animate__fadeIn animate__delay-0.5s text-center customCard">
                    <img src="{{ asset('images/' . $livre->image_path) }}" class="card-img-top mx-auto mt-3"
                        alt="{{ $livre->nomlivre }}" style="width: 160px; height: 240px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $livre->nomlivre }}</h5>
                        <p class="card-text"><strong>Auteur:</strong> {{ $livre->nomauteur }}</p>
                        <p class="card-text"><strong>Catégorie:</strong> {{ $livre->categorie->nomcategorie }}</p>
                        <a href="{{ route('livre.show', $livre->id) }}" class="btn btn-primary">Voir plus</a>
                        @auth
                            <a href="{{ route('livre.reserver', $livre->id) }}" class="btn btn-success">Réserver</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-warning">Connectez-vous pour réserver</a>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $livres->links() }}
    </div>
@endsection
