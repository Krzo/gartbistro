<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Gart Bistro</title>

    <link rel="stylesheet" href="assets/style.css">

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:600' rel='stylesheet' type='text/css'>

    <!-- font awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

    <!-- animate.css -->
    <link rel="stylesheet" href="assets/animate/animate.css" />
    <link rel="stylesheet" href="assets/animate/set.css" />

    <!-- gallery -->
    <link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- AOS animation on scroll #anlclk 20072017-->
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

    <!-- JAVASCRIPT SHOPPING CART -->
    <script src="assets/js/shoppingCart.js"></script>


    <!-- MDBOOTSTRAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/js/mdb.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/css/mdb.min.css" />

    <!-- SimpleCart -->
    <script src="assets/js/simpleCart.js"></script>


</head>

<body>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll" style="color: black;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <!--<span class="sr-only">Toggle navigation</span> Menu -->
                        <i class="fa fa-bars"></i>
                    </button>
                <div style="padding-left: 15px;">
                    <a href="https://www.lieferservice.at/snackman">
                            <button type="button" class="navbar-toggle pull-left">
                                <!--<span class="sr-only">Toggle navigation</span> Menu -->
                                <i class="fa fa-shopping-cart"></i>

                            </button>
                        </a>
                </div>
                <div class="navbar-brand"></div>
            </div>

            <!--<img src="images/logo.png" class="navbar-brand">-->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top: 10px">
                <ul class="nav navbar-nav navbar-right">
                    <li><a data-toggle="collapse" data-target=".navbar-collapse" href="#home">Home</a></li>
                    <li><a data-toggle="collapse" data-target=".navbar-collapse" href="#menu">Speisekarte</a></li>
                    <li><a data-toggle="collapse" data-target=".navbar-collapse" href="#contact">Kontakt</a></li>
                    <li><a data-toggle="collapse" data-target=".navbar-collapse" href="https://www.lieferservice.at/snackman">Bestellen</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left" id="opentimes">
                    <li><a href="">Geöffnet von 11-22 Uhr</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>





    <div class="container-fluid">
        <!-- Information Box -->
        
        <div class="msg msg-success" id="info-alert"> <span class="glyphicon glyphicon-info-sign"></span></div>
        
        
        <div class="row">
            <div class="col-md-2 pull-left">
                <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>
                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
                    <li class="active"><a href="#vtab1" data-toggle="tab">Döner</a></li>
                    <li><a href="#vtab2" data-toggle="tab">Pizza</a></li>
                    <li><a href="#vtab3" data-toggle="tab">Burger</a></li>
                    <li><a href="#vtab4" data-toggle="tab">Empfehlung des Hauses</a></li>
                    <li><a href="#vtab5" data-toggle="tab">Salate</a></li>
                    <li><a href="#vtab6" data-toggle="tab">Getränke</a></li>
                </ul>
            </div>



            <div class="col-md-7">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                        <div class="menu-body">

                            <!-- Section starts: Döner -->
                            <div class="menu-section">

                                <h3 class="menu-section-title">Döner</h3>


                                <?php
                                    define("HOST","mysqlsvr71.world4you.com");
                                    define("USER","sql7965842");
                                    define("PASSWORD","ixqgc@9");
                                    define("DATABASE","4712598db1");

                                    $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ("database connection failed");
                                    $sql  ="SELECT * FROM food";
                                    $result = mysqli_query($conn, $sql);   
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $food_id = $row["id"];
                                            $food_category = $row["food_category"];
                                            $food_name = $row["food_name"];
                                            $food_price = $row["food_price"];
                                            $food_description = $row["food_description"];
                                            if ($food_category == 1){
                                    ?>

                                    <!-- Item starts -->
                                    <div class="menu-item">
                                        <div class="menu-item-name">
                                            <?php echo $food_name; ?>
                                        </div>

                                        <div class="menu-item-price">
                                            €<?php echo $food_price; ?>
                                            <a class="item_add" href="javascript: simpleCart.add({name:'<?php echo $food_name; ?>',price: <?php echo $food_price; ?>}); additemtocart(<?php echo $food_id?>)">+ </a>
                                        </div>

                                        <div class="menu-item-description">
                                            <?php echo $food_description; ?>
                                        </div>

                                    </div>

                                    <?php 
                                            }
                                        } 
                                    } 
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="vtab2">
                        <div class="menu-body">

                            <!-- Section starts: Pizza -->
                            <div class="menu-section">

                                <h3 class="menu-section-title">Pizza</h3>
                                <?php
                                    $sql  ="SELECT * FROM food";
                                
                                    $result = mysqli_query($conn, $sql);   
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $food_category = $row["food_category"];
                                            $food_name = $row["food_name"];
                                            $food_price = $row["food_price"];
                                            $food_description = $row["food_description"];
                                            if ($food_category == 2){
                                    ?>

                                    <!-- Item starts -->
                                    <div class="menu-item">
                                        <div class="menu-item-name">
                                            <?php echo $food_name; ?>
                                        </div>

                                        <div class="menu-item-price">
                                            €<?php echo $food_price; ?>
                                            <a class="item_add" href="javascript: simpleCart.add({name:'<?php echo $food_name; ?>',price: <?php echo $food_price; ?>}); additemtocart(<?php echo $food_id?>)">+ </a>
                                        </div>
                                        <div class="menu-item-description">
                                            <?php echo $food_description; ?>
                                        </div>
                                    </div>

                                    <?php 
                                            }
                                        } 
                                    } 
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="simpleCart_items"></div>
                <span class="simpleCart_quantity"></span> Speisen - <span class="simpleCart_total"></span><br/>
                <a href="javascript:;" class="simpleCart_checkout"><button type="button" class="btn btn-success">Bezahlen</button></a><br/>
                <a href="javascript:simpleCart.empty();" class=""><button type="button" class="btn btn-info">Test Warenkorb leeren</button></a>
                
            </div>
        </div>
    </div>


    <!-- end container -->


    <!-- Footer Starts -->
    <div class="footer text-center spacer">
        <p class="wowload flipInX"><a href="https://www.facebook.com/GART-Bistro-in-Mäder-1826884027630066/"><i class="fa fa-facebook fa-2x"></i></a> <a href="#"><i class="fa fa-instagram fa-2x"></i></a> <a href="#"><i class="fa fa-twitter fa-2x"></i></a></p>
        Copyright 2017 Gart Bistro. All rights reserved.
    </div>
    <!-- # Footer Ends -->
    <a href="#home" class="gototop"><i class="fa fa-angle-up  fa-3x"></i></a>






    <!-- jquery -->
    <script src="assets/jquery.js"></script>

    <!-- wow script -->
    <script src="assets/wow/wow.min.js"></script>


    <!-- boostrap -->
    <script src="assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>

    <!-- jquery mobile -->
    <script src="assets/mobile/touchSwipe.min.js"></script>
    <script src="assets/respond/respond.js"></script>

    <!-- gallery -->
    <script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>
    <!--
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDGBcTO5K6CmijbIdYxYFl1HflmT1Kkgmw&sensor=false&extension=.js'></script>
-->
</body>

