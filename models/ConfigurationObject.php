<?php
/**
 * Created by PhpStorm.
 * User: brunosalzano
 * Date: 02/02/16
 * Time: 21:58
 */

namespace d4rkstar\dbconfig\models;

use yii\base\Model;

class ConfigurationObject extends Model {

    public $id;
    public $type;
    public $value;
    public $description;
    public $options;


    public function __toString()
    {
        return $this->value;
    }

}