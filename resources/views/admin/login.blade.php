<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="css/adminstyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    
</head>
<body>
    @foreach($errors->all() as $error)	
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $error }}</strong>
        </div>			
    @endforeach
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{!! \Session::get('error') !!}</strong>
        </div>
    @endif
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" class="input-group" action="/admin/login" method="post">
                {{ csrf_field() }}
                <input type="text" class="input-field" placeholder="Email Id" name="email" required>
                
                <input type="password" class="input-field" placeholder="Enter Password" name="password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn">LogIn</button>

            </form>
            <form id="register" class="input-group" action="/admin/register" method="post">
                {{ csrf_field() }}
                <input type="text" class="input-field" placeholder="User Name" name="name" required>
                <input type="text" class="input-field" placeholder="Email Id" name="email" required>
                <input type="number" class="input-field" placeholder="phone number" name="phonenumber">
                <input type="password" class="input-field" placeholder="Enter Password" name="password" required autocomplete="new-password">
                <input type="password"  class="input-field" name="password_confirmation" placeholder="Confirm Password" id="password-confirm" required autocomplete="new-password">
                <input type="hidden" name="user_type" value="admin">
                <button type="submit" class="submit-btn">Register</button>

            </form>
        </div>
        
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";

        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";

        }

    </script>
</body>
</html>