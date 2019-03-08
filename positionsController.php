<?php
$futureValue;
$dsn;
$usename;
$password;
$db;

/**
 * @param $db PDO object for querying db
 * returns the "Account Value" for each stock in the stockportfolio table
 */
function loadPortfolioValue($db)
{
   $valueArray = [];
    $query_C = "SELECT * FROM stockportfolio ORDER BY Date ASC";
    $statement = $db->prepare($query_C);
    $statement->execute();
    $positions = $statement->fetchAll();
    $statement->closeCursor();


    for($i=0;$i<sizeof($positions);$i++)
    {
        $valueArray[$i] = $positions[$i]["Account_Value"];
    }
    
    echo json_encode($valueArray);      
}

/**
 * @param $db PDO object for querying db
 * inserts a record into the "stocks" table
 */
function insertIntoPositions($db)
{   
    try
    {   
        $query = "INSERT INTO stocks(symbol, tradeprice, lastprice, profitloss, name) VALUES (";
        
        if(isset($_REQUEST['symbol']))
        {
            $query = $query."'".$_REQUEST['symbol']."', ";
        }
        if(isset($_REQUEST['tradeprice']))
        {
            $query = $query."'".$_REQUEST['tradeprice']."', ";
        }
        if(isset($_REQUEST['lastprice']))
        {
            $query = $query."'".$_REQUEST['lastprice']."', ";
        }
        if(isset($_REQUEST['profitloss']))
        {
            $query = $query."'".$_REQUEST['profitloss']."', ";
        }
        if(isset($_REQUEST['name']))
        {
            $query = $query."'".$_REQUEST['name']."') ";
        }
        
        echo "<p>".$query."</p>";
    
        
        $statement = $db->prepare($query);
        $statement->execute();
        $positions = $statement->fetchAll();
        $statement->closeCursor();
    }
    catch(PDOException $e)
    {
        echo "<p>PDOException error inserting into to DB</p>";
    }
}
/**
 * @param $db PDO object for querying db
 * inserts a record into the "porftoliovalue" table
 */
function insertIntoPortfolio($db)
{
    try {    
        $query = "INSERT INTO portfoliovalue(date, portfoliovalue) VALUES (";
        
        ///Get variables from form
        if(isset($_REQUEST['date']))
        {
            $query = $query."'".$_REQUEST['date']."', ";
        }
        if(isset($_REQUEST['portfoliovalue']))
        {
            $query = $query."'".$_REQUEST['tradeprice']."', ";
        }
        
        echo "<p>".$query."</p>";
    
        $statement = $db->prepare($query);
        $statement->execute();
        $positions = $statement->fetchAll();
        $statement->closeCursor();
    }
    catch(PDOException $e)
    {
        echo "<p>PDOException error inserting into to DB</p>";
    }
}

/**
 * @param $db PDO object for querying db
 * updates the "stockportfolio" table
 */
function updatePortfolio($db)
{
    try
    {
        
        $query = "INSERT INTO stockportfolio(Date, Account_Value) VALUES (";
        
        ///Get variables from form
        if(isset($_REQUEST['date']))
        {
            $query = $query."'".$_REQUEST['date']."', ";
        }
        if(isset($_REQUEST['value']))
        {
            $query = $query."'".$_REQUEST['value']."') ";
        }
        
        echo "<p>".$query."</p>";
    
        
        $statement = $db->prepare($query);
        $statement->execute();
        $positions = $statement->fetchAll();
        $statement->closeCursor();
    }
    catch(PDOException $e)
    {
        echo "<p>PDOException error inserting into to DB</p>";
    }
}

/**
 * Calculates the future value of an investment
 */
function calculateFutureValue()
{
    
    //Set up values for fv equation
    $presentValue = (int)$_REQUEST['pv'];
    $interestRate = (float)$_REQUEST['ir'];
    $noOfPeriods = (float)$_REQUEST['prds'];
    
    //Compute future value
    $interestFactor = pow((1+$interestRate), $noOfPeriods);
    $GLOBAL['futureValue'] = $presentValue*$interestFactor;
    echo round($GLOBAL['futureValue'],2); 
}

//Not Being Used
function returnFutureValue(){}

/**
 * REST API call to alphavantage
 * retrieves pricing information on Apple stock
 */
function getMarketData()
{
    $API_KEY = "demo";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=AAPL&apikey=Y5OX8VF2Z85VR3FR"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    echo json_encode($server_output);
}

/**
 * REST API call to the Federal Reserve 
 * retrieves GDP data series
 */
function getGDPData(){
    $API_KEY = "demo";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,("https://api.stlouisfed.org/fred/series/observations?series_id=GDPCA&realtime_start=2005-07-04&realtime_end=2018-08-01&api_key=78503e4e8c980e41ce1faa4dffcd0ef2&file_type=json"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    echo json_encode($server_output);
}

/**
 * REST API call to the Federal Reserve 
 * retrieves CPI data series
 */
function getCPIData(){
    $API_KEY = "demo";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,("https://api.stlouisfed.org/fred/series/observations?series_id=CPIAUCSL&realtime_start=2005-07-04&realtime_end=2018-08-01&api_key=78503e4e8c980e41ce1faa4dffcd0ef2&file_type=json"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    echo json_encode($server_output);
}

/**
 * REST API call to the Federal Reserve 
 * retrieves PMI data series
 */
function getPMIData(){
    $API_KEY = "demo";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,("https://api.stlouisfed.org/fred/series/observations?series_id=MANEMP&realtime_start=2005-07-04&realtime_end=2018-08-01&api_key=78503e4e8c980e41ce1faa4dffcd0ef2&file_type=json"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    echo json_encode($server_output);
}

/**
 * REST API call to the Federal Reserve 
 * retrieves PPI data series
 */
function getPPIData(){
    $API_KEY = "demo";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,("https://api.stlouisfed.org/fred/series/observations?series_id=PCU325211325211&realtime_start=2005-07-04&realtime_end=2018-08-01&api_key=78503e4e8c980e41ce1faa4dffcd0ef2&file_type=json"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    echo json_encode($server_output);
}

function loadPositions($db)
{
    echo "<p>loadPositions </p>"; 
}

try
{
    $dsn = 'mysql:host=localhost;dbname=Portfolio';
    $username = 'root';
    $password = '1234';
    $db = new PDO($dsn,$username, $password);
}
catch(PDOException $e)
{
    $error_message = $e->getMessage(); 
}

if(isset($_REQUEST["run"]))
{
    loadPositions($GLOBALS['db']);
}
else if(isset($_REQUEST["runUpdatePortfolio"]))
{
    updatePortfolio($GLOBALS['db']);
}
else if(isset($_REQUEST["runInsertIntoPositions"]))
{
    insertIntoPortfolio($GLOBALS['db']);
}
else if(isset($_REQUEST["calculateFutureValue"]))
{
    calculateFutureValue();
}
else if(isset($_REQUEST["loadPortfolioValue"]))
{
    loadPortfolioValue(($GLOBALS['db']));
}
else if(isset($_REQUEST["getMarketData"]))
{
    getMarketData();
}
else if(isset($_REQUEST["getGDPData"]))
{
    getGDPData();
}
else if(isset($_REQUEST["getCPIData"]))
{
    getCPIData();
}
else if(isset($_REQUEST["getPMIData"]))
{
    getPMIData();
}
else if(isset($_REQUEST["getPPIData"]))
{
    getPPIData();
}



?>