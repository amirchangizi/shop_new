<div id="navbar" class="navbar navbar-default  ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="index.html" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Grapes
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">


            <ul class="nav ace-nav">

                <li class="green dropdown-modal">
                    <div class="dropdown" style="float:left;">
                        <button class="dropbtn"><?= Yii::$app->language ?></button>
                        <div class="dropdown-content" style="left:0;">
                            <?php
                                    $lan = \common\helpers\LanguageHelper::getByValue() ;
                                    if($lan)
                                        foreach ($lan as $key => $value)
                                            echo \yii\bootstrap\Html::a($value ,['site/changelang','language'=>$key])
                            ?>
                        </div>
                    </div>
                </li>

                <?php
//                echo Yii::$app->user->identity->user_image;
//                exit;
                ?>
                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo"
                             src="<?= (empty(Yii::$app->user->identity->user_image) ? Yii::getAlias("@web").'/web/images/users/default.jpg' : Yii::$app->user->identity->user_image) ?>"
                             alt="<?= Yii::$app->user->identity->name.Yii::t('app','Photo') ?>"/>
                        <span class="user-info">
									<small><?= Yii::t('app', 'Welcome') ?>,</small>
                            <?= Yii::$app->user->identity->name ?>
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <!--                        <li>-->
                        <!--                            <a href="#">-->
                        <!--                                <i class="ace-icon fa fa-cog"></i>-->
                        <!--                                Settings-->
                        <!--                            </a>-->
                        <!--                        </li>-->

                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(['users/show/' . Yii::$app->user->id]) ?>">
                                <i class="ace-icon fa fa-user"></i>
                                <?= Yii::t('app', 'Profile') ?>
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl('site/logout') ?>">
                                <i class="ace-icon fa fa-power-off"></i>
                                <?= Yii::t('app', 'Logout') ?>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>