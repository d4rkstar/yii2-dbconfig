<?php
namespace d4rkstar\dbconfig;

use app\components\dbconfig\components\ConfigurationUtils;
use Yii;

/**
 * User module
 *
 * @author d4rkstar <d4rkstar@gmail.com>
 */
class Module extends \yii\base\Module {

    public $controllerNamespace='d4rkstar\dbconfig\controllers';

    /**
     * @var ConfigurationUtils $config;
     */
    public $config;

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->config = new ConfigurationUtils();
    }


}
