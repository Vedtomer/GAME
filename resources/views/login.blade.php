<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Include Font Awesome using a different CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <title>Login Form</title>
    <style>
        :root {
            --primary-color: #387f97;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            max-width: 500px;
            width: 100%;
            padding: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            border-radius: 0;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-size: 20px !important;
        }

        .btn-primary:hover {
            background-color: rgba(56, 127, 151, 0.9);
            border-color: rgba(56, 127, 151, 0.9);
        }

        .center-btn {
            text-align: center;
        }

        .form-label {
            font-size: 20px !important;
        }

        .form-control {
            font-size: 20px !important;
        }

        h2 {
            font-size: 24px;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 4px;
            transform: translateY(4%);
            cursor: pointer;
            font-size: 24px;
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <span class="password-toggle" id="password-toggle" onclick="togglePassword()">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
            <div class="center-btn">
                <button type="submit" class=" btn btn-primary">Login</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const passwordToggle = document.getElementById("password-toggle");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = "password";
                passwordToggle.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        $(document).ready(function() {
            toastr.options = {
                "positionClass": "toast-top-right",
                "closeButton": true,
                "progressBar": true
            };
        });
    </script>
</body>

</html>
