<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - Yummy It</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <section class="container d-flex vh-100">
        <div class="card mx-auto my-auto border-dark p-5" style="width: 50%;">
            <h3 class="text-center">Sign Up</h3>
            <p class="text-center">Ayo daftar Ayo Pasti bisa</p>
            @if (session()->has('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{session('msg')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/register" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control p-2" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control p-2" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="reTypePassword" class="form-label">Re-Type Password</label>
                    <input type="password" class="form-control p-2" id="reTypePassword" name="reTypePassword">
                </div>
                <button type="submit" class="btn btn-dark py-3 mt-5" style="width: 100%;">Register</button>
            </form>
            <p class="m-2 text-center">Terima kasih sudah mau medaftar semoga amal ibadah anda diterima disisi tuhan
                yang maha esa. sekian dan terima kasih developernya dah capek :) 
                <a href="/login">sini klo mau balik</a></p>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
