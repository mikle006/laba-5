<?php

namespace app\controllers;
use app\models\Server;
use yii\helpers\VarDumper;
use yii\web\Controller;

class SoapController extends \yii\web\Controller

{
    public $enableCsrfValidation = false;

    public function actionIndex(){
        return Server::server();
    }
    public function actionClient()
    {
        $client = new \SoapClient(null, array(
            'location' =>
                "http://lab6:8888/soap/index",
            'uri' => "http://lab6:8888/soap/index",
            'trace' => 1));
        $return = $client->__soapCall("Test", []);
        var_dump($return);
    }

}