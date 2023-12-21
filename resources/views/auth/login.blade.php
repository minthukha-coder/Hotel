<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .card-container {
        width: 350px;
        height: 440px;
        background: transparent;
        position: relative;
    }

    .container {
        display: flex;
        height: 100%;
        width: 100%;
        align-items: center;
        justify-content: center;
    }

    .circle1 {
        height: 80px;
        width: 80px;
        border-radius: 50%;
        background-color: #2879f3;
        position: absolute;
        top: 0;
        left: 0;
    }

    .circle2 {
        height: 80px;
        width: 80px;
        border-radius: 50%;
        background-color: #f37e10;
        position: absolute;
        right: 0;
        bottom: 0;
    }

    .log-card {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        position: absolute;
        /* width: 300px; */
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(5px);
        padding: 20px;
    }

    .heading {
        font-size: 28px;
        font-weight: 800;
    }

    .para {
        font-size: 14px;
        font-weight: 500;
    }

    .text {
        margin-top: 15px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 600;
        color: lightslategray;
    }

    .input-group {
        margin-top: 10px;
        margin-bottom: 4px;
    }

    .input {
        box-sizing: border-box;
        margin-bottom: 5px;
        width: 100%;
        border: none;
        padding: 8px 16px;
        background-color: transparent;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
        border-radius: 8px;
        font-weight: 600;
        color: #2879f3;
    }

    .input:hover {
        color: #2879f3;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
    }

    .password-group {
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
    }

    .checkbox-group {
        color: black;
        font-size: 14px;
        font-weight: 500;
    }

    .forget-password {
        font-size: 14px;
        font-weight: 500;
        color: #2879f3;
        text-decoration: none;
    }

    .forget-password:hover {
        text-decoration: underline;
        color: #f37e10;
    }

    .btn {
        margin-top: 20px;
        margin-bottom: 10px;
        padding: 8px 16px;
        border: none;
        background-color: #2879f3;
        color: white;
        font-size: 16px;
        font-weight: 700;
        border-radius: 8px;
    }

    .btn:hover {
        background-color: #0653c7;
    }

    .no-account {
        font-size: 16px;
        font-weight: 400;
    }

    .link {
        font-weight: 800;
        color: #2879f3;
    }

    .link:hover {
        color: #f37e10;
        text-decoration: underline;
    }
</style>

<body>
    <div class="container mt-5">
        <div class="card-container">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="container">
                <div class="log-card">
                    <form action="{{ route('authenticate') }}" method = "post">
                        @csrf
                        <p class="heading">Login Form</p>
                        <div class="input-group">
                            <p class="text">Email</p>
                            <input class="input" name = "email" placeholder="Enter Email...">
                            <p class="text">Password</p>
                            <input class="input" type="password" name = "password" placeholder="Enter Password...">
                        </div>

                        <button class="btn">Sign In</button>

                        <p class="no-account">Don't Have an Account ?<a class="link" href={{ route('register') }}>
                                Sign
                                Up</a></p>
                </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
