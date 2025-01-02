<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanTime - Add Service</title>
    <style>
        /* Previous styles remain the same until .container */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e0f7fa 0%, #ffffff 100%);
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background: white;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #26a69a;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
        }

        .lets-talk-btn {
            background: #26a69a;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 5%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
        }

        .service-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .submit-btn {
            background: #26a69a;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
            margin: 0 auto;
        }

        .submit-btn:hover {
            background: #2bbbad;
        }

        img.h-8 {
            max-width: 100%;
            height: 50px;
            width: 150px;
            object-fit: cover;
        }

        .h-8 {
            max-block-size: max-content;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('image/logo.svg') }}" alt="CleanTime Logo" class="h-8">
        </div>
    </nav>
    <div class="container">
        <h1>Expand Your Service Offerings</h1>
        <form class="service-form" action="{{ route('cleaner.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Service Name*</label>
                <input type="text" name="service_name" placeholder="Enter service name" required>
            </div>

            <div class="form-group">
                <label>Service Description*</label>
                <textarea name="service_description" placeholder="Describe the service details" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label>Price *</label>
                <input type="number" name="service_price" placeholder="Enter service price" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Service Image *</label>
                <input type="file" name="service_image" accept="image/*" required>
            </div>

            <button type="submit" class="submit-btn">
                <span>📤</span>
                Submit New Service
            </button>
        </form>
    </div>
</body>
</html>