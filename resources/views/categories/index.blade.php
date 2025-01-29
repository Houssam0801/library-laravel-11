@extends('layout')

@section('title', 'Liste des catégories')

@section('content')
    <div class="container">
        <h1>Catégories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Créer une Nouvelle Catégorie</a>
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->nomcategorie }}</td>
                        <td>{{ $category->description ?? 'Pas de description' }}</td>

                        <td>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
