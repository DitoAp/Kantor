<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Login Admin - LSP Pariwisata GSP</title>
    
    <link rel="icon" type="image/jpeg" href="{{ asset('img/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --logo-navy: #1e293b;
            --logo-maroon: #991b1b;
            --logo-yellow: #eab308;
            --bg-auth: #f1f5f9;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-auth);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(30, 41, 59, 0.05), 0 8px 10px -6px rgba(30, 41, 59, 0.05);
            border: none;
            overflow: hidden;
            max-width: 450px;
            width: 100%;
        }

        .auth-header {
            background-color: var(--logo-navy);
            padding: 40px 30px;
            text-align: center;
            border-bottom: 4px solid var(--logo-maroon);
        }

        .auth-body {
            padding: 40px 35px;
        }

        .form-control:focus {
            border-color: var(--logo-maroon);
            box-shadow: 0 0 0 0.25rem rgba(153, 27, 27, 0.15);
        }

        .btn-auth {
            background-color: var(--logo-navy);
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 500;
            width: 100%;
            transition: all 0.2s ease;
        }

        .btn-auth:hover {
            background-color: var(--logo-maroon);
            color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="auth-card shadow-sm">
        <div class="auth-header">
            <img src="{{ asset('img/logo.png') }}" alt="Logo LSP GSP" class="rounded mb-3 shadow-sm" style="height: 65px; width: 65px; object-fit: cover;">
            <h5 class="text-white fw-bold m-0" style="letter-spacing: 0.5px;">LSP PARIWISATA</h5>
            <small class="text-uppercase font-monospace" style="color: var(--logo-yellow); font-size: 10px; letter-spacing: 1.5px;">Global Spirit Persada</small>
        </div>

        <div class="auth-body">
            <div class="text-center mb-4">
                <h6 class="fw-bold text-dark m-0">Portal Administrasi</h6>
                <p class="text-muted small mt-1">Silakan masuk menggunakan kredensial sekretariat resmi Anda.</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger border-0 small rounded-3 mb-3 py-2">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold text-dark">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control border-start-0 ps-0" placeholder="nama@lsp-gsp.or.id" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label small fw-bold text-dark">Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control border-start-0 ps-0" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-auth shadow-sm mb-3">
                    <i class="fa-solid fa-right-to-bracket me-2"></i> Masuk Ke Dashboard
                </button>

                <div class="text-center">
                    <a href="{{ url('/') }}" class="text-decoration-none small text-muted"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Situs Utama</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>