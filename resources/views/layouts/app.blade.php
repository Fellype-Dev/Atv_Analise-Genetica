<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratório de Exames</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --color-dark: #2A2B2A;
            --color-gray: #706C61;
            --color-light: #F8F4E3;
            --color-primary: #E5446D;
            --color-secondary: #FF8966;
        }
        
        body {
            background-color: var(--color-light);
            color: var(--color-dark);
        }
        
        .navbar {
            background-color: var(--color-dark) !important;
        }
        
        .btn-primary {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }
        
        .btn-primary:hover {
            background-color: #d1335d;
            border-color: #d1335d;
        }
        
        .btn-secondary {
            background-color: var(--color-gray);
            border-color: var(--color-gray);
        }
        
        .btn-secondary:hover {
            background-color: #5e5a52;
            border-color: #5e5a52;
        }
        
        .btn-warning {
            background-color: var(--color-secondary);
            border-color: var(--color-secondary);
            color: white;
        }
        
        .btn-warning:hover {
            background-color: #e67a56;
            border-color: #e67a56;
            color: white;
        }
        
        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: var(--color-dark);
            color: white;
        }
        
        .table thead th {
            background-color: var(--color-gray);
            color: white;
        }
        
        .alert-success {
            background-color: rgba(37, 188, 120, 0.2);
            border-color: rgba(37, 188, 120, 0.3);
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            border-color: rgba(220, 53, 69, 0.3);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('exames.index') }}">Laboratório de Exames</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('exames.index') }}">Exames</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('exames.create') }}">Novo Exame</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>