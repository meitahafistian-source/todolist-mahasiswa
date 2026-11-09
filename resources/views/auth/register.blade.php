
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - To-Do List Mahasiswa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px 20px;
            background: linear-gradient(135deg, #101d3a, #293f78, #6655a5);
        }

        .register-container {
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 38px;
            border-radius: 20px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
        }

        .logo {
            width: 65px;
            height: 65px;
            background: #e9edff;
            color: #4056a1;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            margin: 0 auto 18px;
        }

        .heading {
            text-align: center;
            margin-bottom: 28px;
        }

        .heading h2 {
            color: #1d2b4f;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .heading p {
            color: #8790a5;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #34415e;
            font-size: 14px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dce1ec;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #586fc1;
            box-shadow: 0 0 0 3px rgba(88, 111, 193, 0.12);
        }

        .error-message {
            background: #fff0f0;
            color: #d33b3b;
            padding: 12px;
            border-radius: 9px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .btn-register {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #4056a1, #7057b8);
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-register:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 23px;
            color: #8790a5;
            font-size: 14px;
        }

        .login-link a {
            color: #5268b2;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #a0a7b8;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 30px 23px;
            }
        }
    </style>
</head>

<body>

    <div class="register-container">

        <div class="logo">✓</div>

        <div class="heading">
            <h2>Buat Akun Baru</h2>
            <p>Daftar untuk mulai mengatur tugas kuliahmu.</p>
        </div>

        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_pengguna">Nama Pengguna</label>
                <input
                    type="text"
                    id="nama_pengguna"
                    name="nama_pengguna"
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('nama_pengguna') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    required
                >
            </div>

            <button type="submit" class="btn-register">
                Daftar Sekarang
            </button>
        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login di sini</a>
        </div>

        <div class="footer">
            To-Do List Mahasiswa &copy; {{ date('Y') }}
        </div>

    </div>

</body>
</html>
