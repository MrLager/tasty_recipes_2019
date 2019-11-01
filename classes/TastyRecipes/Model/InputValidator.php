<?php
namespace TastyRecipes\Model;
class InputValidator
{
    // public function validateInput($param)
    // {
    //     if (!empty($param))
    //     {
    //         if (gettype($param) is integer)
    //         {
    //             $someParam = (int) $param       
    //         }
    //         elseif (gettype($param) is string)
    //         {
    //             $someParam = (string) ctype_print($variable);
    //         }
    //     } else 
    //     {
    //         $someParam = 0;
    //     }
    // return $someParam;
    // }


    public function validateInput($param)
    {

        if (empty($param))
        {
            $someParam = 0;
        }

        elseif (gettype($param) == integer)
        {
            $someParam = (int) $param;       
        }

        elseif (gettype($param) == string)
        {
            $someParam = (string) ctype_print($variable);
        }

        // else raise exception?
        
        return $someParam;
    }

    
    public function validateInputString($param)
    {

        if (empty($param))
        {
            return 0;
        }
        elseif(ctype_print($param));
        {
            return (string) $param;
        }
    }

    public function validateInputInt($param)
    {

        if (empty($param))
        {
            return 0;
        }

        return (int) $param;       
    }

    public function validateInputHtml($input)
    {
        return htmlentities($input, ENT_QUOTES);
    }
}