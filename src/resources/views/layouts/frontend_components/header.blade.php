<!-- Navbar -->
<nav
    class="navbar navbar-expand-lg navbar-dark"
    style="background-color: rgb(25 135 84)"
>
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{url('/')}}">Healthy Habitat Network</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>

                <!-- Services Dropdown -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="services.html"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Services
                    </a>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        @if(!empty($productCategories))
                            @foreach($productCategories as $service)
                                @if($service->product_service_type_id == 1)
                                    <li>
                                        <a class="dropdown-item" href="{{route('service-subcategory', $service->id)}}"
                                        >{{$service->name}}</a
                                        >
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </li>

                <!-- Services Dropdown -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="services.html"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Products
                    </a>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        @if(!empty($productCategories))
                            @foreach($productCategories as $products)
                                @if($products->product_service_type_id == 2)
                                    <li>
                                        <a class="dropdown-item" href="{{route('product-subcategory', $products->id)}}"
                                        >{{$products->name}}</a
                                        >
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </li>


                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="vote.html">Vote</a>--}}
                {{--                </li>--}}

                <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

                <!-- Login Button -->

                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="services.html"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Login
                    </a>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        @if(Session::has('resident_logged_in'))
                            <div class="d-flex align-items-center gap-2">
                                <form action="{{ route('resident.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm">Logout</button>
                                </form>
                            </div>
                        @else
                        <li>
                           <a class="dropdown-item" href="{{route('resident.login')}}">Resident Login</a>
                        </li>
                        @endif

                        <li>
                            <a class="dropdown-item" href="">Admin Login</a>
                        </li>
                    </ul>
                </li>

                <!-- Register Button -->
                <li class="nav-item">
                    <a
                        class="nav-link btn btn-light ms-2 px-3 py-1"
                        href="{{route('register')}}"
                    >Register</a
                    >
                </li>
            </ul>
        </div>
    </div>
</nav>
