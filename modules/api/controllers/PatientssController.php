<?php

namespace app\modules\api\controllers;

use app\controllers\BaseController;
use app\models\Patient;
use app\models\PatientSearch;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;

class PatientssController extends BaseController
{
    public $enableCsrfValidation = false;

//    public function behaviors()
//    {
//        $behavior['authenticator'] = [
//            'class' => HttpBearerAuth::class
//        ];
//        return ArrayHelper::merge(parent::behaviors(), $behavior);
//    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['view']);
        return $actions;
    }


    public function actionIndex()
    {
        $data = Patient::find()->all();
        return $this->asJson($data);
//        $requestParams = \Yii::$app->getRequest()->getQueryParams();
//        return $this->asJson((new PatientSearch())->search($requestParams));
    }

    private function errorResponse($message) {

        // set response code to 400
        \Yii::$app->response->statusCode = 400;

        return $this->asJson(['error' => $message]);
    }

}