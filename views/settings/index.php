<?php
/**
 * Created by PhpStorm.
 * User: brunosalzano
 * Date: 25/01/16
 * Time: 07:41
 */
/** @var $this \yii\web\View */
use yii\bootstrap\Html;
use d4rkstar\dbconfig\components\ConfigurationUtils;
use yii\helpers\Inflector;
use yii\bootstrap\Collapse;

$params = Yii::$app->controller->module->config->params;

print Html::beginForm('','post',['class'=>'form-horizontal']);

$this->title = Yii::t('app', 'Configuration');
$this->params['breadcrumbs'][] = $this->title;


$items = [];
$isFirst = true;
?>
<?php
    print Html::tag('h1', Html::encode($this->title));
    if (!Yii::$app->user->isGuest) {
        print '&nbsp;' . Html::tag('small',
            Html::icon('pencil',['class'=>'xs']).
            Html::a('Manage', \yii\helpers\Url::to('manage'))
        );
    }
    ?>


<?php
if (count($params)==0) {
    print Html::tag('h2', Yii::t('app','No configuration items.'));
} else {
    print Html::tag('p', Yii::t('app','Click on the titles to expand.'));
    foreach ($params as $group => $params) {
        $options = [];
        /*if ($isFirst) {
            $options['class'] = 'in';
            $isFirst = false;
        }*/
        $itemBody = '';
        foreach ($params as $fieldName => $fieldParams) {
            $itemBody .= ConfigurationUtils::renderField($group, $fieldName, $fieldParams);
        }
        $item = [
            'label' => Inflector::camel2words($group),
            'content' => $itemBody,
            'contentOptions' => $options,
        ];
        $items[] = $item;
    }
    echo Collapse::widget([
        'items' => $items
    ]);


    ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton(Yii::t('app', 'Save settings'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php Html::endForm() ?>
    <?php
    $js = <<<EOF

    $(":checkbox").on("click", function(event) {
        \$(this).attr('value', this.checked ? 1 : 0)
        if (\$(this).attr('value')!=1) {
            \$(this).removeAttr('checked');
        } else {
            \$(this).attr('checked', 'checked');
        }
    });

EOF;
    $this->registerJs($js);
}
