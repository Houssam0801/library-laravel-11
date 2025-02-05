@extends('layout')

@section('title', 'Liste des livres')

@section('content')
    <div class="container">
        <h1>Livres</h1>
        <a href="{{ route('livres.create') }}" class="btn btn-primary mb-3">Créer un Nouveau Livre</a>
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
                        <th>Cover</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        {{-- <th>Description</th> --}}
                        <th>Date de Publication</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livres as $livre)
                        <tr>
                            <td class="align-middle">{{ $livre->id }}</td>
                            <td class="align-middle">
                                @if ($livre->image_path)
                                    <img src="{{ asset('images/' . $livre->image_path) }}" alt="{{ $livre->nomlivre }}"
                                        style="width: 75px; height: 100px;">
                                @endif
                            </td>
                            <td class="align-middle">{{ $livre->nomlivre }}</td>
                            <td class="align-middle">{{ $livre->nomauteur }}</td>
                            {{-- <td class="align-middle">{{ Str::words($livre->description, 10, '...')  ?? 'Pas de description' }}</td> --}}
                            <td class="align-middle">{{ $livre->date_pub }}</td>
                            {{-- <td class="align-middle">{{ \Carbon\Carbon::parse($livre->date_pub)->format('d/m/Y') }}</td> --}}
                            <td class="align-middle">
                                {{ $categories[$livre->categorie_id]->nomcategorie ?? 'Pas de catégorie' }}
                            </td>

                            <td class="align-middle">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('livres.show', $livre) }}" class="btn btn-info"><i
                                            class="lni lni-eye"></i></a>
                                    <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning"><i
                                            class="lni lni-hammer"></i></a>
                                    <form action="{{ route('livres.destroy', $livre) }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">X</button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $livres->links() }}

    </div>
@endsection
