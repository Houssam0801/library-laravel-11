@extends('layout')

@section('title', 'Détails du Message')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📩 Message Détail</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Voici les détails du message envoyé par l'utilisateur.</p>
        </div>

        {{-- Message Details Card --}}
        <div class="card shadow animate__animated animate__fadeInUp">
            <div class="card-header">
                <h5 class="card-title">
                    @if ($message->user_id)
                        {{ $message->user->name }} ({{ $message->user->email }})
                    @else
                        Anonyme ({{ $message->email }})
                    @endif
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $message->objet }}</h6>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $message->content }}</p>
            </div>
        </div>

        {{-- Back to Messages List Button --}}
        <div class="text-center mt-4 animate__animated animate__fadeInUp">
            <a href="{{ route('admin.contactMessages') }}" class="btn btn-secondary shadow">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste des messages
            </a>
        </div>
    </div>
@endsection
