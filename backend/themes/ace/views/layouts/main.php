<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\themes\ace\assets\adminAsset ;
use backend\themes\ace\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
$bundle = adminAsset::register($this);


?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title ) ?></title>
        <?php $this->head() ?>
    </head>
<body class="no-skin">
    <?php $this->beginBody() ?>

    <?= $this->render('topbar') ?>
    <?= $this->render('page',compact('content')) ?>
    <script src="<?= Yii::getAlias('@web/web/js/jquery-2.1.4.min.js') ?>"></script>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
