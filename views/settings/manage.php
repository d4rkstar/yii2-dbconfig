<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel d4rkstar\dbconfig\models\query\ConfigurationQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Configuration Settings');
$this->params['breadcrumbs'][] = ['label'=>Yii::t('app', 'Configuration'),'url'=>'index'];
$this->params['breadcrumbs'][] = ['label'=>$this->title,'url'=>\yii\helpers\Url::to('manage')];
?>
<div class="configuration-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Configuration'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'group',
            'key',
            'type',
            'description',
            // 'ordering',
            // 'options',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
