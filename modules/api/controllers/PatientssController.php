<?php

namespace app\modules\api\controllers;

use app\controllers\BaseController;
use app\models\Patient;
use app\models\PatientSearch;
use webvimark\modules\UserManagement\components\GhostAccessControl;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;

//class PatientssController extends BaseController
class PatientssController extends ActiveController
{

    public $enableCsrfValidation = false;

    public $modelClass = 'app\models\Patient';



    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
//            'class' => GhostAccessControl::class,
//            'class' => HttpBasicAuth::className(),
            'class' => CompositeAuth::className(),
            'authMethods' => [
                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className(),
            ],
        ];
            $behaviors['access'] = [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],

        ];
        return $behaviors;
    }


    /**
     * @inheritdoc
     */
//    public function actions()
//    {
//        $actions = parent::actions();
//        unset($actions['index']);
//        unset($actions['view']);
//        return $actions;
//    }


//    public function actionIndex()
//    {
//        $data = Patient::find()->all();
//        return $this->asJson($data);
//
//
////        $requestParams = \Yii::$app->getRequest()->getQueryParams();
////        return $this->asJson((new PatientSearch())->search($requestParams));
//    }

    private function errorResponse($message) {

        // set response code to 400
        \Yii::$app->response->statusCode = 400;

        return $this->asJson(['error' => $message]);
    }

}