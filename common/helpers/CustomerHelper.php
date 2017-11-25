<?php
namespace common\helpers;

use common\modules\customermanagement\models\CustomerGroup;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class CustomerHelper extends Component
{

    public static function getCustomerGroupByvalue()
    {
        return ArrayHelper::map(CustomerGroup::find()->all() ,'customer_group_id' ,'name');
    }

    public static function getCustomerOrders($customerId)
    {

    }

}