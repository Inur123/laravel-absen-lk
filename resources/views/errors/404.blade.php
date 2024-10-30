<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 Error Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex: 1;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        /* Footer styling */
        footer {
            background-color: #f8f9fa;
            padding: 1rem;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }
        footer p {
            margin: 0;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo-masta24.png') }}" alt="Logo">
                MASTAMARU UMPO 2024
            </a>
        </div>
    </nav>
    <div class="content-wrapper">
        <div class="text-center">
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-3"><span class="text-danger">Oops!</span> Page not found.</p>
            <p class="lead">
                The page you’re looking for doesn’t exist.
            </p>
            <a href="/" class="btn btn-primary">Go Home</a>
        </div>
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} MASTAMARU UMPO. All rights reserved.</p>
    </footer>
    
</body>
</html>
