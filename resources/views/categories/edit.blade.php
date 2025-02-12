@extends('layout')

@section('title', 'Modifier catégorie')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📚 Modifier la Catégorie</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Modifiez les détails de la catégorie.</p>
        </div>

        {{-- Edit Category Form --}}
        <div class="card shadow animate__animated animate__fadeInUp">
            <div class="card-body">
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nomcategorie" class="form-label">Nom de la Catégorie</label>
                        <input type="text" name="nomcategorie" id="nomcategorie" class="form-control" value="{{ old('nomcategorie', $category->nomcategorie) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success shadow animate__animated animate__pulse animate__infinite">
                            <i class="fas fa-save me-2"></i>Mettre à jour
                        </button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary shadow">
                            <i class="fas fa-times me-2"></i>Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
