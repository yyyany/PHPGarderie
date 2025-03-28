<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des garderies</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .logo-container {
            text-align: center;
            padding: 20px 0;
            background-color: white;
            margin-bottom: 20px;
        }
        .logo-container img {
            max-height: 150px;
            width: auto;
        }
        .nav-container {
            background-color: #e9f2f9;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        .nav-container .nav {
            justify-content: center;
        }
        .nav-container .nav-link {
            color: #333;
            padding: 8px 20px;
            margin: 0 5px;
            border-radius: 5px;
        }
        .nav-container .nav-link:hover {
            background-color: #d1e7f6;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .btn-group {
            gap: 5px;
        }
        .table th {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="/public/img/Garderie.png" alt="L'univers Park Garderie">
    </div>
    <div class="nav-container">
        @include('partials.navbar')
    </div>
    <div class="container">
        @yield('content')
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>