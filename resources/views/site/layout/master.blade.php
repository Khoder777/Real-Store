<!DOCTYPE html>

<html lang="en">

<head>

    @include('site.layout.head')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">123 Street, New York</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">Email@Example.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="{{ route('site.home') }}" class="navbar-brand">
                    <h1 class="text-primary display-6">Real Store</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{ route('site.home') }}" class="nav-item nav-link active">{{ __('Home') }}</a>
                        <a href="{{ route('site.shop.filter') }}" class="nav-item nav-link">Shop</a>
                        <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="{{ route('site.language','ar') }}" class="dropdown-item">عربي</a>
                                    <a href="{{ route('site.language','en') }}" class="dropdown-item">English</a>
                                </div>
                            </div>
                        <a href="{{ route('site.contact') }}" class="nav-item nav-link">{{ __('Contact') }}</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <button
                            class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-primary"></i></button>
                        <a href="{{ route('site.cart.index') }}" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                {{ auth('customers')->user()?->carts->count() ?? 0 }}
                            </span>
                        </a>
                        <a href="#" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                        @guest('customers')
                            <a href="{{ route('site.signin') }}" class="mt-3 p-1 ">
                                <p>SignIn/SignUp</p>
                            </a>
                        @endguest
                        @auth('customers')
                            <a href="{{ route('site.logout') }}" class="mt-3 p-1 ">
                                <p>LogOut</p>
                            </a>
                            </form>
                        @endauth

                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->
    @yield('content')

    @include('site.layout.footer')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('b8b1071c14e9faa7a8bc', {
            cluster: 'eu',
            userAuthentication: {
                endpoint: "/pusher_auth.php"
            },
            //   channelAuthorization: { endpoint: "/pusher/auth"},
            authEndpoint: "/broadcasting/auth",
        });
        // var pusher = new Pusher("b8b1071c14e9faa7a8bc", {
        //     cluster: 'eu',


        // });

        var channel = pusher.subscribe("private-Order.update.status.{{ Auth::guard('customers')->id() }}");
        channel.bind('order-update-status', function(data) {
            Swal.fire({
                title: "Notfication from admin",
                text:data.message,
                icon: "question"
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
