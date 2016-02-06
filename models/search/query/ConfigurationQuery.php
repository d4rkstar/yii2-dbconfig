<?php

namespace d4rkstar\dbconfig\models\search\query;

/**
 * This is the ActiveQuery class for [[\d4rkstar\dbconfig\models\Configuration]].
 *
 * @see \d4rkstar\dbconfig\models\Configuration
 */
class ConfigurationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \d4rkstar\dbconfig\models\Configuration[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \d4rkstar\dbconfig\models\Configuration|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}