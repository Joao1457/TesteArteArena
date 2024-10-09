<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TesteArteArena</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            background-color: #111827;
            color: #fff;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 100%;
            max-width: 400px;
            border-radius: 0.5rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            text-align: center;
        }

        .card p {
            color: black;
        }

        .btn-login {
            background-color: #4c51bf;
            color: #fff;
        }

        .btn-login:hover {
            background-color: #434190;
        }

        .btn-success {
            background-color: #38a169;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #2f855a;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 1rem;
            background-color: #111827;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <img src="../logo.png" style="width: 50px; height:50px; border: 2px solid black;" />
                <h5 class="card-title">Bem-vindo!</h5>
                <p class="card-text">Por favor, faça login ou registre-se abaixo:</p>

                <div class="my-3">
                    <hr>
                    <p>Não tem uma conta?</p>
                    <a href="{{ route('register') }}" class="btn btn-success btn-block">Registrar</a>
                    <p>Já tem uma conta?</p>
                    <a href="{{ route('login') }}" class="btn btn-login btn-block">Login</a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} João Paulo Marques</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
