@extends('layout')

@section('title', 'Liste des livres')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📚 Liste des Livres</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Gérez les livres disponibles.</p>
        </div>

        {{-- Create Book Button --}}
        <div class="text-center mb-4 animate__animated animate__fadeInLeft">
            <a href="{{ route('livres.create') }}" class="btn btn-primary shadow animate__animated animate__pulse animate__infinite">
                <i class="fas fa-plus me-2"></i>Créer un Nouveau Livre
            </a>
        </div>

        {{-- Success Alert --}}
        @if (session('success'))
            <div class="alert alert-success text-center animate__animated animate__fadeIn">
                {{ session('success') }}
            </div>
        @endif

        {{-- Books Table --}}
        <div class="table-responsive animate__animated animate__fadeInUp">
            <table class="table table-bordered table-hover shadow">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Cover</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Date de Publication</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livres as $livre)
                        <tr class="animate__animated animate__fadeIn">
                            <td class="align-middle">{{ $livre->id }}</td>
                            <td class="align-middle">
                                @if ($livre->image_path)
                                    <img src="{{ asset('images/' . $livre->image_path) }}" alt="{{ $livre->nomlivre }}"
                                         style="width: 75px; height: 100px;">
                                @endif
                            </td>
                            <td class="align-middle">{{ $livre->nomlivre }}</td>
                            <td class="align-middle">{{ $livre->nomauteur }}</td>
                            <td class="align-middle">{{ $livre->date_pub }}</td>
                            <td class="align-middle">
                                {{ $livre->categorie->nomcategorie ?? 'Pas de catégorie' }}
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('livres.show', $livre) }}" class="btn btn-info btn-sm shadow me-2"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning btn-sm shadow me-2"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('livres.destroy', $livre) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4 animate__animated animate__fadeInUp">
            {{ $livres->links() }}
        </div>
    </div>
@endsection
