<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Lunera Fashion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', sans-serif;
        }
        .hero-img {
            max-height: 200px;
        }
        .welcome-box {
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 40px;
        }
        .btn-main {
            background-color: #6366f1;
            color: white;
            border-radius: 10px;
        }
        .btn-main:hover {
            background-color: #4f46e5;
        }
    </style>
</head>
<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="welcome-box text-center">
            <img src="{{ asset('admin/assets/logo/lunera.png') }}" alt="Welcome Image" class="hero-img mb-4">
            <h4 class="text-primary fw-bold mb-3">Selamat Datang di Lunera Fashion </h4>
            <p class="text-muted mb-3">Sistem Manajemen Produksi untuk Industri Garmen</p>
            <a href="/login" class="btn btn-main px-4 py-2">Masuk ke Login</a>
        </div>
    </div>
</body>
</html>
