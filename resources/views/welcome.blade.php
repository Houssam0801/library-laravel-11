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
                <!-- Book Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 animate__animated animate__fadeIn animate__delay-0.5s customCard">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book 1">
                        <div class="card-body">
                            <h5 class="card-title">Book Title 1</h5>
                            <p class="card-text">Author: Author Name</p>
                            <p class="card-text">A brief description of the book.</p>
                            <a href="#" class="btn btn-primary">Reserve</a>
                        </div>
                    </div>
                </div>
                <!-- Book Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 animate__animated animate__fadeIn animate__delay-1s customCard">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book 2">
                        <div class="card-body">
                            <h5 class="card-title">Book Title 2</h5>
                            <p class="card-text">Author: Author Name</p>
                            <p class="card-text">A brief description of the book.</p>
                            <a href="#" class="btn btn-primary">Reserve</a>
                        </div>
                    </div>
                </div>
                <!-- Book Card 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 animate__animated animate__fadeIn animate__delay-1.5s customCard">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book 3">
                        <div class="card-body">
                            <h5 class="card-title">Book Title 3</h5>
                            <p class="card-text">Author: Author Name</p>
                            <p class="card-text">A brief description of the book.</p>
                            <a href="#" class="btn btn-primary">Reserve</a>
                        </div>
                    </div>
                </div>
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
