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
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark text-center">
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
                                <a href="{{ route('categories.show', $category) }}" class="btn btn-info"><i
                                        class="lni lni-eye"></i></a>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning"><i
                                        class="lni lni-hammer"></i></a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette categorie ?')"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $categories->links() }}

    </div>
@endsection
