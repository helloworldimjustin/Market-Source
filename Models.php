<!DOCTYPE HTML>
<html>
    <head>
        <script src="jquery.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
            #row-main 
            {
                margin:5%;
            }
            #wsimg 
            {
                width:100%;
                height:650px;
            }
            #form-row
            {
                margin-top:5%;
                margin-bottom:5%;
            }
            div.fv-row 
            {
                margin:2%;
            }
            .menu-btn
            {
                margin-top:2%;
                margin-bottom:2%;
            }
            .form
            {
                border: 1px solid red;
                text-align: center;
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
                    <a href="#" class="navbar-brand">DeezNuts</a>
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
        <div class="row container-fluid" id="row-main">
            <!--BUTTON CONTAINER START-->
            <div  class="col-lg-4 container" style="border: 1px solid red">
               <div class="row">
						<button class="btn btn-lg btn-block menu-btn form-button futureValue" onclick="showForm('fv')" id="fv-btn">Future Value</button>
				</div> 
                <div class="row">
						<button class="btn btn-lg btn-block menu-btn" onclick="">Future Value</button>
				</div>
               <div class="row">
						<button class="btn btn-lg btn-block menu-btn" onclick="">Future Value</button>
				</div>
               <div class="row">
						<button class="btn btn-lg btn-block menu-btn" onclick="">Future Value</button>
				</div>
                <div class="row">
						<button class="btn btn-lg btn-block menu-btn" onclick="">Future Value</button>
				</div>
               <div class="row">
						<button class="btn btn-lg btn-block menu-btn" onclick="">Future Value</button>
				</div>
            </div>
            <!--BUTTON CONTAINER END-->
            
            <!--FORM CONTAINER START-->
            <div class="col-lg-8 form" id="form-container">
                <!--FUTURE VALUE FORM START-->
                <div id="futureValue" style="display:none">
                    <div class="row">
                        <a href="#" onclick="hideForm('fv')" style="float:left" alt="Close Form" id="hideButtons"><button>Close Form</button></a>
                    </div>
                    <div class="row" id="form-row">
                       <div class="row fv-row">
                           <label class="" style="">Future Values: General Formula</label>
                       </div>
                        <div class="row fv-row">
                            <label>Present Value</label>
                            <input id="pv">
                        </div>
                        <div class="row fv-row">
                            <label>R: Period Interest Rate, as Percent</label>
                            <input id="ir">
                        </div>
                        <div class="row fv-row">
                            <label>T: Number of Periods</label>
                            <input id="prds">
                        </div>
                        <div class="row fv-row">
                            <label>FV Interest Factor = (1+r)^t</label>
                        </div>
                        <div class="row fv-row">
                            <div id="fvAns"></div>
                        </div>
                    
                   </div>
                    <div class="row" id="form-row">
                      <div class="col-sm-6">
                          <button class="btn-md btn-block" id="btn-row" onclick="getFutureValue()">Calculate Future Value</button>
                      </div>
                      <div class="col-sm-6">
                          <button class="btn-md btn-block" id="btn-row" onclick="clearFvVars()">Clear</button>
                      </div>
                       
               </div>
                </div>   
                <!--FUTURE VALUE FORM END-->
            </div>
            <!--FORM CONTAINER END-->
        </div>
        <!--MAIN CONTENT - END-->
        
    </body>
    <script>
    /**
     * @param btn is a string to determine the functions operation 
     * reveals form elements for the future value feature
     */
    function showForm(btn)
    {         
        if(btn == "fv")
        {
            $("#form-container").show();
            $("#futureValue").show();
        }
        console.log("show");
    }
    /**
     * @param btn is a string to determine the functions operation 
     * hides form elements for the future value feature
     */
    function hideForm(btn)
    {
        
        if(btn == "fv")
        {
            $("#form-container").hide();
            $("#futureValue").hide();
        }
        console.log("hidden");

        $("button.form-button").off("click",hideForm);
        $("button.form-button").on("click",function(btn){
            showForm(btn);
        });
    }
    /**
     * returns the future value of an investment 
     */
    function getFutureValue()
    {
        var presentValue = document.getElementById("pv").value;
        var interestRate = document.getElementById("ir").value;
        var noOfPeriods = document.getElementById("prds").value;
        
        $.ajax(
        {
            type:"POST",
            url: "positionsController.php?calculateFutureValue="+"",
            data: 
            {
                'pv' : presentValue, 
                'ir' : interestRate, 
                'prds': noOfPeriods
            },
            success: function(data)
            {
                console.log(data);
                document.getElementById("fvAns").innerHTML = data;
            }
        });
        
        
        
        
        console.log(presentValue);
        console.log(interestRate);
        console.log(noOfPeriods);
    }
    /**
     * clears the values in the future value form
     */
    function clearFvVars()
    {
        document.getElementById("pv").value = "";
        document.getElementById("ir").value = "";
        document.getElementById("prds").value = "";
    }
    </script>
    
</html>