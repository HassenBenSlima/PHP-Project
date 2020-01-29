<?php session_start();
session_destroy();
session_start();

include 'include/connexion.php';
include "models/fonctions.class.php";

$controller="client";
$action="login1";

if(isset($_REQUEST['controller']))
    $controller=$_REQUEST['controller'];

if(isset($_REQUEST['action']))
    $action=$_REQUEST['action'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Golden Ticket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <!-- bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="themes/css/bootstrappage.css" rel="stylesheet"/>

    <!-- global styles -->
    <link href="themes/css/flexslider.css" rel="stylesheet"/>
    <link href="themes/css/main.css" rel="stylesheet"/>

    <!-- scripts -->
    <script src="themes/js/jquery-1.7.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="themes/js/superfish.js"></script>
    <script src="themes/js/jquery.scrolltotop.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="top-bar" class="container">
    <div class="row">

        <div class="">
            <div class="account pull-left" >
                <a href="#"><img src="themes/images/acceuil.png" alt=""></a>
            </div>

            <div class="account pull-right">
                <ul class="user-menu">


                    <li><a href="cart.html"><img src="themes/images/shopping-bag-icon.png" alt="">Panier</a></li>

                    <li><a href="#"><img src="themes\images\dmin_1.png"  width="50" class=""/>Connect</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>
<div id="wrapper" class="container">
    <section class="navbar main-menu">
        <div class="navbar-inner main-menu">
            <nav id="menu" class="pull-right">
                <ul>




                    <li><a href="ecommerce.php?controller=ticket&action=searchcat">Rechercher</a></li>
                    <li><a href="ecommerce.php?controller=ticket&action=liste_panier">Panier</a></li>
                    <li><a href="ecommerce.php?controller=ticket&action=liste_ticket">liste des tickets</a></li>

                </ul>
            </nav>
        </div>
    </section>

<!--Content-->
    <div></div>
    <?php include "controllers/".$controller.".controller.php"; ?>
    <!--End Content-->


    <section id="footer-bar">
        <div class="row">
            <div class="span3">
                <h4> À PROPOS</h4>
                <ul class="nav">
                    <li><a href="#">Société: E-Com Tunisie</a></li>
                    <li><a href="#">Siége social: 13, Avenue Farhat Hached</a></li>
                    <li><a href="#">Adresse de contact: Contact@Golden.tn</a></li>
                    <li><a href="#">Téléphone: : +21650548028</a></li>
                    <li><a href="#">Horaire: : Du lundi au Vendredi , Samedi , dimanche ( Fermé )</a></li>

                </ul>
            </div>
            <div class="span4">
                <h4>RETROUVER NOS PAYBOX:</h4>
                <ul class="nav">
                    <li><a href="#">Grand Tunis:</a></li>
                    <li><a href="#">– Lafayette</a></li>
                    <li><a href="#">– La Marsa</a></li>
                    <li><a href="#">Voir plus de détails…</a></li>

                </ul>
            </div>
            <div class="span5">
                <p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
                <p>GoldeTicket.tn , le leader tunisien en billetterie électronique pour vos spectacles , films et événements préférés 🎧🍻🎬👨‍👨‍👧‍👦</p>
                <br/>
                <span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
            </div>
        </div>
    </section>
    <section id="copyright">
        <span>Copyright 2018 All right reserved.</span>
    </section>
</div>
<script src="themes/js/common.js"></script>
<script>
    $(document).ready(function() {
        $('#checkout').click(function (e) {
            document.location.href = "checkout.html";
        })
    });
</script>
</body>
</html>