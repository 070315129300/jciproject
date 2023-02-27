<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
    <link rel="stylesheet" href="style/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <script
        src="https://kit.fontawesome.com/f698b33fa3.js"
        crossorigin="anonymous"
    ></script>
</head>
<body>
<div class="main">
    <img src="/img/download-removebg-preview.png" alt="Logo" />
    <div class="form-container">
        <div class="header">
            <h2>Welcome Admin</h2>
            <p>Login to your account</p>
        </div>
            <form action="{{route('loginusers')}}" method="POST" class="login-form">

                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
            <input
                type="email"
                name="email"
                id="email"
                placeholder="Enter Email"
                required
            />
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Enter Password"
                required
            />
            <button type="submit">Login</button>
        </form>
    </div>
</div>
</body>
</html>

