<?php

namespace common\modules\customermanagement;

use \Yii;

/**
 * customermanagement module definition class
 */
class CustomermanagementModule extends \yii\base\Module
{



    const SESSION_LAST_ATTEMPT = '_customer_last_attempt';
    const SESSION_ATTEMPT_COUNT = '_customer_attempt_count';

    /**
     * If set true, then on registration username will be validated as email
     *
     * @var bool
     */
    public $useEmailAsLogin = false;

    /**
     * If set true, then after registration send email
     *
     * @var bool
     */
    public $sendEmailAfterRegister = false;

    /**
     * Registration can be enabled either by this option or by adding '/users/auth/registration' route
     * to guest permissions
     * @var bool
     */
    public $enableRegistration = false;

    /**
     * After how many seconds confirmation token will be invalid
     *
     * @var int
     */
    public $confirmationTokenExpire = 3600; // 1 hour


    /**
     * How much attempts user can made to login or recover password in $attemptsTimeout seconds interval
     *
     * @var int
     */
    public $maxAttempts = 5;

    public $imagesFolder = '@webroot/images/customer/'  ;

    public $layout ='main' ;

    /**
     * Number of seconds after attempt counter to login or recover password will reset
     *
     * @var int
     */
    public $attemptsTimeout = 60;

    public $customer_table = '{{%customers}}';

    public $customer_group = '{{%customer_group}}';


    public  $menu_items = [];


    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\customermanagement\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->menu_items = $this->menuItems() ;

        parent::init();

        // custom initialization code goes here
    }

    /**
     * For Menu
     *
     * @return array
     */
    public static function menuItems()
    {
        return [
            [
                'label' => '<i class="fa fa-user" aria-hidden="true"></i><span class="menu-text"> ' . Yii::t('app', 'Customer Management').'</span>',
                'url' => '#',
                'linkOptions' => ['class'=>'menu-text'],
                'items' => [
                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . Yii::t('app', 'User'),'url' => ['/customermanagement/admin/customers'],],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . Yii::t('app', 'User Groups'),'url' => ['/customermanagement/admin/customergroup']],

                ],
                'itemOptions'=> ['class'=>'itemOptions'] ,
                'template'=> '<a href="{url}" class="dropdown-toggle">{label}</a>',
                'submenuTemplate' => "\n<ul class=\"submenu\">\n{items}\n</ul>\n"
            ],
        ];
    }

    /**
     * I18N helper
     *
     * @param string      $category
     * @param string      $message
     * @param array       $params
     * @param null|string $language
     *
     * @return string
     */
    public static function t($category, $message, $params = [], $language = null)
    {

        if(is_null($language))
            $language = Yii::$app->language ;


        return Yii::t('modules/customermanagement/'.$category, $message, $params, $language);
    }

    /**
     * Check how much attempts customer has been made in X seconds
     *
     * @return bool
     */
    public function checkAttempts()
    {
        Yii::$app->session->set(static::SESSION_LAST_ATTEMPT ,0);
        $lastAttempt = Yii::$app->session->get(static::SESSION_LAST_ATTEMPT);
        if ( $lastAttempt )
        {
            $attemptsCount = Yii::$app->session->get(static::SESSION_ATTEMPT_COUNT, 0);
            Yii::$app->session->set(static::SESSION_ATTEMPT_COUNT, ++$attemptsCount);
            // If last attempt was made more than X seconds ago then reset counters
            if ( ( $lastAttempt + 300 ) < time() )
            {
                Yii::$app->session->set(static::SESSION_LAST_ATTEMPT, time());
                Yii::$app->session->set(static::SESSION_ATTEMPT_COUNT, 1);
                return true;
            }
            elseif ( $attemptsCount > 5 )
            {
                return false;
            }
            return true;
        }

        Yii::$app->session->set(static::SESSION_LAST_ATTEMPT, time());
        Yii::$app->session->set(static::SESSION_ATTEMPT_COUNT, 1);

        return true;
    }

}
