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
<div class="inner-box" id="card">
<div class="card-front">
  <h2>REGISTER</h2>
  <form action ="{{ route('user.create') }}" method = "POST" >
    @csrf
    <input type="text" class="input-box" name ="name" id ="name1" placeholder="your names" required>
    <input type="number" class="input-box" name ="numero" id="numero" placeholder="your PhoneNumber" required>
    <input type="email" class="input-box" name ="email" id="mail" placeholder="your Email id" required>
    <input type="password" class="input-box" name ="password" id="password" placeholder="password" required>
    <input type="password" class="input-box" name ="mdp1" id="mdp1" placeholder="confirm your password" required>
    <button type="submit" class="submit-btn" >submit</button>
    <input type="checkbox"><span>Remember me</span>
  </form>
    <a href="{{url('login')}}"><button type="button" class="btn" > I've an account</button></a>

</div>
</div>
</div>
</body>
</html>
