<?php

namespace TastyRecipes\View;
use Id1354fw\View\AbstractRequestHandler;

/*returns the index page of the webbaplication*/
class RecipePage extends AbstractRequestHandler{
    private $recipe_id;

    public function setrecipe_id($recipe_id) {
        $this->recipe_id = $recipe_id;
    }

    
    protected function doExecute() {
        $contr = $this->session->get('CHAT_CONTR_KEY');
        $recipe = $contr->get_recipe($this->recipe_id);
        $this->addVariable('Headline', $recipe->Headline);
        $this->addVariable('Ingridients', $recipe->Ingridients);
        $this->addVariable('Instructions', $recipe->Instructions);
        $this->addVariable('ImagePath', $recipe->ImagePath);
        $this->addVariable('RecipeId', $recipe->RecipeId);
        return 'recipe';
    }
      

} 