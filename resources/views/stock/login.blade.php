<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="inner-box">
        <div class="card-front">
          <h2>LOGIN</h2>
            @if(Session::has('message'))
                    <div  style="color:red; padding-bottom:15px;">
                        {{Session::get('message')}}
                    </div>
            @endif
          <form action ="{{ route('user.veri') }}" method = "POST" >
            @csrf
            <input type="email" class="input-box" name ="email" placeholder="your Email id" required>
            <input type="password" class="input-box" name ="password" placeholder="password" required>
            <button type="submit" class="submit-btn">submit</button>
            <input type="checkbox"><span>Remember me</span>
          </form>
          <a href="{{ url('register')}}"><button type="button" class="btn"> I'm new here</button></a>
          <a href="">Forgot password</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
