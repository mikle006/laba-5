<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\ProductRest;

class RestController extends ActiveController
{
    public $modelClass = ProductRest::class;
    
}