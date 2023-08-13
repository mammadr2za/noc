<?php

namespace app\controllers;

use app\models\Pop_Point;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
 class TestController extends Controller
 {
  public $name; 
  
  public function __construct($name)
  {
    echo "hello my name is ",$this->$name;
  }

 }
 $new = new TestController('mhammadtreza');
 print_r($new);


