<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MoneyBag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">MoneyBag</a>
            <div>
              <a href="/login">
                <button class="btn btn-outline-primary" type="submit">Login</button>
              </a>

              <a href="/register">
                <button class="btn btn-outline-success" type="submit">Register</button>
              </a>  
              
            </div>
        </div>
    </nav> 
    <div class="container">
        @yield ('content')     
      </div>   
</body>
</html>