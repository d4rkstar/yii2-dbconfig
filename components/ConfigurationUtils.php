<?php
/**
 * Created by PhpStorm.
 * User: brunosalzano
 * Date: 25/01/16
 * Time: 07:37
 */

namespace d4rkstar\dbconfig\components;

use Yii;
use yii\base\Component;
use yii\base\Exception;
use yii\bootstrap\Html;
use yii\helpers\Inflector;
use d4rkstar\dbconfig\models\ConfigurationObject;

class ConfigurationUtils extends Component {

    public $params;

    public function init()
    {
        parent::init();
        $this->loadParameteres();
    }

    public function __get($name)
    {
        if (!array_key_exists($name, $this->params)) {
            return null;
        }
        return $this->params[$name];
    }

    public function saveParameters() {

        $tot = 0;
        try {
            foreach($this->params as $section=>$params) {
                $sectionPost = Yii::$app->request->post($section,null);
                foreach($params as $paramName=>$paramSettings) {
                    if (!array_key_exists($paramName, $sectionPost)) {
                        if ($paramSettings['type']=='checkbox') {
                            $v = 0;
                        } else {
                            continue;
                        }
                    } else {
                        $v = $sectionPost[$paramName];
                    }

                    $id = $paramSettings['id'];
                    $sql = "UPDATE configuration SET `value`=:val WHERE id=:id";
                    $ret = Yii::$app->db->createCommand($sql, [':val'=>$v,':id'=>$id])->execute();
                    $tot += $ret;
                }
            }
        } catch(Exception $ex) {
            $this->loadParameteres();
            return $ex->getMessage();
        }
        $this->loadParameteres();
        return true;
    }

    private function loadParameteres() {
        $this->params = [];

        $sql = "SELECT * FROM configuration ORDER BY `group` ASC, `ordering` ASC, `key` ASC";
        $params = Yii::$app->db->createCommand($sql)->queryAll();
        foreach($params as $param) {
            list($id, $key, $value, $group, $type, $description,$ordering,$options) = array_values($param);
            $config = new ConfigurationObject();

            $config->id=$id;
            $config->type=$type;
            $config->value=$value;
            $config->description=$description;
            $config->options=$options;

            $this->params[$group][$key] = $config;

        }
    }

    private static function hint($text) {
        $html = '';
        /* hint */
        if (trim($text)!="") {
            $html.= Html::beginTag('div', ['class'=>'form-group']);
            $html.= Html::beginTag('div', ['class'=>'col-lg-offset-2 col-lg-10']);
            $html.= Html::beginTag('p',['class'=>'small']);
            $html.= $text;
            $html.= Html::endTag('p');
            $html.= Html::endTag('div');
            $html.= Html::endTag('div');
        }
        return $html;
    }

    private static function labelInput($fieldName, $fld, $input) {
        $html = '';
        $html.=  Html::beginTag('div', ['class'=>'form-group']);
        $html.=  Html::label(Inflector::camel2words($fieldName),$fld,['class'=>'col-lg-2 control-label']);
        $html.=  Html::beginTag('div', ['class'=>'col-lg-10']);
        $html.= $input;
        $html.=  Html::endTag('div');
        $html.=  Html::endTag('div');
        return $html;

    }

    public static function renderField($group, $fieldName, $fieldParams) {
        $id = $fieldParams['id'];
        $type = $fieldParams['type'];
        $value = $fieldParams['value'];
        $description = $fieldParams['description'];
        $options = $fieldParams['options'];
        $fld = $group.'['.$fieldName.']';
        $html = '';
        switch($type) {
            case 'text':
                $html.= self::labelInput($fieldName, $fld,
                    Html::textInput($fld,$value,['class'=>'form-control'])
                );
                $html.=  self::hint($description);
                break;
            case 'textarea':
                $html.= self::labelInput($fieldName, $fld,
                    Html::textarea($fld,$value,['rows'=>5,'class'=>'form-control','hint'=>$description])
                );
                $html.=  ConfigurationUtils::hint($description);
                break;
            case 'checkbox':
                $html.= self::labelInput($fieldName, $fld,
                    Html::checkbox($fld,$value,[
                        'value'=>($value=='1'?'1':'0'),
                        'class'=>'form-control autoval'
                    ])
                );
                break;
            case 'dropdown':

                $data = explode(",", $options);
                $data = array_reverse($data);
                $data[''] = Yii::t('app', 'Select an option...');
                $data = array_reverse($data);
                $data = array_combine($data, $data);

                $html.= self::labelInput($fieldName, $fld,
                    Html::dropDownList($fld,$value,$data, [
                        'class'=>'form-control'
                    ])
                );
                break;

        }
        return $html;
    }
}