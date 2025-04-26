@extends('layouts.frontend')
@section('content')
    <!-- Hero Section -->
    <section class="text-center bg-light p-5">
        <div class="container">
            <h1 class="display-5 fw-bold text-success">
                Welcome to Healthy Habitat Network
            </h1>
            <p class="lead">
                Connecting communities with sustainable health and wellness options.
            </p>
            <a href="#register" class="btn btn-success px-4">Join the Movement</a>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="container my-5">
        <h2 class="text-success text-center mb-4">Our Mission</h2>
        <p class="text-center">
            We’re a non-profit platform empowering individuals and families to live
            healthier, more sustainable lives by connecting them with eco-conscious
            businesses offering health, wellness, and sustainable living solutions.
        </p>
    </section>

    <!-- Services Section -->
    <section id="services" class="bg-white py-5">
        <div class="container">
            <h2 class="text-center text-success mb-4">
                Health & Wellness Services
            </h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-success">Nutrition Counseling</h5>
                            <p class="card-text">
                                Get personalized meal plans and expert guidance.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-success">Yoga & Meditation</h5>
                            <p class="card-text">
                                Improve mental and physical health through mindfulness.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-success">Eco-Friendly Cleaning</h5>
                            <p class="card-text">
                                Non-toxic cleaning services for a greener home.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Voting Section -->
    <section id="vote" class="container py-5 text-center">
        <h2 class="text-success">What Do You Care About Most?</h2>
        <p>
            Explore products and services and cast your votes to bring them to your
            community!
        </p>
        <a href="register.html" class="btn btn-outline-success">Vote Now</a>
    </section>

    <!-- Testimonials Section -->
    <section class="container my-5">
        <h2 class="text-center text-success mb-4">What Our Users Are Saying</h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img
                        src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=800&q=80"
                        alt="User Avatar"
                        class="review-avatar"
                    />
                    <h5 class="fw-bold">Sarah Johnson</h5>
                    <p>
                        "This platform helped me discover so many local, healthy options
                        for my lifestyle. I love the variety of services!"
                    </p>
                </div>
                <div class="swiper-slide">
                    <img
                        src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=800&q=80"
                        alt="User Avatar"
                        class="review-avatar"
                    />
                    <h5 class="fw-bold">James Smith</h5>
                    <p>
                        "I’ve been able to maintain a sustainable living thanks to the
                        businesses listed here. So glad I found it!"
                    </p>
                </div>
                <div class="swiper-slide">
                    <img
                        src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=800&q=80"
                        alt="User Avatar"
                        class="review-avatar"
                    />
                    <h5 class="fw-bold">Emily Green</h5>
                    <p>
                        "The services available here have really improved my mental and
                        physical well-being. Highly recommend!"
                    </p>
                </div>
                <div class="swiper-slide">
                    <img
                        src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=800&q=80"
                        alt="User Avatar"
                        class="review-avatar"
                    />
                    <h5 class="fw-bold">David White</h5>
                    <p>
                        "I’ve been using the meal delivery services and yoga classes
                        through this platform for months, and I feel great!"
                    </p>
                </div>
            </div>

            <!-- Swiper Controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Call to Action Footer -->
    <section class="bg-success text-white text-center py-4">
        <h4>Ready to live healthier & more sustainably?</h4>
        <a href="{{route('register')}}" class="btn btn-light text-success mt-2">Register Now</a>
    </section>
@endsection
