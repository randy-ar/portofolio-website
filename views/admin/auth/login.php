<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>a{
            text-decoration:none;
            color:white;
    }
            a:hover{
                color:black;
            }

</style>

</head>
<body class="bg-dark text-light overflow-hidden">

<?php 
if(isset($_SESSION['failed'])){
    echo '
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <div class="alert alert-danger" role="alert">
                '.$_SESSION['failed'].'
            </div>
        </div>
    </div>
    ';
    session_unset();
}
?>

<div class="banner-container">
<div class="row justify-content-center mt-5">
    <div class="col-4">
        <div class="card border-dark bg-dark">
            <div class="card-header bg-dark text-light text-center">
                <h2>Login</h2>
            </div>
            <form action="/admin/login" method="post">
                <div class="card-body bg-dark text-light">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="remember" name="remember" id="remember">
                        <label class="form-check-label" for="flexCheckDefault">
                          Remember me
                        </label>

                    </div>           
                </div>

                <div class="card-footer text-end bg-dark text-light">
         
                    <button type="submit" class="btn btn-outline-light"><a class=".link-unstyled"  href="/">Kembali</a></button>
                    <button type="submit" class="btn btn-outline-light">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>