<style>
    body {
        padding-top: 100px;
    }

    .nav-tabs-dropdown {
        display: none;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .nav-tabs-dropdown:before {
        content:"\e114";
        font-family: 'Glyphicons Halflings';
        position: absolute;

    }

    @media screen and (min-width: 769px) {
        #nav-tabs-wrapper {
            display: block!important;
        }
    }

    @media screen and (max-width: 768px) {
        .nav-tabs-dropdown {
            display: block;
        }
        #nav-tabs-wrapper {
            display: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            text-align: center;
        }
        .nav-tabs-horizontal {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        }
        .nav-tabs-horizontal>li {
            float: none;
        }
        .nav-tabs-horizontal>li+li {
            margin-left: 2px;
        }
        .nav-tabs-horizontal>li,
        .nav-tabs-horizontal>li>a {
            background: transparent;
            width: 100%;
        }
        .nav-tabs-horizontal>li>a {
            border-radius: 4px;
        }
        .nav-tabs-horizontal>li.active>a,
        .nav-tabs-horizontal>li.active>a:hover,
        .nav-tabs-horizontal>li.active>a:focus {
            color: #ffffff;
            background-color: #428bca;
        }
    }

    .menu-body {
        max-width: 680px;
        margin: 0 auto;
        display: block;
    }



    .menu-section-title {
        font-family: georgia;
        font-size: 50px;
        display: block;
        font-weight: normal;
        margin: 20px 0;
        text-align: Center;
    }

    .menu-item {
        margin: 20px 0;
        font-size: 18px;

    }

    .menu-item-name {
        font-family: helvetica;
        font-weight: bold;
        border-bottom: 1.25px;
        border-bottom-style: dashed;

    }

    .menu-item-description {
        font-style: italic;
        font-size: .9em;
        line-height: 1.5em;
    }

    .menu-item-price {
        float: right;
        font-weight: bold;
        font-family: arial;
        margin-top: -25px;
    }

    .menu-item item_name {
        color: #432a19 !important;
    }

    .menu-item a {
        color: #432a19;
    }

    a:visited {
        text-decoration: none;
        color: #432a19;
    }

    a:hover {
        text-decoration: none;
        color: #432a19;
    }

    a:focus {
        text-decoration: none;
        color: #432a19;
    }

    a:hover,
    a:active {
        color: #432a19
    }

    .menu-item a:hover {
        border-style: 3px solid #6eb52c;
    }
    
    td.item-decrement {
        padding: 5px;
    }    
    td.item-quantity {
        padding: 5px;
    }    
    td.item-increment {
        padding: 5px;
    }    
    td.item-name {
        padding: 5px;
    }    
    td.item-price {
        padding: 5px;
    }
    
    
    .msg {
    background: #fefefe;
    color: #666666;
    font-weight: bold;
    font-size: small;
    padding: 12px;
    padding-left: 16px;
    border-top: solid 3px #CCCCCC;
    border-radius: 5px;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 10px 10px -5px rgba(0,0,0,.08);
       -moz-box-shadow: 0 10px 10px -5px rgba(0,0,0,.08);
            box-shadow: 0 10px 10px -5px rgba(0,0,0,.08);
}
    .msg-clear {
        border-color: #fefefe;
        -webkit-box-shadow: 0 7px 10px -5px rgba(0,0,0,.15);
           -moz-box-shadow: 0 7px 10px -5px rgba(0,0,0,.15);
                box-shadow: 0 7px 10px -5px rgba(0,0,0,.15);
    }
    .msg-info {
        border-color: #b8dbf2;
    }
    .msg-success {
        border-color: #cef2b8;
    }
    .msg-warning {
        border-color: rgba(255,165,0,.5);
    }
    .msg-danger {
        border-color: #ec8282;
    }
    .msg-primary {
        border-color: #9ca6f1;
    }
    .msg-magick {
        border-color: #e0b8f2;
    }
    .msg-info-text {
        color: #39b3d7;
    }
    .msg-success-text {
        color: #80d651;
    }
    .msg-warning-text {
        color: #db9e34;
    }
    .msg-danger-text {
        color: #c9302c;
    }
    .msg-primary-text {
        color: rgba(47,106,215,.9);
    }
    .msg-magick-text {
        color: #bb39d7;
    }

