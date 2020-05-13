<?php

namespace app\controllers;

use app\models\Pos;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use app\models\student;
use app\models\Visit;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class VisitController extends ActiveController
{
    public $modelClass = 'app\models\Visit';
    public function checkAccess($action, $modeld = null, $params = [])
    {
        return true;
    }
    public function behaviors()
    {
    return [
        [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
            'languages' => [
                'en-US',
                'de',
            ],
        ],
    ];
}
public function actions() {

    $actions = parent::actions();
    
    unset($actions['create']);


    return $actions;
}
    public function actionCreate() {
        
        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post();
        foreach ($post as $i) {
            $model = new Visit();
            $model->load($i,'');
            $model->save();
            $i='';
        
        }
        
    }
}
}