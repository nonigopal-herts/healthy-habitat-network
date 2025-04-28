<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Healthy Habitat Network</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <!-- Swiper CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@9.1.0/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}" />
</head>

<body>
@include('layouts.frontend_components.header')

@yield('content')

@include('layouts.frontend_components.footer')
@yield('styles')
@include('layouts.frontend_components.scripts')

<!-- Stack for page-specific JS -->
@stack('scripts')

</body>
</html>


