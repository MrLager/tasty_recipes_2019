<?php
namespace TastyRecipes\Integration;
require_once(__DIR__ . '\..\..\..\..\DatabaseInfo.php');


echo($host);
echo($user);
// echo($pass);
// echo($database);
$GLOBALS['host'] = 'localhost';
$GLOBALS['user'] = 'root';
$GLOBALS['pass'] = 'mysql';
$GLOBALS['database'] = 'tastyrecipes';

/**
 * this class was created inorder to hold the database connection
 */

class DatabaseConnection{
    private $dataBaseConnection;
    
    
    public function __construct()
    {
        $host = $GLOBALS['host'];
        $user = $GLOBALS['user'];
        $pass = $GLOBALS['pass'];
        $database = $GLOBALS['database']; 
        // $user = 'root';
        // $pass = 'mysql';
        // $database = 'tastyrecipes';
       
        // global $host;
        // global $user;
        // global $pass;
        // global $database;

        $this->dataBaseConnection = new \mysqli($host, $user, $pass, $database)
        //$this->dataBaseConnection = new \mysqli('localhost', 'root', 'mysql', 'tastyrecipes')
        OR die('Could not connect to database' . $this->dataBaseConnection->connect_error); 
    }

    // public function querry($querry)
    // {
    //      //gets a querty response from the database
    //     $test_querry_response = @mysqli_query($this->dataBaseConnection, $querry);
    //     //  $test_querry_response = @mysqli_query($this->dataBaseConnection, "SELECT pass FROM USERS WHERE user_name = 'simon'");
    //     //check if db was read
    //     // if(!$test_querry_response){throw new ErrorException('Could not read database.');}

    //     // takes the query object and puts in a assosiative php array
    //     $row = mysqli_fetch_all($test_querry_response);
    //     return $row;
    // }

    public function querry($querry, array $params)
    {
        $selectStmt = $this->dataBaseConnection->prepare($querry);
        call_user_func_array(array($selectStmt, "bind_param"), $params);
        $selectStmt->execute();
        $result = $selectStmt->get_result();
        if(!is_bool ($result)) //only if we are fetching a result, not storing in database
        {
            return $result->fetch_all(MYSQLI_ASSOC);//MYSQLI_ASSOC parameter to get asscociative array
        }
    }
  

    public  function __destruct() 
    {
        $this->dataBaseConnection->close();
    }
}