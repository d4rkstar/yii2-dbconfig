<?php

namespace d4rkstar\dbconfig\models;

use Yii;

/**
 * This is the model class for table "configuration".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 * @property string $group
 * @property string $type
 * @property string $description
 * @property integer $ordering
 * @property string $options
 */
class Configuration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configuration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string'],
            [['ordering'], 'integer'],
            [['key', 'value'], 'string', 'max' => 256],
            [['group'], 'string', 'max' => 128],
            [['description', 'options'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'group' => Yii::t('app', 'Group'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'ordering' => Yii::t('app', 'Ordering'),
            'options' => Yii::t('app', 'Options'),
        ];
    }

    /**
     * @inheritdoc
     * @return \d4rkstar\dbconfig\models\search\query\ConfigurationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \d4rkstar\dbconfig\models\search\query\ConfigurationQuery(get_called_class());
    }
}
