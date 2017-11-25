<?php

namespace app\modules\usermanagement;

use \Yii ;

/**
 * usermanagement module definition class
 */
class UsermanagementModule extends \yii\base\Module
{


    const SESSION_LAST_ATTEMPT = '_um_last_attempt';
    const SESSION_ATTEMPT_COUNT = '_um_attempt_count';

    /**
     * If set true, then on registration username will be validated as email
     *
     * @var bool
     */
    public $useEmailAsLogin = false;

    /**
     * If set true, then on registration username will be validated as Social network
     *
     * @var bool
     */
    public $useSocialAsLogin = false;

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

    public $imagesFolder = '@webroot/images/users/'  ;

    public $layout ='users' ;

    /**
     * Number of seconds after attempt counter to login or recover password will reset
     *
     * @var int
     */
    public $attemptsTimeout = 60;

    public $user_table = '{{%user}}';

    public $user_groups_table = '{{%usergroups}}';

    public $user_groups_assign_table = '{{%usergroup_map}}';

    public  $menu_items = [];

    public $configModel = 'app\modules\usermanagement\models\ConfigForm';

    public $configForm = 'app\modules\usermanagement\views\_config\config.php';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\usermanagement\controllers';

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
                'label' => '<i class="fa fa-user" aria-hidden="true"></i><span class="menu-text"> ' . UsermanagementModule::t('user', 'Users Management').'</span>',
                'url' => '',
                'linkOptions' => ['class'=>'menu-text'],
                'items' => [
                    ['label' => '<i class="fa fa-user" aria-hidden="true"></i> ' . UsermanagementModule::t('user', 'User'),'url' => ['/usermanagement/users/index'],],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . UsermanagementModule::t('user', 'User Groups'),'url' => ['/usermanagement/usergroup/index']],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . UsermanagementModule::t('user', 'User Access'),'url' => ['/rbac']],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . UsermanagementModule::t('user', 'User Access Route'),'url' => ['/rbac/route']],
                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> ' . UsermanagementModule::t('user', 'User Permission'),'url' => ['/rbac/permission']],

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


        return Yii::t('modules/UserManagement/'.$category, $message, $params, $language);
    }

    /**
     * Check how much attempts user has been made in X seconds
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
