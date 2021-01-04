<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MNADS - Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="{{('public/frontend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{('public/frontend/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reset Password SYSTEM!</h1>
                                </div>
                                <form class="user" action="{{route("reset.password.save")}}"  method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Username or Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"  name="token_reset_password" aria-describedby="emailHelp" placeholder="Enter Token:">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password_confirmation" aria-describedby="emailHelp" placeholder="Confirm Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block" > Reset Password</button>
                                    @if ($errors->any())
                                        <section class="alert alert-danger">
                                            <div class="container">
                                                <div class="columns is-centered">
                                                    <div class="column is-6">
                                                        <div class="notification is-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger help-block">{{session('error')}}</div>
                                    @endif
                                    @if (session('message'))
                                        <div class="alert alert-success help-block">{{session('message')}}</div>
                                    @endif
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{('public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{('public/frontend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{('public/frontend/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
