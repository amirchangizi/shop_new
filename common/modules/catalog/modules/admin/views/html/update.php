<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\Html */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Html',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Htmls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->html_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="html-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
