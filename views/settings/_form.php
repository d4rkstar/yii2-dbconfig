<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model d4rkstar\dbconfig\models\Configuration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'text' => 'Text', 'textarea' => 'Textarea', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'dropdown' => 'Dropdown', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ordering')->textInput() ?>

    <?= $form->field($model, 'options')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Back'),\yii\helpers\Url::to('manage'), ['class'=>'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
