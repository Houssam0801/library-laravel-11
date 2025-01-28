@extends('layout')

@section('title', 'Home')

@section('content')
<div class="mt-5">
    <div class="text-center mb-5">
        <h1 class="display-4">Bienvenue à la Bibliothèque Électronique</h1>
        <p class="lead">Découvrez et réservez des livres facilement depuis notre collection.</p>
    </div>

    <!-- Search Section -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Recherchez un livre...">
                    <button class="btn btn-primary" type="submit">Chercher</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h3 class="mb-3">Catégories Populaires</h3>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <button class="btn btn-outline-primary">Roman</button>
                <button class="btn btn-outline-primary">Science</button>
                <button class="btn btn-outline-primary">Histoire</button>
                <button class="btn btn-outline-primary">Art</button>
                <button class="btn btn-outline-primary">Technologie</button>
            </div>
        </div>
    </div>

    <!-- Book Collection Section -->
    <div class="row">
        <!-- Book Card Example -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Livre1">
                <div class="card-body">
                    <h5 class="card-title">Titre du Livre</h5>
                    <p class="card-text">Auteur: Auteur Exemple</p>
                    <p class="card-text">Description courte du livre pour attirer l'attention.</p>
                    <button class="btn btn-success">Réserver</button>
                </div>
            </div>
        </div>

        <!-- Duplicate this block for more books -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Livre2">
                <div class="card-body">
                    <h5 class="card-title">Titre du Livre 2</h5>
                    <p class="card-text">Auteur: Auteur Exemple 2</p>
                    <p class="card-text">Une autre description courte.</p>
                    <button class="btn btn-success">Réserver</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Livre3">
                <div class="card-body">
                    <h5 class="card-title">Titre du Livre 3</h5>
                    <p class="card-text">Auteur: Auteur Exemple 3</p>
                    <p class="card-text">Encore une autre description.</p>
                    <button class="btn btn-success">Réserver</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 text-center">
            <h3>Abonnez-vous à notre Newsletter</h3>
            <p>Recevez les dernières nouvelles et mises à jour directement dans votre boîte mail.</p>
            <form class="mt-3">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Entrez votre email">
                    <button class="btn btn-primary" type="submit">S'abonner</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="mt-5 py-4 text-center bg-light">
        <p class="mb-0">&copy; 2025 Bibliothèque Électronique. Tous droits réservés.</p>
        <p>Suivez-nous sur :
            <a href="#" class="text-primary">Facebook</a> |
            <a href="#" class="text-primary">Twitter</a> |
            <a href="#" class="text-primary">Instagram</a>
        </p>
    </footer>
</div>
@endsection
