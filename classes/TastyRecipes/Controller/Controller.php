<?php
/**this is the applications controller*/
namespace TastyRecipes\Controller;
use TastyRecipes\Model\LoginSystem;
use TastyRecipes\Model\User;
use TastyRecipes\Model\InputValidator;
use TastyRecipes\Integration\LoginStore;
use TastyRecipes\Integration\DatabaseConnection;
use TastyRecipes\Integration\CommentStore;
use TastyRecipes\Integration\RecipeStore;

class Controller
{

    private $commentStore;
    private $loginStore;
    private $recipeStore;
    private $logginSystem;
    private $user;
    private $inputValidator;
    
    /**
     * This constructs a new controller
     */
    public function __construct()
    {
        $this->commentStore = new CommentStore();
        $this->recipeStore = new RecipeStore();
        $this->loginStore = new LoginStore(); 
        $this->loginSystem = new LoginSystem();
        $this->user = new User();
        $this->inputValidator = new InputValidator();
    }

    /**
     * This method is used in order to loggin
     */  
    public function login()
    {
        $passFromDataBase = $this->loginStore->getPasswordForUserName($this->user->get_user_name());
        $idFromDataBase = $this->loginStore->get_user_id($this->user->get_user_name());
        $this->user->set_login_status($this->loginSystem->authenticate_encrypt_pass($this->user->get_user_pass(), $passFromDataBase));
        //$this->user->set_login_status($this->loginSystem->authenticate_encrypt_pass($this->user->get_user_pass(), $passFromDataBase));
        $this->user->set_user_id($idFromDataBase);
        return $this->user;
    }

    /**
     * This method is used in order to loggout
     */ 
    public function loggout()
    {
        $this->user = new User();
    }

    public function set_user_name($username)
    {
        $this->user->set_user_name($username);
    }

    public function set_user_pass($userPass)
    {
        $this->user->set_user_pass($userPass);
    }

    public function set_user_id($userId)
    {
        $this->user->set_user_name($userId);
    }

    public function get_user_login_status()
    {
        return $this->user->get_login_status();
    }

    public function get_user_id()
    {
        return $this->user->get_user_id();
    }


    public function get_all_comments($dishId)
    {
        $comments = $this->commentStore->get_all_comments($dishId);
        for ($x = 0; $x < sizeof($comments); $x++)
        {
            $comments[$x]['user_name'] = $this->loginStore->get_user_name_for_id($comments[$x]['user_id']);
        //     //solution can't be used since the code will not run if we log in. 
        //     if ($comments[$x]['user_id'] === $this->user->get_user_id())
        //         $comments[$x]['show_delete'] = true;
        //     else
        //         $comments[$x]['show_delete'] = false;
               
        }
        return $comments;
    }
    
    public function get_username_for_id($id)
    {
        return $this->loginStore->get_user_name_for_id($id);
    }

    public function store_comment($comment, $dishId)
    {
        $comment = $this->inputValidator->validateInputString($comment);
        $this->commentStore->write_comment($dishId, $comment, $this->user->get_user_id());
        $commentFromDatabase = $this->commentStore->get_latest_comment($dishId);
        $commentFromDatabase['user_name'] = $this->loginStore->get_user_name_for_id($commentFromDatabase['user_id']);
        return $commentFromDatabase;
        
    }

    public function delete_comment($commentId)
    {
        //check if the comment was written by the logged in user.
        $this->commentStore->delete_comment($commentId); 
    }

    public function register_user($username, $pass, $userAdress)
    {
        //@todo chek that input is enterd correct
        //@todo check that user name is not taken
        //@todo send a email verificatin and require a user to verify email
        $pass = $this->inputValidator->validateInputString($pass);
        $username = $this->inputValidator->validateInputString($username);
        $userAdress = $this->inputValidator->validateInputString($userAdress);
        
        $username = $this->inputValidator->validateInputHtml($username);
        $userAdress = $this->inputValidator->validateInputHtml($userAdress);

        $pass = $this->loginSystem->encrypt_pass($pass);
        if ($this->loginStore->do_username_exist($username))
        {
            return false;
        }
        else
        {
            $this->loginStore->store_user_cred($username, $pass, $userAdress); 
            return true;
        }
       
    }

    public function get_user()
    {
        return $this->user;
    }
    
    public function get_recipe_list()
    {
        return $this->recipeStore->getListOfRecipes(2,0);
    }

    public function get_recipe($id)
    {
        return $this->recipeStore->getRecipeById($id);
    }
}