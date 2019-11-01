<?php
namespace TastyRecipes\Integration;
class RecipeStore
{
    private $recipepath;

    public function __construct()
    {
        $this->recipepath = __DIR__ . '\..\..\..\resources\recipes/';#path to recipes.
    }

    // public function getListOfRecipes($number_of_recipes_to_fetch, $number_of_steps_down)#add a way to get the recipes in a specific order.
    // {
    //     $recipeFiles = scandir (this->recipepath);
    //     $baseIndex = $number_of_steps_down * $number_of_recipes_to_fetch;
    //     $stopIndex = $baseIndex + $number_of_recipes_to_fetch;
    //     $recipes = array();

    //     if ($stopIndex > sizeof($recipeFiles))
    //     {
    //         #raiase an exception.
    //     }
        
    //     for ($x = 0; $x <= $number_of_recipes_to_fetch; $x++)
    //     {
    //         $recipes[$x] = new RecipeDTO;
    //         simplexml_load_file($this->recipepath . $recipeFiles[($baseIndex + $x)])
    //         $recipes[$x]->$Headline = $recipeFiles[$x];
    //         $recipes[$x]->$Ingridients = $recipeFiles[$x];
    //         $recipes[$x]->$Instructions = $recipeFiles[$x];
    //         $recipes[$x]->$ImagePath = $recipeFiles[$x];
    //         $recipes[$x]->$RecipeId = $recipeFiles[$x];
    //     }

    //     return $recipes 
    // }

    // public function getRecipePreview()
    // {

    // }

    public function getRecipeById($id)
    {
        $recipeFiles = scandir ($this->recipepath);
        for ($x = 0; $x <= sizeof($recipeFiles); $x++)
        {
            if($id == explode(".", $recipeFiles[$x])[1])
            {
                $recipe_file_name = $recipeFiles[$x];
                break;
            }
        }

        $new_path = ($this->recipepath . $recipe_file_name);
        $recipe_xml = simplexml_load_file(($this->recipepath . $recipe_file_name));
        // $recipe_xml = new SimpleXMLElement($xml_file);
        $recipe = new RecipeDTO;
        $recipe->Headline = $recipe_xml->recipe->title;
        $recipe->Ingridients = $recipe_xml->recipe->ingredient->li;
        $recipe->Instructions = $recipe_xml->recipe->recipetext->li;
        $recipe->ImagePath = $recipe_xml->recipe->imagepath;
        $recipe->RecipeId = $id;
        return $recipe;
    }
}

class RecipeDTO
{
    public $Headline;
    public $Ingridients;
    public $Instructions;
    public $ImagePath;
    public $RecipeId;
}