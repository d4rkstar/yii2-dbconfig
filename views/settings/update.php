<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model d4rkstar\dbconfig\models\Configuration */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Configuration',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label'=>Yii::t('app', 'Configuration'),'url'=>'index'];
$this->params['breadcrumbs'][] = ['label'=>$this->title,'url'=>\yii\helpers\Url::to('manage')];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="configuration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
