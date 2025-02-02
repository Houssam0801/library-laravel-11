@extends('layout')

@section('title', 'Détails du Livre')

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
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('images/' . $livre->image_path) }}" class="img-fluid" alt="{{ $livre->nomlivre }}"
                    style="width: 370px; height: 450px;">
            </div>
            <div class="col-md-8">
                <h1>{{ $livre->nomlivre }}</h1>
                <p><strong>Auteur:</strong> {{ $livre->nomauteur }}</p>
                <p><strong>Catégorie:</strong> {{ $livre->categorie->nomcategorie }}</p>
                <p><strong>Description:</strong> {{ $livre->description }}</p>
                <p><strong>Date de publication:</strong> {{ $livre->date_pub }}</p>

                @auth
                    <a href="{{ route('livre.reserver', $livre->id) }}" class="btn btn-success">Réserver</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning">Connectez-vous pour réserver</a>
                @endauth
            </div>
        </div>
    </div>
@endsection
