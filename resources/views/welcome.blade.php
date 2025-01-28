@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <!-- Hero Section -->
    <div class="jumbotron text-center bg-primary text-white">
        <h1 class="display-4">Welcome to Our Website!</h1>
        <p class="lead">Your one-stop solution for all your needs.</p>
        <a class="btn btn-light btn-lg" href="#features" role="button">Learn more</a>
    </div>

    <!-- Features Section -->
    <div id="features" class="row text-center mb-5">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Feature One</h5>
                    <p class="card-text">Description of feature one goes here. This is a brief overview of what this feature offers.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Feature Two</h5>
                    <p class="card-text">Description of feature two goes here. This is a brief overview of what this feature offers.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Feature Three</h5>
                    <p class="card-text">Description of feature three goes here. This is a brief overview of what this feature offers.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <h2 class="text-center mb-4">What Our Clients Say</h2>
    <div id="testimonials" class="row">
        <div class="col-md-6">
            <blockquote class="blockquote text-center">
                <p>"This service is fantastic! Highly recommend to everyone."</p>
                <footer class="blockquote-footer">Client Name, <cite title="Source Title">Company Name</cite></footer>
            </blockquote>
        </div>
        <div class="col-md-6">
            <blockquote class="blockquote text-center">
                <p>"A wonderful experience from start to finish."</p>
                <footer class="blockquote-footer">Client Name, <cite title="Source Title">Company Name</cite></footer>
            </blockquote>
        </div>
    </div>
</div>

@endsection
