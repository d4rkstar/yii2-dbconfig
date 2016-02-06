<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model d4rkstar\dbconfig\models\Configuration */

$this->title = Yii::t('app', 'Create Configuration');
$this->params['breadcrumbs'][] = ['label'=>Yii::t('app', 'Configuration'),'url'=>'index'];
$this->params['breadcrumbs'][] = ['label'=>Yii::t('app', 'Configuration Settings'),'url'=>\yii\helpers\Url::to('manage')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