</style>
<script type="text/javascript">
    
    $(document).ready (function(){
        $("#info-alert").hide();
        simpleCart.bind( "afterAdd" , function( item ){
            $("#info-alert").text(item.get("name")+' ('+item.get("price")+' €) ' + " wurde dem Warenkorb hinzugefügt!" );
            $("#info-alert").fadeTo(5000, 100).slideUp(500, function(){
                $("#info-alert").slideUp(500);
            });   
        });
     });
    
    simpleCart.currency( "EUR" );
    simpleCart({
    cartColumns: [
        { view: "decrement" , label: false , text: " - " } ,
        { attr: "quantity" , label: false} ,
        { view: "increment" , label: false , text: " + " } ,
        { attr: "name" , label: false } ,
        { attr: "price" , label: false, view: 'currency' } ,
        ]
    });

    
    $('.nav-tabs-dropdown').each(function(i, elm) {

        $(elm).text($(elm).next('ul').find('li.active a').text());

    });

    $('.nav-tabs-dropdown').on('click', function(e) {

        e.preventDefault();

        $(e.target).toggleClass('open').next('ul').slideToggle();

    });

    $('#nav-tabs-wrapper a[data-toggle="tab"]').on('click', function(e) {

        e.preventDefault();

        $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());

    });

</script>

</html>
