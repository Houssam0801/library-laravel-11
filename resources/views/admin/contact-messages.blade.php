@extends('layout')

@section('title', 'Messages de Contact')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📩 Liste des Messages de Contact</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Gérez les messages envoyés par les utilisateurs.</p>
        </div>

        {{-- Success Alert --}}
        @if (session('success'))
            <div class="alert alert-success text-center animate__animated animate__fadeIn">
                {{ session('success') }}
            </div>
        @endif

        {{-- Check if there are no messages --}}
        @if($contactMessages->isEmpty())
            <div class="alert alert-warning text-center animate__animated animate__fadeIn mt-5">
                Aucuns messages de contact disponibles pour le moment.
            </div>
        @else
            {{-- Contact Messages List --}}
            <div class="mt-4">
                @foreach ($contactMessages as $message)
                    <div class="card mb-4 shadow animate__animated animate__fadeInUp">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                @if ($message->user_id)
                                    {{ $message->user->name }} ({{ $message->user->email }})
                                @else
                                    Anonyme ({{ $message->email }})
                                @endif
                            </h5>
                            <span class="text-muted">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $message->objet }}</h6>
                            <p class="card-text">{{ $message->content }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('contact.show', $message->id) }}" class="btn btn-info btn-sm shadow me-2">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('contact.delete', $message->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Pagination --}}
        {{ $contactMessages->links() }}
    </div>
@endsection
