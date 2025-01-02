<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - CleanTime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Properties */
        :root {
            --primary-color: #26c6da;
            --hover-color: #00acc1;
            --background-start: #e0f7fa;
            --background-end: #ffffff;
            --card-shadow: 0 10px 30px rgba(38, 198, 218, 0.1);
            --transition-speed: 0.3s;
        }

        /* Global Styles */
        body {
            background: linear-gradient(135deg, var(--background-start), var(--background-end));
            font-family: 'Segoe UI', 'Arial', sans-serif;
            min-height: 100vh;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Card Styling */
        .card {
            border-radius: 20px;
            border: none;
            box-shadow: var(--card-shadow);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            transform: translateY(0);
            transition: all var(--transition-speed) ease;
            max-width: absolute;
            width: 90%;
            margin: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(38, 198, 218, 0.2);
        }

        /* Form Elements */
        .form-control {
            border-radius: 12px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            transition: all var(--transition-speed) ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(38, 198, 218, 0.2);
            transform: translateY(-1px);
        }

        .form-label {
            font-weight: 500;
            color: #455a64;
            margin-bottom: 8px;
            transform: translateY(0);
            transition: all var(--transition-speed) ease;
        }

        .form-control:focus + .form-label {
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        /* Role Selection Buttons */
        .btn-role {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 25px;
            margin: 0 8px;
            background-color: white;
            color: #455a64;
            cursor: pointer;
            transition: all var(--transition-speed) cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-role:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: var(--primary-color);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
            z-index: -1;
        }

        .btn-role:hover:before {
            width: 200px;
            height: 200px;
        }

        .btn-role.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
            transform: scale(1.05);
        }

        .btn-role:hover {
            color: white;
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        /* Submit Button */
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all var(--transition-speed) ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            background-color: var(--hover-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(38, 198, 218, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Heading */
        h3 {
            color: #455a64;
            font-weight: 600;
            position: relative;
            padding-bottom: 15px;
        }

        h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card {
                margin: 15px;
                padding: 20px !important;
            }

            .btn-role {
                padding: 10px 20px;
                margin: 0 5px;
            }
        }

        /* Loading State */
        .btn-primary.loading {
            position: relative;
            pointer-events: none;
        }

        .btn-primary.loading:after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin: -10px 0 0 -10px;
            border: 3px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: rotate 0.8s linear infinite;
        }

        @keyframes rotate {
            to { transform: rotate(360deg); }
        }

        /* Form Validation Styles */
        .form-control.is-valid {
            border-color: #28a745;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23dc3545' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23dc3545' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-auto">
        <div class="card p-5" style="width: 400px; height:auto">
            <h3 class="text-center mb-4">Register CleanTime</h3>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label d-block">Pilih Role</label>
                    <div class="d-flex justify-content-center">
                        <label class="btn-role" id="adminRole">
                            <input type="radio" name="role" value="admin" required> Admin
                        </label>
                        <label class="btn-role" id="userRole">
                            <input type="radio" name="role" value="user" required> User
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
    <script>
        // Enhanced form interaction
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', (e) => {
                e.target.closest('.mb-3').querySelector('.form-label')?.classList.add('active');
            });

            input.addEventListener('blur', (e) => {
                if (!e.target.value) {
                    e.target.closest('.mb-3').querySelector('.form-label')?.classList.remove('active');
                }
            });

            // Simple validation
            input.addEventListener('input', (e) => {
                if (e.target.checkValidity()) {
                    e.target.classList.add('is-valid');
                    e.target.classList.remove('is-invalid');
                } else {
                    e.target.classList.add('is-invalid');
                    e.target.classList.remove('is-valid');
                }
            });
        });

        // Enhanced role button interaction
        document.querySelectorAll('.btn-role').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.btn-role').forEach(btn => {
                    btn.classList.remove('active');
                    btn.style.transform = 'scale(1)';
                });
                button.classList.add('active');
                button.style.transform = 'scale(1.05)';
            });
        });

        // Form submission animation
        document.querySelector('form').addEventListener('submit', (e) => {
            const button = e.target.querySelector('.btn-primary');
            button.classList.add('loading');
        });
    </script>
</body>
</html>