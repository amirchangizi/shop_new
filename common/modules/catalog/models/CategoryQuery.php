<?php
/**
 * User: amir changizi
 * Date: 11/4/2017
 * Time: 11:20 PM
 */

namespace common\modules\catalog\models;

use creocoder\nestedsets\NestedSetsQueryBehavior;

class CategoryQuery extends \yii\db\ActiveQuery
{

    public function behaviors() {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }

}