    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: url("{{ asset('background.jpg') }}") no-repeat left center fixed;
                background-size: 100% auto;   /* kecilin gambar (lebar 400px) */
                background-color: #fff;        /* sisanya putih */
                height: 100vh;
            }
            .card {
                background: rgba(255, 255, 255, 0.9); /* transparan elegan */
                border-radius: 10px;
                box-shadow: 0px 4px 20px rgba(0,0,0,0.2);
            }
        </style>
    </head>
    <body class="d-flex justify-content-center align-items-center">

        <div class="card p-4" style="width: 350px">
            <h4 class="text-center mb-3"><b>Login Admin</b></h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>

    </body>
    </html>
