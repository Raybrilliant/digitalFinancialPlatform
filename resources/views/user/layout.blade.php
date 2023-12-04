<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yummy It</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-lFLCJd0DQjUwfi4c"></script>
</head>

<body>
    <!-- nav -->
    <nav class="navbar pt-3 mb-5">
        <div class="container">
            <a class="navbar-brand" href="/"><b>YUMMY IT</b></a>
            <form class="d-flex" role="search">
                <input class="form-control me-2 bg-light border border-0" type="search" placeholder="Search"
                    aria-label="Search" name="q" />
            </form>
            <div class="d-flex align-items-center">
                <a href="/cart/{{ session()->get('order_number') }}" class="text-dark">
                    <div class="mx-3 position-relative">
                        <h4>
                            <i class="bi bi-basket2-fill"></i>
                        </h4>
                        @if (session()->get('cart'))
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge badge-sm rounded-circle bg-warning">
                            {{ session()->get('cart') }}
                        </span>
                        @endif
                    </div>
                </a>
                @if (session()->get('id'))
                <a href="/profile"><button class="btn btn-outline-dark">Profile</button></a>
                @else
                <a href="/login"><button class="btn btn-outline-dark">Login</button></a>
                @endif
            </div>
        </div>
    </nav>
    <!-- end nav -->
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
