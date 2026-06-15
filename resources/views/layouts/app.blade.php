<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WargaKu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
        }

        .sidebar a {
            color: #555;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 10px;
        }

        .sidebar a:hover {
            background: #eef5ff;
        }

        .sidebar .active {
            background: #e7f3ff;
            color: #0d6efd;
            font-weight: 600;
        }

        .content {
            flex: 1;
        }

        .topbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            height: 70px;
        }

        .stat-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }
    </style>

</head>

<body>

    <div class="d-flex">

        @include('components.sidebar')

        <div class="content">

            @include('components.navbar')

            <div class="p-4">

                @yield('content')

            </div>

        </div>

    </div>

</body>

</html>
