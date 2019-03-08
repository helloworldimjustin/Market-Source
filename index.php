<html>
<head>
    <script src="jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--CHART.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--Stock Chart-->
    <script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script> 
    <style>
        #myChart 
        {
            width:1000px;
            height:1000px;
        }
        #top-row
        {
            margin-left:5%;
            margin-right:5%;
            margin-bottom:2%;
            padding:1%;
            /*padding:auto;*/
            height: 1000px;
            width: 2000px;

        }
        #chartLocation
        {
            
           
        }
        body
        {
            padding:2%;
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
                   <li><a href="home.php">Home</a></li>
                   <li class="active"><a href="index.php">Portfolio</a></li>
                   <li><a href="indicators.php">Economic Indactors</a></li>
                   <li><a href="positions1.php">Positions</a></li>
               </ul>
               
            </div>
        </div></nav>
    <!--NAV BAR - END-->
    <!--MAIN CONTENT - START -->
    
    <div class="row" id="row-main">
        <div class="row" style="border:" id="top-row">    
            <div class="col-md-8">
                <canvas id="myChart" width="2" height="2"></canvas>
            </div>
            <div class="col-md-2 chart" id = "buttons">
                    <button class="btn btn-sm btn-block" style="border:solid;" onclick="updatePortfolio()" >Insert</button>
            </div>
            <div class="col-md-2">
                <div class = "row">
                    <div class="col-sm-2">
                        <label>Date</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="date" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Value</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="value" > 
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <!--MAIN CONTENT - END -->       
</body>

<script>
var array = [];

loadPortfolioValues();

/**
 * loads data from db table "stocks"
 */
function loadData()
{
        $.ajax({
            type: 'GET',
            url: "positionsController.php?run="+"", //create main function to call the positionsFUnctions class
            success: 
                function (data) {
                    console.log(data);
                    document.getElementById("target").innerHTML= data;
        
                }
        });
}
/**
 * inserts data into db table "stocks"
 */
function insertIntoPortfolio()
{
    var name = document.getElementById("name").value;
    var symbol = document.getElementById("symbol").value;
    var tradeprice = document.getElementById("tradeprice").value;
    var lastprice = document.getElementById("lastprice").value;
    var profitloss = document.getElementById("profitloss").value;
    $.ajax({
        type:"POST",
        url: "positionsController.php?runInsertIntoPositions="+"",
        data: {'name' : name, 
                'symbol' : symbol, 
                'tradeprice': tradeprice, 
                'lastprice' : lastprice, 
                'profitloss' : profitloss},
        success: function(data){
            console.log(data);
            document.getElementById("iip").innerHTML = data;
        }
    });
}

/**
 * loads data from db table "portfolioValue"
 */
function loadPortfolioValues()
{
    $.ajax({
            async: false,
            type: 'GET',
            url: "positionsController.php?loadPortfolioValue="+"", 

            success: 
                function (data) {
                    array = JSON.parse(data);
                    console.log(array);
                    console.log("yoo");
                }
        });
    console.log(array);  
    loadPortfolioGraph(array);
}

/**
 * loads a chart with data from db table "portfolioValue"
 */
function loadPortfolioGraph(array){
  const CHART = document.getElementById("myChart"); 
  let linegraph = new Chart(CHART, 
  {
    type: 'line',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: 'Portfolio Value',            
            data: array,

            backgroundColor: [
                
                'rgba(54, 162, 235, 0.2)',
                
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:false
                }
            }]
        }
    }
});
} 

/**
 * updates data in db table "portfolioValue"
 */
function updatePortfolio()
{
    var date = document.getElementById("date").value;
    var value = document.getElementById("value").value;

    $.ajax({
        type:"POST",
        url: "positionsController.php?runUpdatePortfolio="+"",
        data: {'date' : date, 
                'value' : value}, 
                
        success: function(data){
            console.log(data);
            loadPortfolioValues();
        }
    });
    
}    


function showInsert()
{
    $("#buttonDisplay").show();
    console.log("showInsert() ran");
}

</script>
</html>