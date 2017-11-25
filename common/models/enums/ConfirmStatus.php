<?php
/**
 * Created by PhpStorm.
 * User: amir changizi
 * Date: 10/29/2017
 * Time: 9:34 PM
 */
namespace common\models\enums;

use yii2mod\enum\helpers\BaseEnum;

class ConfirmStatus extends BaseEnum
{
    const NO = 0;
    const YES = 1;

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
        self::NO => 'No',
        self::YES => 'Yes',
    ];

}