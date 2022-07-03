<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Landing PAGE Html5 Template">

    <meta name="keywords" content="landing,startup,flat">

    <meta name="author" content="Made By GN DESIGNS">

    <style>
        body,
        .wrapper {
            max-height: 100vh;
        }

    </style>

    <title>Neema - Connexion</title>



    <!-- // PLUGINS (css files) // -->

    <link href="{{ asset('login/assets/js/plugins/bootsnav_files/skins/color.css') }}" rel="stylesheet">

    <link href="{{ asset('login/assets/js/plugins/bootsnav_files/css/animate.css') }}" rel="stylesheet">

    <link href="{{ asset('login/assets/js/plugins/bootsnav_files/css/bootsnav.css') }}" rel="stylesheet">

    <link href="{{ asset('login/assets/js/plugins/bootsnav_files/css/overwrite.css') }}" rel="stylesheet">

    <link href="{{ asset('login/assets/js/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <link href="{{ asset('login/assets/js/plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet">

    <link href="{{ asset('login/assets/js/plugins/owl-carousel/owl.transitions.css') }}" rel="stylesheet">

    <link
        href="{{ asset('login/assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css') }}"
        rel="stylesheet">

    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="{{ asset('login/assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}"
        rel="stylesheet">

    <link href="{{ asset('login/assets/css/main.css') }}" rel="stylesheet">

</head>



<body>



    <!--======================================== 

           Preloader

    ========================================-->

    <div class="page-preloader">

        <div class="spinner">

            <div class="rect1"></div>

            <div class="rect2"></div>

            <div class="rect3"></div>

            <div class="rect4"></div>

            <div class="rect5"></div>

        </div>

    </div>



    <!--======================================== 

           Header

    ========================================-->




    <!--//** Banner**//-->

    <section id="home">

        <div class="container">

            <div class="row">

                <div id="particles-js"></div>

                <!-- Introduction -->

                <div class="col-md-6 caption">
                    @if (session()->has('danger'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session()->get('danger') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <h1>Bienvenue !</h1>

                    <h2>
                        Identifiez-vous pour pouvoir administrer le studio
                    </h2>

                </div>

                <!-- Sign Up -->

                <div class="col-md-5 col-md-offset-1">

                    <form class="signup-form" method="POST" action="{{ route('login.post') }}">

                        @csrf

                        <h2 class="text-center">Identifiez-vous !</h2>
                        <p style="text-align: center;">Vous devez vous connecter pour continuer d'utiliser l'application
                        </p>
                        <hr>

                        <div class="form-group">
                            <select id="identify" name="identity"
                                style="width: 100%; padding: 10px; border: 1px solid #eee; background-color: #fff; border-radius: 3px;">
                                <option selected value="0">Qui êtes-vous ?</option>
                                <option value="{{ ADMIN_ID }}">Un administrateur</option>
                                <option value="{{ IR_ID }}">Un ingénieur</option>
                                <option value="{{ FINANCE_ID }}">Un financier</option>
                            </select>

                        </div>

                        <div class="form-group">

                            <input type="email" class="form-control" autocomplete="false" placeholder="Votre email"
                                required="required" name="email">

                        </div>

                        <div class="form-group">

                            <input type="password" name="password" autocomplete="false" class="form-control"
                                placeholder="Votre mot de passe" required="required">

                        </div>

                        <div class="form-group text-center" style="margin-top: 20px;">

                            <button type="submit" class="btn btn-blue btn-block">Se connecter</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>



    </section>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="{{ asset('login/assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('login/assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('login/assets/js/plugins/bootsnav_files/js/bootsnav.js') }}"></script>

    <script src="{{ asset('login/assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js') }}"></script>


    <script
        src="{{ asset('login/assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js') }}">
    </script>

    <script src="{{ asset('login/assets/js/plugins/particles.js-master/particles.js-master/particles.min.js') }}">
    </script>

    <script src="{{ asset('login/assets/js/main.js') }}"></script>

</body>



</html>
