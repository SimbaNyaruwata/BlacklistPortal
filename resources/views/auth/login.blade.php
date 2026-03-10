<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        /* ---------- GLOBAL ---------- */
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: "Poppins", sans-serif; }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at 10% 20%, #1e1f4b, #0d0e26);
            background-attachment: fixed;
            color: #fff;
        }

        /* ---------- CARD ---------- */
        .login-card {
            width: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            padding: 40px 30px;
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            0% { transform: translateY(30px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ---------- INPUTS ---------- */
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: #cbd5e1;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.07);
            color: #fff;
            font-size: 1rem;
            outline: none;
            transition: border 0.3s, box-shadow 0.3s;
        }

        .input-group input:focus {
            border: 1px solid #06b6d4;
            box-shadow: 0 0 8px rgba(6, 182, 212, 0.4);
        }

        /* ---------- SHOW PASSWORD ---------- */
        .show-btn {
            position: absolute;
            right: 10px;
            top: 38px;
            cursor: pointer;
            background: none;
            border: none;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        /* ---------- CHECKBOX ---------- */
        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .remember-row label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        input[type="checkbox"] {
            accent-color: #06b6d4;
            width: 16px;
            height: 16px;
        }

        .remember-row a {
            color: #06b6d4;
            text-decoration: none;
            transition: color 0.2s;
        }

        .remember-row a:hover {
            color: #38bdf8;
            text-decoration: underline;
        }

        /* ---------- BUTTON ---------- */
        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .login-btn:hover {
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.5);
            transform: translateY(-1px);
        }

        .login-btn:active {
            transform: translateY(1px);
        }

        /* ---------- FOOTER ---------- */
        .register-link {
            text-align: center;
            margin-top: 18px;
            font-size: 0.9rem;
        }

        .register-link a {
            color: #06b6d4;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <h2>Welcome Back</h2>

        @if (session('status'))
            <div style="color: #22c55e; text-align:center; margin-bottom:10px;">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                <button type="button" class="show-btn" id="showPw">Show</button>
            </div>

            <div class="remember-row">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="{{ route('password.request') }}">Forgot password?</a>
            </div>

            <button type="submit" class="login-btn">Log in</button>

            <div class="register-link">
                Not registered? Contact the admin to create an account.
            </div>
        </form>
    </div>

    <script>
        // Password visibility toggle
        document.getElementById("showPw").addEventListener("click", function () {
            const pwField = document.getElementById("password");
            if (pwField.type === "password") {
                pwField.type = "text";
                this.textContent = "Hide";
            } else {
                pwField.type = "password";
                this.textContent = "Show";
            }
        });
    </script>
</body>
</html>
