<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In - Yummy It</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <section class="container d-flex vh-100">
        <div class="card mx-auto my-auto border-dark p-5" style="width: 50%;">
            <h3 class="text-center">Sign In</h3>
            <p class="text-center">Selamat datang kembali para pencari duid</p>
            @if (session()->has('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{session('msg')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/login" method="post">
              @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control p-3" id="email" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control p-3" id="password" name="password"> 
                  </div>
                <button type="submit" class="btn btn-dark py-3 mt-5" style="width: 100%;">Sign In</button>
            </form>
            <p class="mt-2 text-center">Hellow hari gini masih belum punya akun ? yaudah daftar <a href="/register">Sini</a></p>

        </div>
    </section>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
