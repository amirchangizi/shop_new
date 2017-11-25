<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = $model->name;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => Yii::t('app','User'),
            'url' => ['/usermanagement/users/index'],
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

            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        <span class="white"><?= Html::encode($model->username) ?></span>
                    </a>

                </div>
            </div>

            <span class="profile-picture">
                <img id="avatar" class="editable img-responsive" alt="<?= Html::encode($model->name) ?>" src="<?= (empty($model->user_image) ? Yii::getAlias("@web").'/web/images/users/default.jpg' : $model->user_image) ?>" />
            </span>
            <div class="space-4"></div>

            <div class="width-80 label label-success label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="<?=Yii::$app->urlManager->createUrl(['users/show/'.$model->user_id])?>" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        <span class="white"><?= Yii::t('app','Edit') ?></span>
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
                <div class="profile-info-name"> <?= Yii::t('app','Name') ?> </div>

                <div class="profile-info-value">
                    <span class="editable" id="username"><?= Html::encode($model->name) ?></span>
                </div>
            </div>


            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','Age') ?>   </div>

                <div class="profile-info-value">
                    <span class="editable" id="age"><?= Html::encode($model->age) ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','E-mail') ?>   </div>

                <div class="profile-info-value">
                    <a class="editable" id="age" href="mailto:<?=$model->email?>"><?= Html::encode($model->email) ?></a>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','Joined') ?>  </div>

                <div class="profile-info-value">
                    <span class="editable" id="signup"><?= date('Y-m-d' ,$model->joined_time) ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> <?= Yii::t('app','About Me') ?>  </div>

                <div class="profile-info-value">
                    <span class="editable" id="about"><?= Html::encode($model->about_me) ?></span>
                </div>
            </div>
        </div>

        <div class="space-20"></div>

        <div class="space-6"></div>

    </div>
</div>