<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        /* ---------- GLOBAL ---------- */
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: "Poppins", sans-serif; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at 10% 20%, #1e1f4b, #0d0e26);
            background-attachment: fixed;
            color: #fff;
            padding: 20px 0;
        }

        /* ---------- CARD ---------- */
        .register-card {
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

        .register-card h2 {
            text-align: center;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ---------- INPUTS ---------- */
        .input-group {
            position: relative;
            margin-bottom: 20px;
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
        .terms-row {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        input[type="checkbox"] {
            accent-color: #06b6d4;
            width: 16px;
            height: 16px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .terms-row a {
            color: #06b6d4;
            text-decoration: none;
            transition: color 0.2s;
        }

        .terms-row a:hover {
            color: #38bdf8;
            text-decoration: underline;
        }

        /* ---------- BUTTON ---------- */
        .register-btn {
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

        .register-btn:hover {
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.5);
            transform: translateY(-1px);
        }

        .register-btn:active {
            transform: translateY(1px);
        }

        /* ---------- FOOTER ---------- */
        .login-link {
            text-align: center;
            margin-top: 18px;
            font-size: 0.9rem;
        }

        .login-link a {
            color: #06b6d4;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* ---------- VALIDATION ERRORS ---------- */
        .validation-errors {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 20px;
            color: #fca5a5;
            font-size: 0.85rem;
        }

        .validation-errors ul {
            list-style: none;
            padding: 0;
        }

        .validation-errors li {
            margin-bottom: 4px;
        }
    </style>
</head>

<body>

    <div class="register-card">
        <h2>Create Account</h2>

        @if ($errors->any())
            <div class="validation-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                <button type="button" class="show-btn" id="showPw">Show</button>
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                <button type="button" class="show-btn" id="showPwConfirm">Show</button>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="terms-row">
                    <input type="checkbox" name="terms" id="terms" required>
                    <label for="terms">
                        I agree to the <a target="_blank" href="{{ route('terms.show') }}">Terms of Service</a> and <a target="_blank" href="{{ route('policy.show') }}">Privacy Policy</a>
                    </label>
                </div>
            @endif

            <button type="submit" class="register-btn">Register</button>

            <div class="login-link">
                Already registered? <a href="{{ route('login') }}">Log in</a>
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

        // Confirm Password visibility toggle
        document.getElementById("showPwConfirm").addEventListener("click", function () {
            const pwField = document.getElementById("password_confirmation");
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