<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>
<style>
    .row{
        padding-top:50px;
    }
   
</style>
<body>
<div class="container">

        <div class="row">
            <form action="{{route('auth.create')}}" method="post">
              @csrf

              <div class="results">
                  @if(Session::has('success'))
                  <div class="alert alert-success">
                      {{Session::get('success')}}
                  </div>
                  @endif

                  @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
              </div>
                 <div class="form-group">
                     <label for="name">name</label>
                     <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}">
                     <span class="text-danger">@error('name'){{$message}}@enderror</span>
                 </div>
                <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="pwd">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>  
        </div>
    </div>
</body>
</html>