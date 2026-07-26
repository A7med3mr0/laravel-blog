<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Laravel Project</title>

    <!-- Import Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            color: #2563eb;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Buttons Styling */
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            border: none;
        }

        .btn-login {
            color: #475569;
            background-color: #f1f5f9;
        }

        .btn-login:hover {
            background-color: #e2e8f0;
            color: #0f172a;
        }

        .btn-register, .btn-dashboard {
            background-color: #2563eb;
            color: #ffffff;
            box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
        }

        .btn-register:hover, .btn-dashboard:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
        }

        .btn-logout {
            background-color: #ef4444;
            color: #ffffff;
        }

        .btn-logout:hover {
            background-color: #dc2626;
        }

        /* Hero / Main Section */
        .hero {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .card {
            background: #ffffff;
            max-width: 650px;
            width: 100%;
            padding: 50px 40px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            border: 1px solid #f1f5f9;
        }

        .badge {
            display: inline-block;
            background-color: #eff6ff;
            color: #2563eb;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .card h1 {
            font-size: 32px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 16px;
            line-height: 1.25;
        }

        .card p {
            font-size: 16px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* Inline Form for Logout */
        .logout-form {
            display: inline;
        }

        /* Mobile Responsive */
        @media (max-width: 600px) {
            .navbar {
                padding: 15px 20px;
            }
            .card {
                padding: 30px 20px;
            }
            .card h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar">
        <a href="/" class="logo">Ahmed's App</a>

        <div class="nav-links">
            @guest
                <!-- يُعرض فقط للزائرين غير المسجلين -->
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-login">Log in</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                @endif
            @endguest

            @auth
                <!-- يُعرض فقط بعد تسجيل الدخول -->
                <a href="{{ route('posts.index') }}" class="btn btn-dashboard">Dashboard</a>

                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="btn btn-logout">Log out</button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="hero">
        <div class="card">
            <span class="badge">🚀 First Laravel Project</span>
            <h1>Welcome to my first Laravel project!</h1>
            <p>
                My name is <strong>Ahmed</strong> and I am a beginner in Laravel.
                This is my first project using the Laravel framework to build awesome web applications.
            </p>

            @guest
                <a href="{{ route('register') }}" class="btn btn-register" style="padding: 12px 28px; font-size: 15px;">Get Started Today</a>
            @endguest

            @auth
                <a href="{{ route('posts.index') }}" class="btn btn-dashboard" style="padding: 12px 28px; font-size: 15px;">Go to Dashboard →</a>
            @endauth
        </div>
    </main>

</body>
</html>
