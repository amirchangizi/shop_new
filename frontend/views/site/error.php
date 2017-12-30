<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">



    <div class="container" style="background: white;text-align: center;">
        <h1></h1>
        <h3><?= nl2br(Html::encode($message)) ?></h3>

    </div>



</div>
