<?php
use common\modules\ordermanagement\models\OrderHistory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$historyList = OrderHistory::find()->where(['order_id'=>$model->orders_id])->all() ;

?>

<table class="table table-responsive">

    <thead>
        <tr>
            <th><?= Yii::t('app','order status') ?></th>
            <th><?= Yii::t('app','notify') ?></th>
            <th><?= Yii::t('app','comment') ?></th>
        </tr>
    </thead>

    <?php
        if($historyList)
            foreach ($historyList as $his):
    ?>
        <tr>
            <td><?= $his->orderStatus->status_name ?></td>
            <td><?= $his->notify ? Yii::t('app','Yes') : Yii::t('app','No') ?></td>
            <td><?= Html::encode( $his->comment )?></td>
        </tr>

    <?php
        endforeach;
    ?>
</table>

<hr>



<?php $form = ActiveForm::begin([
    'id'=>'history-form',
    'action'=> Yii::$app->urlManager->createUrl('/ordermanagement/sale/history')
]); ?>

<div class="widget-body">

    <div class="row" id="form-element">

        <div class="col-sm-12">
            <label class="col-sm-2"><?= Yii::t('app','order status') ?></label>
            <?php
                $status = \common\helpers\ShopstatusHelper::getStatusBySection('Order Status');
                echo $form->field($history, 'order_id')->hiddenInput(['value'=>$model->orders_id])->label(false)
            ?>
            <div class="col-sm-4 "><?= $form->field($history, 'order_status_id')->dropDownList($status ,['prompt'=> Yii::t('app','-- Select an item --')])->label(false) ?></div>
            <label class="col-sm-2"></label>
            <div class="col-sm-4 "><?= $form->field($history, 'notify')->checkbox()->label(false) ?></div>

        </div>

        <div class="col-sm-12">
            <label class="col-sm-2"><?= Yii::t('app','comment') ?></label>
            <div class="col-sm-4 "><?= $form->field($history, 'comment')->textarea(['maxlength' => true])->label(false) ?></div>

            <label class="col-sm-2"></label>
            <div class="col-sm-4 "> </div>

        </div>


    </div>

    <?php
        echo Html::submitButton('send',['class'=>'btn btn-success'])
    ?>



</div>

<?php  ActiveForm::end(); ?>
