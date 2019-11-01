<?php
namespace TastyRecipes\Model;
class LoginSystem
{
    public function __constructor()
    {
        // do something ??
    }

    public function authenticate_user($pass1, $pass2)
    {
        $isUserLoggedIn = (strcmp($pass1 , $pass2) === 0);
        return $isUserLoggedIn;
    }

    public function encrypt_pass($pass)
    {
        // $hash = password_hash($pass, PASSWORD_DEFAULT);
        // $result = password_verify($pass, $hash);
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    public function authenticate_encrypt_pass($pass, $passHashed)
    {
        // $result = password_verify($pass, $passHashed);
        return password_verify($pass, $passHashed);
    }

}
    
   
   
   
//    if(mysqli_num_rows($test_querry_response) and strcmp($_POST['pass'], $row['pass']) === 0)
//     {
//         //check if correct pass was entered
//         $_SESSION['user_name'] = $_POST['user_name'];
//         header("Location: /../index.php?login=sucess");
//         exit();
//     }
//     else
//     {
//         echo "<h3>loggin failed!</h3>";
//         echo"<p>you will be redirected in 5 seconds</p>";
//         header( "refresh:2;url=../index.php" ); 
//         exit();
//     }

   
// 
