<?php

namespace app\modules\api;

use webvimark\modules\UserManagement\components\GhostAccessControl;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {

        parent::init();

        // custom initialization code goes here
    }



}
