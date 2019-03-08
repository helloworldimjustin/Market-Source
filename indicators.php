<!DOCTYPE HTML>
<html>
    <head>
        <script src="jquery.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <!--Economic Indicators:https://www.investopedia.com/university/releases/philadelphiafedindex.asp | https://www.census.gov/economic-indicators/  -->
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
            .charts{
              margin-top:5%;
              /*text-align: center;*/
            }
            .indicators{
              margin-top:5%;
            }
            .marketTitles{
              font-size:75px;
              margin-top:1%;
              margin-bottom:1%;
            }
            .securityTitles{
              font-size:35px;
              margin: 3%;
              /*margin-top:1%;
              margin-bottom:1%;*/
            }
            .row-global-markets{
              margin-top:1%;
              margin-bottom:1%;
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

            <div class="row economic-data-row">
                <div class="row btnContainter">
                    <div class="row"> 
                      <h1 class="marketTitles">Economic Indicators</h1>
                    </div>
                    <button id = "show_btn" type = "button" onclick="showHide(false, '#economicIndicators')">Show</button>
                    <button id = "hide_btn" type = "button" onclick="showHide(true, '#economicIndicators')">Hide</button>
                </div>

                <div class="row indicators" id="economicIndicators" style="display:none">
                  <div class="row" id="row-econ-indics">
                      <div class="col-lg-4 col-CPI">
                        <div class="row">
                            <a href="http://www.investopedia.com/terms/c/consumerpriceindex.asp">
                              <h2>CPI</h2>
                            </a>   
                          </div>
                          <div class="row">
                              <h4>Consumer Price Index</h4>
                          </div>
                          <div class="row">
                            <canvas id="chart1" width="40" height="30"></canvas>
                          </div>    
                      </div>
                      <div class="col-lg-4 col-PMI" >
                        <div class="row">   
                          <a href="http://www.investopedia.com/terms/p/pmi.asp">
                            <h2>PMI</h2>
                          </a>
                          </div>
                          <div class="row">
                            
                              <h4>Purchasing Manager's Index</h4>
                            
                          </div>
                          <div class="row">
                            <canvas id="chart2" width="40" height="30"></canvas>
                          </div>
                          
                      </div>
                      <div class="col-lg-4 col-ISM">
                        <div class="row">   
                          <a href="http://www.investopedia.com/terms/i/ism-mfg.asp">
                            <h2>PPI</h2>
                          </a>
                          </div>
                          <div class="row">
                            <h4>Producer's Price Index</h4>
                          </div>
                          <div class="row">
                            <canvas id="chart3" width="40" height="30"></canvas>
                          </div>
                            
                      </div>
                  </div>
                  <div class="row" id="row-econ-indics">
                      <div class="col-lg-4 col-CPI">
                        <div class="row">
                            <a href="http://www.investopedia.com/terms/c/consumerpriceindex.asp">
                              <h2>EPS</h2>
                            </a>   
                          </div>
                          <div class="row">
                              <h4>Earnings per Share</h4>
                          </div>
                          <div class="row">
                            <canvas id="chart4" width="40" height="30"></canvas>
                          </div>    
                      </div>
                      <div class="col-lg-4 col-PMI" >
                        <div class="row">   
                          <a href="http://www.investopedia.com/terms/p/pmi.asp">
                            <h2>PE</h2>
                          </a>
                          </div>
                          <div class="row">
                            
                              <h4>Price per Earnings per Share</h4>
                            
                          </div>
                          <div class="row">
                            <canvas id="chart5" width="40" height="30"></canvas>
                          </div>
                          
                      </div>
                      <div class="col-lg-4 col-ISM">
                        <div class="row">   
                          <a href="http://www.investopedia.com/terms/i/ism-mfg.asp">
                            <h2>GDP</h2>
                          </a>
                          </div>
                          <div class="row">
                            <h4>Gross Domestic Product</h4>
                          </div>
                          <div class="row">
                            <canvas id="chart6" width="40" height="30"></canvas>
                          </div>
                            
                      </div>
                  </div>
                </div>
            </div>
            <div class="row major-indicies-data-row">
                <div class="row btnContainter">
                    <div class="row"> 
                      <h1 class="marketTitles">Major Indicies</h1>
                    </div>
                    <button id = "show_btn" type = "button" onclick="showHide(false, '#majorIndicies')">Show</button>  
                    <button id = "hide_btn" type = "button" onclick="showHide(true, '#majorIndicies')">Hide</button>
                </div>
                <div class="row charts" id="majorIndicies" style="display:none">
                  <div class="row row-global-markets">
                    
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="row" >
                            <h3 class="securityTitles">SP500</h3>
                            <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "ES1!",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                            <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="row">
                          <h3 class="securityTitles">NASDAQ</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "NQ1!",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="row" >
                          <h3 class="securityTitles">DOWJ</h3>    
                          <!-- TradingView Widget BEGIN -->       
                          <script type="text/javascript">
                            new TradingView.widget({
                            "width": 880,
                            "height": 810,
                            //"symbol": "NASDAQ:AAPL",
                            "symbol": "YM1!",
                            "interval": "D",
                            "timezone": "Etc/UTC",
                            "theme": "White",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "allow_symbol_change": true,
                            "hideideas": true
                            });   
                          </script>
                        <!--TradingView Widget END -->
                        </div>
                    </div>
                  </div>
                  <div class="row row-global-markets">
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="row" >
                            <h3 class="securityTitles">Euro Stoxx 50</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "MOY0",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="row">
                            <h3 class="securityTitles">Hang Seng</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "HSI",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="row" >
                            <h3 class="securityTitles">NIKKEI 225</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "XLF",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                  </div>
                  <div class="row row-global-markets">
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="row">
                            <h3 class="securityTitles">DAX (Germany)</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "INDEX:DAX",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="row">
                            <h3 class="securityTitles">CAC (Paris)</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "CAC",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="row">
                            <h3 class="securityTitles">MSCI AC</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "0J01",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row sectors-row">
                <div class="row btnContainter">
                    <div class="row"> 
                          <h1 class="marketTitles">Sectors</h1>
                    </div>
                    <button id = "show_btn" type = "button" onclick="showHide(false, '#sectors')">Show</button>  
                    <button id = "hide_btn" type = "button" onclick="showHide(true, '#sectors')">Hide</button>
                </div>

                <div class="row charts" id="sectors" style="display:none">
                  <div class="row row-global-markets">
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="row" >
                            <h3 class="securityTitles">Brent Crude</h3>       
                            <!-- TradingView Widget BEGIN -->
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "CL1!",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="row">
                            <h3 class="securityTitles">Industrials</h3>       
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "XLI",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="row" >
                          <h3 class="securityTitles">Consumer Discretionary</h3>       
                        <!-- TradingView Widget BEGIN -->       
                          <script type="text/javascript">
                            new TradingView.widget({
                            "width": 880,
                            "height": 810,
                            //"symbol": "NASDAQ:AAPL",
                            "symbol": "XLY",
                            "interval": "D",
                            "timezone": "Etc/UTC",
                            "theme": "White",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "allow_symbol_change": true,
                            "hideideas": true
                            });   
                          </script>
                        <!--TradingView Widget END -->
                        </div>
                    </div>
                  </div>
                  <div class="row row-global-markets">
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="row" >
                            <h3 class="securityTitles">Materials</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "XLB",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="row">
                            <h3 class="securityTitles">Consumer Staples</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "XLP",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="row" >
                          <h3 class="securityTitles">Health Care</h3>
                        <!-- TradingView Widget BEGIN -->       
                          <script type="text/javascript">
                            new TradingView.widget({
                            "width": 880,
                            "height": 810,
                            //"symbol": "NASDAQ:AAPL",
                            "symbol": "XLV",
                            "interval": "D",
                            "timezone": "Etc/UTC",
                            "theme": "White",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "allow_symbol_change": true,
                            "hideideas": true
                            });   
                          </script>
                        <!--TradingView Widget END -->
                        </div>
                    </div>
                  </div>
                  <div class="row row-global-markets">
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="row" >
                          <h3 class="securityTitles">Energy</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "XLE",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="row">
                            <h3 class="securityTitles">Telecommunications</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "XTL",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="row" >
                          <h3 class="securityTitles">Utilities</h3>
                        <!-- TradingView Widget BEGIN -->       
                          <script type="text/javascript">
                            new TradingView.widget({
                            "width": 880,
                            "height": 810,
                            //"symbol": "NASDAQ:AAPL",
                            "symbol": "XLU",
                            "interval": "D",
                            "timezone": "Etc/UTC",
                            "theme": "White",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "allow_symbol_change": true,
                            "hideideas": true
                            });   
                          </script>
                        <!--TradingView Widget END -->
                        </div>
                    </div>
                  </div>
                  <div class="row row-global-markets">
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="row" >
                          <h3 class="securityTitles">Technology</h3>
                          <!-- TradingView Widget BEGIN -->       
                            <script type="text/javascript">
                              new TradingView.widget({
                              "width": 880,
                              "height": 810,
                              //"symbol": "NASDAQ:AAPL",
                              "symbol": "XLK",
                              "interval": "D",
                              "timezone": "Etc/UTC",
                              "theme": "White",
                              "style": "1",
                              "locale": "en",
                              "toolbar_bg": "#f1f3f6",
                              "enable_publishing": false,
                              "allow_symbol_change": true,
                              "hideideas": true
                              });   
                            </script>
                          <!--TradingView Widget END -->
                          </div>
                      </div>
                  </div>
                </div>
            </div>

        </div>
      <!--MAIN CONTENT - END-->    
    </body>
    
<script>

var closingDates = [];
var closingPrices = [];
getGDPData();
getCPIData();
getPMIData();
getPPIData();

$(document).ready(function(){

    const CHART4 = document.getElementById("chart4"); 
    console.log(CHART4);
    let linegraph4 = makeGraph(CHART4, ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"], [3000, 3500, 3940, 4100, 4500, 3999]);

    const CHART5 = document.getElementById("chart5"); 
    console.log(CHART5);
    var linegraph5 = makeGraph(CHART5, ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"], [3000, 3500, 3940, 4100, 4500, 3999]);
});

/**
 * returns GDP data from the Federal Reserve
 */
function getGDPData(){
    
    $.ajax({
            type: 'GET',
            url: "positionsController.php?getGDPData="+"", //create main function to call the positionsFUnctions class
            success: 
                function (data) {
                    
                    var fredData = JSON.parse(JSON.parse(data));

                    console.log(fredData);
                    
                    var gdpFigures = [];
                    var gdpDates = [];

                    for(i in fredData.observations){
                        
                        gdpFigures[i] = parseInt(fredData.observations[i].value);
                        gdpDates[i] = parseInt(fredData.observations[i].date);

                    }
                    
                    var CHART6 = document.getElementById("chart6");                     
                    var linegraph6 = makeGraph(CHART6, gdpDates, gdpFigures);
                }
            
                
    });     
}
/**
 * returns CPI data from the Federal Reserve
 */
function getCPIData(){
    $.ajax({
            type: 'GET',
            url: "positionsController.php?getCPIData="+"", //create main function to call the positionsFUnctions class
            success: 
                function (data) {
                    
                    var fredData = JSON.parse(JSON.parse(data));

                    console.log(fredData);
                    
                    var cpiFigures = [];
                    var cpiDates = [];

                    for(i in fredData.observations){
                        
                        cpiFigures[i] = parseInt(fredData.observations[i].value);
                        cpiDates[i] = parseInt(fredData.observations[i].date);

                    }
                    
                    const CHART1 = document.getElementById("chart1"); 
                    console.log(CHART1);
                    let linegraph1 = makeGraph(CHART1, cpiDates, cpiFigures);
                }
    });
}
/**
 * returns PMI data from the Federal Reserve
 */
function getPMIData(){
    $.ajax({
            type: 'GET',
            url: "positionsController.php?getPMIData="+"", //create main function to call the positionsFUnctions class
            success: 
                function (data) {
                    
                    var fredData = JSON.parse(JSON.parse(data));

                    console.log(fredData);
                    
                    var pmiFigures = [];
                    var pmiDates = [];

                    for(i in fredData.observations){
                        
                        pmiFigures[i] = parseInt(fredData.observations[i].value);
                        pmiDates[i] = parseInt(fredData.observations[i].date);

                    }

                    const CHART2 = document.getElementById("chart2"); 
                    console.log(CHART2);
                    let linegraph2 = makeGraph(CHART2, pmiDates, pmiFigures);
                    
                    
                }
    });
}

/**
 * returns PPI data from the Federal Reserve
 */
function getPPIData(){
    $.ajax({
            type: 'GET',
            url: "positionsController.php?getPPIData="+"", //create main function to call the positionsFUnctions class
            success: 
                function (data) {
                    
                    var fredData = JSON.parse(JSON.parse(data));

                    console.log(fredData);
                    
                    var ppiFigures = [];
                    var ppiDates = [];

                    for(i in fredData.observations){
                        
                        ppiFigures[i] = parseInt(fredData.observations[i].value);
                        ppiDates[i] = parseInt(fredData.observations[i].date);

                    }

                    const CHART3 = document.getElementById("chart3"); 
                    console.log(CHART3);
                    let linegraph3 = makeGraph(CHART3, ppiDates, ppiFigures); 
                }
    });
}

 /**
   * creates and returns a new chart.js chart
   * @param: name is the name of the chart
   * @param: labels are the chart's x axis labels
   * @param: dataset is the dataset to be displayed on the chart
   */
function makeGraph(name, labels, dataset){
    let chart =  new Chart(name, {//this.name
            type: 'line',
            data: {
                labels: labels,
                datasets: [ 
                    {
                    label: '# of Votes',
                    data: dataset,//this.dataset
                    backgroundColor: [
                        
                        'rgba(54, 162, 235, 0.2)',
                        
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        
                    ],
                    borderWidth: 1
                }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            //beginAtZero:true
                            beginAtZero:false
                        }
                    }]
                }
            }
        })
    return chart;
}

/**
 * @param: visible is a boolean
 * @param: id is an element id
*/
function showHide(visible, id){
  if(visible){
    $(id).hide();
  }else if(!visible){
    $(id).show();
  }
  

}
     
</script>
    
</html> 