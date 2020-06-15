<?php

namespace Portfolio\controller;

use Portfolio\model\Pf_articleManager;
use Portfolio\classes\View;

//Gère tout ce qu'il se passe en homepage mais aussi les articles
class Json
{
    public function showPortfolioJson($params) //HomePage avec tout les articles
    {
        $manager = new Pf_articleManager();
        $data = $manager->findAllJSON();
        $data_JSON = json_encode($data);
        header("Content-type: application/json; charset=utf-8");
        echo $data_JSON;
    }
}
