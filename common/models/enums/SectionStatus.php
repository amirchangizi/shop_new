<?php
/**
 * Created by PhpStorm.
 * User: amir changizi
 * Date: 10/29/2017
 * Time: 9:34 PM
 */
namespace common\models\enums;

use yii2mod\enum\helpers\BaseEnum;

class SectionStatus extends BaseEnum
{
    const STOCKSTATUS  = 'Stock Status';
    const RETURNSTATUS = 'Return Status';
    const RETURNACTION = 'Return Action';
    const RETURNREASON = 'Return Reason';
    const ORDERSTATUS  = 'Order Status';
    const ORDERHISTORY = 'Order History';

    /**
     * @var string message category
     * You can set your own message category for translate the values in the $list property
     * Values in the $list property will be automatically translated in the function `listData()`
     */
    public static $messageCategory = 'app';

    /**
     * @var array
     */
    public static $list = [
        self::ORDERSTATUS   => 'Order Status',
        self::RETURNREASON  => 'Return Reason',
        self::RETURNACTION  => 'Return Action',
        self::RETURNSTATUS  => 'Return Status',
        self::STOCKSTATUS   => 'Stock Status',
        self::ORDERHISTORY  => 'Order History'
    ];

}