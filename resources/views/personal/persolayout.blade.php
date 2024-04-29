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
            align-items: center;
            flex-direction: column; /* Add this line to align items vertically */
            height: 100vh;
            margin-top: 0px
        }
        .blog-container {
            text-align: center;
            padding: 20px;
        }
        .blog-post {
            border: 1px solid #ddd;
            background-color: #d1edce;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 5px;
        }
        .blog-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .blog-date {
            font-size: 0.9em;
            color: #666;
        }
        .blog-title {
            margin: 10px 0;
        }
        .blog-content {
            margin-bottom: 10px;
        }
        .blog-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .blog-footer .blog-like {
            cursor: pointer;
            font-size: 1.5em;
        }
        button {
            cursor: pointer;
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
