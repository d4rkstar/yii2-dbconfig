<?php
/**
 * Created by PhpStorm.
 * User: brunosalzano
 * Date: 25/01/16
 * Time: 07:35
 */

namespace d4rkstar\dbconfig\controllers;

use Yii;
use yii\web\Controller;


class SettingsController extends Controller
{
    /**
     * @var d4rkstar\dbconfig\Module
     * @inheritdoc
     */
    public $module;


    public function actionIndex() {

        if (Yii::$app->request->isPost) {
            $result = $this->module->config->saveParameters();
            if ($result==true) {
                Yii::$app->session->setFlash('success',Yii::t('app','Settings were saved successfully'));
            } else {
                Yii::$app->session->setFlash('error',Yii::t('app','Settings were not saved!'));
            }
        }

        print $this->render('index', []);
    }
}