<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = $model->customer_name;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => Yii::t('app','customer'),
            'url' => ['/customermanagement/admin/customers'],
            'template' => "<li><b>{link}</b></li>\n", // template for this link only
        ],

        'view '.$this->title,
    ],
]);


?>

<?php // Html::a('<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>',['index']) ?>


<div id="user-profile-1" class="user-profile row">
    <div class="col-xs-12 col-sm-3 center">
        <div>

            <span class="profile-picture">
                <img id="avatar" class="editable img-responsive" alt="<?= Html::encode($model->customer_name) ?>" src="<?= (empty($model->customer_image) ? Yii::getAlias("@web").'/web/images/users/default.jpg' : $model->customer_image) ?>" />
            </span>

            <div class="space-4"></div>

            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        &nbsp;
                        <span class="white"><?= Html::encode($model->customer_name) ?></span>
                    </a>

                </div>
            </div>
        </div>

        <div class="space-6"></div>
        <div class="hr hr12 dotted"></div>

    </div>

    <div class="col-xs-12 col-sm-9">


        <div class="space-12"></div>

        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','name') ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="username"><?= Html::encode($model->customer_name) ?></span>
                </div>
            </div>


            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','customer group') ?>   </div>

                <div class="profile-info-value">
                    <span class="editable" id="age"><?= $model->customer_group_id ? Html::encode($model->customerGroup->name) : null  ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','email') ?>   </div>

                <div class="profile-info-value">
                    <span class="editable" id="age"><?= Html::encode($model->customer_email) ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','Joined') ?>  </div>

                <div class="profile-info-value">
                    <span class="editable" id="signup"><?= date('Y-m-d' ,$model->create_time) ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','phone') ?>  </div>

                <div class="profile-info-value">
                    <span class="editable" id="about"><?= Html::encode($model->phone) ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','mobile') ?>  </div>

                <div class="profile-info-value">
                    <span class="editable" id="about"><?= Html::encode($model->mobile) ?></span>
                </div>
            </div>

        </div>

        <div class="space-20"></div>

        <div class="space-6"></div>

    </div>
</div>