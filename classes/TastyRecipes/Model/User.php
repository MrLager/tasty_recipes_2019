<?php
namespace TastyRecipes\Model;


class User
{
    private $userName;
    private $passWord;
    private $logedIn;
    private $id;

    public function __contruct()
    {
        $userName = "";
        $passWord = "";
        $logedIn = FALSE;
        $id = 0;
    }

    public function set_user_name($userName)
    {
        $this->userName = $userName;
    }

    public function set_user_pass($passWord)
    {
        $this->passWord = $passWord;
    }

    public function set_login_status($status)
    {
        $this->logedIn = $status;
    }

    public function set_user_id($id)
    {
        $this->id = $id;
    }

    public function get_user_name()
    {
        return $this->userName;
    }

    public function get_user_pass()
    {
        return $this->passWord;
    }

    public function get_login_status()
    {
        return $this->logedIn;
    }

    public function get_user_id()
    {
        return $this->id;
    }
}