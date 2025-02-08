@extends('layout')

@section('title', 'Home')

@section('content')
    <!-- Hero Section with background image and text aligned bottom-right -->
    <section class="hero-section text-right text-white py-5">
        <div class="container">
            <h1 class="display-4 animate__animated animate__fadeIn">Welcome to BookNest</h1>
            <p class="lead animate__animated animate__fadeIn animate__delay-1s">Discover and reserve books from our vast collection.</p>
            <a href="{{ route('tousLivres') }}" class="btn btn-light btn-lg animate__animated animate__fadeIn animate__delay-2s">Explore Books</a>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4 animate__animated animate__fadeIn">Featured Books</h2>
            <div class="row">
                @foreach ($featuredBooks as $book)
                    <!-- Book Card -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 animate__animated animate__fadeIn animate__delay-0.5s customCard">
                            <img src="{{ asset('images/' . $book->image_path) }}" class="card-img-top mx-auto mt-3"
                            alt="{{ $book->nomlivre }}" style="width: 160px; height: 240px; object-fit: cover;">                            <div class="card-body">
                                <h5 class="card-title">{{ $book->nomlivre }}</h5>
                                <p class="card-text">Auteur: {{ $book->nomauteur }}</p>
                                <p class="card-text">{{ Str::words($book->description, 14, '...')  ?? 'Pas de description' }}</p>
                                <a href="{{ route('livre.show', $book->id) }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="animate__animated animate__fadeIn">Join Our Community</h2>
            <p class="animate__animated animate__fadeIn animate__delay-1s">Sign up to get access to exclusive content and updates.</p>
            <a href="{{ route('custom.register') }}" class="btn btn-light btn-lg animate__animated animate__fadeIn animate__delay-2s">Sign Up</a>
        </div>
    </section>
@endsection
