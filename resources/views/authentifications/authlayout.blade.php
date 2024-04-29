<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #8DB38B;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Add this line to align items vertically */
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="headerline, text-center">
        <h1>@yield('title')</h1>
    </div>
    <div class="container">
            @yield('content')
    </div>
</body>
</html>
