<!DOCTYPE HTML>
<html>
    <head>
        <script src="jquery.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
         <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>    
        <!--JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--Bootstrap-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <style>
            * {
                padding:0 auto;
                margin:0 auto;
                
            }
           button.btn-md 
            {
               margin:0%;
            }
            #row-main {
                margin:5%;
            }
            #wsimg {
                width:100%;
                height:650px;
            }
            #btn-row {
                margin-top:5%;
                margin-bottom:5%;
            }
            
       </style>
    </head>
    <body>
<!--NAV BAR - START-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">

                 <!-- Logo -->
                <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                    <a href="#" class="navbar-brand"></a>
                </div>
                <!-- Menu items -->
                <div class="collapse navbar-collapse" id="mainNavBar">
                   <ul class="nav navbar-nav">
                       <li class="active"><a href="home.php">Home</a></li>
                       <li><a href="index.php">Portfolio</a></li>
                       <li><a href="indicators.php">Economic Indicators</a></li>
                       <li><a href="positions1.php">Positions</a></li>
                   </ul>

                </div>
            </div>

        </nav>
<!--NAV BAR - END-->
<!--MAIN CONTENT - START-->
        <div class="row" id="row-main">
            <div  class="col-lg-4">
               <div class="row" id="btn-row">
                   
                    <a href = "index.php">
                       <button class="btn-md btn-block" id="">Index</button>
                   </a>
                   <a href = "positions1.php">
                       <button class="btn-md btn-block" id="btn-row">Positions</button>
                   </a>
                   <a href = "Models.php">
                       <button class="btn-md btn-block" id="btn-row">Models</button>
                   </a>
                   <a href = "#">
                       <button class="btn-md btn-block" id="btn-row">Index</button>
                   </a>
               </div>
                <div class="row" id="btn-row">
                   
               </div>
            </div>
            <div class="col-lg-8">
                <img src="Resources/wallstreet.jpg" id="wsimg">
            </div>
        </div>
        <!--MAIN CONTENT - END-->
        
    </body>
    
</html>