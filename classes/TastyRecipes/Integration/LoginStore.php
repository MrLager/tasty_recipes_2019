<?php
namespace TastyRecipes\Integration;
require_once(__DIR__ . '\..\..\..\..\DatabaseInfo.php');
$host = 'localhost';
$user = 'root';
$pass = 'mysql';
$database = 'tastyrecipes';
class LoginStore
{
    private $userCredQuerry; //why can't we use const?
    private $userIdQuerry;
    private $userNameQuerry;
    private $storeUserCredQuerry;
    private $userQuerry;

    // public function  __construct()
    // {
    //     $this->userCredQuerry = "SELECT pass FROM USERS WHERE user_name = '";
    //     $this->userIdQuerry = "SELECT user_id FROM USERS WHERE user_name = '";
    //     $this->userNameQuerry = "SELECT user_name FROM USERS WHERE user_id = '";
    // }

    // public function getPasswordForUserName($userName)
    // {
    //     return (new DatabaseConnection())->querry(stripslashes($this->userCredQuerry . $userName . "'"))[0][0];
    // }

    // public function get_user_id($userName)
    // {
    //     return (new DatabaseConnection())->querry(stripslashes($this->userIdQuerry . $userName . "'"))[0][0];
    // }

    // public function get_user_name_for_id($id)
    // {
    //     return (new DatabaseConnection())->querry(stripslashes($this->userNameQuerry . $id . "'"))[0][0];
    // }

    public function  __construct()
    {
        $this->userCredQuerry = "SELECT pass FROM USERS WHERE user_name = ? ";
        $this->userIdQuerry = "SELECT user_id FROM USERS WHERE user_name = ? ";
        $this->userNameQuerry = "SELECT user_name FROM USERS WHERE user_id = ? ";
        $this->storeUserCredQuerry = "INSERT INTO users (user_name, email_adress, pass) VALUES ( ? , ? , ? )";
        $this->userQuerry = "SELECT user_name FROM users WHERE user_name = ? ";
        // $this->comment_querry = "INSERT INTO comments (dish_id, comment, user_id) VALUES ( ? , ? , ? )";
    }

    public function getPasswordForUserName($userName)
    {
        return (new DatabaseConnection())->querry($this->userCredQuerry, array('s', $userName))[0]['pass'];
    }

    public function get_user_id($userName)
    {
        return (new DatabaseConnection())->querry($this->userIdQuerry, array('s', $userName))[0]['user_id'];
    }

    public function get_user_name_for_id($id)
    {
        $username = (new DatabaseConnection())->querry($this->userNameQuerry, array('s',$id))[0]['user_name'];
        return $username;
    }

    public function store_user_cred($userName, $userPass, $userAdress)
    {
        return (new DatabaseConnection())->querry($this->storeUserCredQuerry, array('sss', $userName, $userAdress, $userPass)); 
    }

    public function do_username_exist($userName)
    {
        // $resut = (new DatabaseConnection())->querry( $this->userQuerry, array('s', $userName))[0][0];
        // $result2 = (new DatabaseConnection())->querry( $this->userQuerry, array('s', $userName));
        // $resutl3 = (new DatabaseConnection())->querry( $this->userQuerry, array('s', $userName))[0];
        return (new DatabaseConnection())->querry( $this->userQuerry, array('s', $userName))[0][0] != null;
    }

    // add function to get a users id from the database.
    // rename to userInformation storrage
    // ultimately we should generate a querry dynamicly based on parameters sent into the object / relevant method.
    // kan vi ärva från någn class som konsturerar querrys??


}