@extends('layout')

@section('title', 'Ajouter catégorie')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📚 Ajouter une Catégorie</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Ajoutez une nouvelle catégorie de livres.</p>
        </div>

        {{-- Create Category Form --}}
        <div class="card shadow animate__animated animate__fadeInUp">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nomcategorie" class="form-label">Nom de la Catégorie</label>
                        <input type="text" name="nomcategorie" id="nomcategorie" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary shadow animate__animated animate__pulse animate__infinite">
                            <i class="fas fa-plus me-2"></i>Créer
                        </button>
                    </div>
                </form>
            </div>
        </div>

         {{-- Back to List Button --}}
         <div class="text-center mt-4 animate__animated animate__fadeInUp">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary shadow">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    </div>
@endsection
