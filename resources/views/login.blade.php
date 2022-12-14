<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amarat Materials</title>
    <link rel="stylesheet" href="{{url('/').'/css/bootstrap.css'}}">
    <link rel="stylesheet" href="{{url('/').'/css/sidebar.css'}}"/>
    <script type="text/javascript" src="{{url('/').'/js/bootstrap.js'}}"></script>
    <script type="text/javascript" src="{{url('/').'/js/jquery.js'}}"></script>

</head>
<style>
    body {
        background: #e7e7e7;
    }
</style>
<body>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card m-5 p-5">

            <div class="row">

                <img class="col-lg-6 col-12 d-none d-sm-block" src="{{url('/').'/images/construction.jpg'}}">

                <div class="col-lg-6 col-12 p-4" style="background: #e8e8e8">

                    <div class="card p-2">
                        <center>
                            <img src="{{url('/').'/images/logo.png'}}" width="80" height="80">
                            <h2>Amarat Materials</h2>
                        </center>
                    </div>


                    <h3 class="mt-4">Login</h3>
                    <br>
                    @if (Session::has('success'))
                        <div class="alert alert-success ">
                            {!! \Session::get('success') !!}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif

                    <form method="post">
                        @csrf
                        <label>Enter Email</label>
                        <input type="email" value="admin@gmail.com" name="email" class="form-control">
                        <br>
                        <label>Enter Password</label>
                        <input type="password" value="adminadmin" name="password" class="form-control">
                        <br>
                        <button class="btn btn-dark btn-sm w-100">Login</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

</body>

</html>


