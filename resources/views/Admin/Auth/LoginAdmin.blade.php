<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <title>Signin</title>
        <link rel="icon" type="image/png" href="{{ asset('images/iconweb.png') }}">
        <!-- Custom styles for this template -->
        <link href="{{ asset('Styles/css/loginadmincss.css') }}" rel="stylesheet" />
    </head>
    <style>
        body {
            font-family: sans-serif;
            height: 100vh;
            background-image: url('bg2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        .box {
            background-color: rgba(13, 13, 14, 0.8);
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(23, 23, 23, 0.8);
            margin: auto auto;
            padding-top: 20px;
            padding-right: 40px;
            padding-bottom: 40px;
            padding-left: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .centered-logo {
            text-align: center;
            margin-top: 50px;
            /* Adjust the margin-top value to center the logo vertically */
        }

        .logo-img {
            max-width: 100px;
            /* Adjust the maximum width as needed */
        }
    </style>

    <body>
        <div id="tsparticles"></div>
        <main class="box">
            <div class="centered-logo">
                <img class="logo-img" src="{{ asset('images/logo-avatar.png') }}" alt="Logo">
            </div>
            <br />
            <h2>Login</h2>
            <form action="" method="post">
                @csrf
                <div class="inputBox">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" placeholder="Masukkan email" required />
                </div>
                <div class="inputBox">
                    <label for="Password">password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password" required />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" value="Login" style="float: right;">Login</button>
                </div>
            </form>
        </main>
        <footer>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/tsparticles@1.34.1/tsparticles.min.js"
            integrity="sha256-D6LXCdCl4meErhc25yXnxIFUtwR96gPo+GtLYv89VZo=" crossorigin="anonymous"></script>

    </body>

</html>
