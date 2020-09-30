<?php

namespace app\models;

class ProductRest extends Product {

    public function fields(){

        return ['id', 'name'];

    }

}