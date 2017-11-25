<?php

use common\helpers\ShopstatusHelper;
use common\modules\catalog\models\Information;
use common\modules\customermanagement\models\CustomerGroup;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;


$this->title = (Yii::$app->controller->action->id == 'create') ? Yii::t('app','Create Settings') : Yii::t('app','Update Settings') ;

echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Settings',
            'url' => ['/shopconfig/admin/settings'],
            'template' => "<li><b>{link}</b></li>\n", // template for this link only
        ],

        $this->title,
    ],
]);

$labels = $model->attributeLabels();
?>




<div class="row" >
    <div class="col-sm-12">
        <div class="widget-box">
            <?php $form = ActiveForm::begin(); ?>
            <div class="widget-header">
                <h4 class="widget-title"><?= Yii::t('app','site configuration') ?></h4>

                <span class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>', [''], [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <a href="<?= Url::to(['/shopconfig/admin/settings'])?>" data-action="close">
                        <i class="ace-icon fa fa-times"></i>
                    </a>


                </span>
            </div>

            <div class="widget-body" id="form-element">

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#public"><?= Yii::t('app','public') ?></a></li>
                        <li><a data-toggle="tab" href="#shop"><?= Yii::t('app','shop') ?></a></li>
                        <li><a data-toggle="tab" href="#options"><?= Yii::t('app','options') ?></a></li>
                        <li><a data-toggle="tab" href="#email"><?= Yii::t('app','email') ?></a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="public" class="tab-pane fade in active">

                            <div class="col-sm-12">

                                    <label class="col-sm-2"><?= $labels['title'] ?></label>
                                    <div class="col-sm-4"><?= $form->field($model, 'title')->textInput(['value'=>isset($settingModel['title'])?$settingModel['title']:null
                                            ,'class'=>'input-sm','maxlength' => true])->label(false)  ?></div>
                                    <label class="col-sm-2"><?= $labels['shopClose'] ?></label>
                                    <div class="col-sm-4"><?= $form->field($model, 'shopClose')->dropDownList([0=>Yii::t('app','No'),1=>Yii::t('app','Yes')],
                                            ['options' => [0 => ['selected' => 'selected']],
                                                'class'=>'form-control',
                                                'maxlength' => true])->label(false) ?></div>

                            </div>


                            <div class="col-sm-12">

                                    <label class="col-sm-2"><?= $labels['meteDesc'] ?></label>
                                    <div class="col-sm-4"><?= $form->field($model, 'meteDesc')->textarea(['value'=>isset($settingModel['title'])?$settingModel['title']:null
                                            ,'class'=>'input-sm','maxlength' => true])->label(false)  ?></div>
                                    <label class="col-sm-2"><?= $labels['metaKey'] ?></label>
                                    <div class="col-sm-4"><?= $form->field($model, 'metaKey')->textarea(['options' => [0 => ['selected' => 'selected']],
                                                'class'=>'form-control',
                                                'maxlength' => true])->label(false) ?></div>

                            </div>

                            <div class="col-sm-12">
                                    <label class="col-sm-2"><?= $labels['logo'] ?></label>
                                    <div class="col-sm-4"><?= $form->field($model,'logo')->fileInput(['class'=>'id-input-file-2'])->label(false) ?></div>
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-4"></div>
                            </div>

                        </div>


                        <div id="shop" class="tab-pane fade">

                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['shopName'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'shopName')->textInput(['value'=>isset($settingModel['shopName'])?$settingModel['shopName']:null ,
                                        'class'=>'input-sm','maxlength' => true])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['ownerName'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'ownerName')->textInput(['value'=>isset($settingModel['ownerName'])?$settingModel['ownerName']:null ,
                                        'class'=>'input-sm','maxlength' => true])->label(false) ?></div>
                            </div>

                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['address'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'address')->textInput(['value'=>isset($settingModel['address'])?$settingModel['address']:null ,
                                        'class'=>'input-sm','maxlength' => true])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['email'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'email')->textInput(['value'=>isset($settingModel['email'])?$settingModel['email']:null ,
                                        'class'=>'input-sm','maxlength' => true])->label(false) ?></div>
                            </div>

                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['phone'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'phone')->textInput(['value'=>isset($settingModel['address'])?$settingModel['address']:null ,
                                        'class'=>'input-sm','maxlength' => true])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['fax'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'fax')->textInput(['value'=>isset($settingModel['email'])?$settingModel['email']:null ,
                                        'class'=>'input-sm','maxlength' => true])->label(false) ?></div>
                            </div>

                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['workTime'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'workTime')->textarea(['value'=>isset($settingModel['address'])?$settingModel['address']:null ,
                                        'class'=>'input-sm','maxlength' => true])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['description'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'description')->textarea(['value'=>isset($settingModel['email'])?$settingModel['email']:null ,
                                        'class'=>'input-sm','maxlength' => true])->label(false) ?></div>
                            </div>

                        </div>

                        <div id="options" class="tab-pane fade">

                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['registerComment'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'registerComment')->dropDownList([0=>Yii::t('app','No'),1=>Yii::t('app','Yes')],['class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['gusetComment'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'gusetComment')->dropDownList([0=>Yii::t('app','No'),1=>Yii::t('app','Yes')],['class'=>'input-sm'])->label(false) ?></div>
                            </div>


                            <?php $defaultCustomer = ArrayHelper::map(CustomerGroup::find()->all(),'customer_group_id','name') ;   ?>
                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['priceWithTax'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'priceWithTax')->dropDownList([0=>Yii::t('app','No'),1=>Yii::t('app','Yes')],['class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['defaultCustomerGroup'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'defaultCustomerGroup')->dropDownList($defaultCustomer,['class'=>'input-sm'])->label(false) ?></div>
                            </div>


                            <?php $accountTerms = ArrayHelper::map(Information::find()->where(['language_id'=>Yii::$app->language])->all(),'information_id','title') ;   ?>
                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['accountTerms'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'accountTerms')->dropDownList($accountTerms,['class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['factorPrefix'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'factorPrefix')->textInput(['class'=>'input-sm'])->label(false) ?></div>
                            </div>

                            <?php $orderStatus = ShopstatusHelper::getStatusBySection('Order Status') ;   ?>
                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['paidTerms'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'paidTerms')->dropDownList($accountTerms,['class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['orderStatus'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'orderStatus')->dropDownList($orderStatus,['class'=>'input-sm'])->label(false) ?></div>
                            </div>


                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['showStockDepot'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'showStockDepot')->dropDownList([0=>Yii::t('app','No'),1=>Yii::t('app','Yes')],['class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['returnCondition'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'returnCondition')->dropDownList($accountTerms,['class'=>'input-sm'])->label(false) ?></div>
                            </div>


                            <?php $returnStatus = ShopstatusHelper::getStatusBySection('Return Status');   ?>
                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['returnStatus'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'returnStatus')->dropDownList($returnStatus,['class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"></label>
                                <div class="col-sm-4"></div>
                            </div>





                        </div>

                        <div id="email" class="tab-pane fade">

                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['emailPorotocol'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'emailPorotocol')->dropDownList(['smtp'=>Yii::t('app','SMTP'),'mail'=>Yii::t('app','Email')],['class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['emailParameter'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'emailParameter')->textInput(['value'=>isset($settingModel['emailParameter'])?$settingModel['emailParameter']:null ,'class'=>'input-sm'])->label(false) ?></div>
                            </div>

                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['hostName'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'hostName')->textInput(['value'=>isset($settingModel['hostName'])?$settingModel['hostName']:null ,'class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['port'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'port')->textInput(['value'=>isset($settingModel['port'])?$settingModel['port']:null ,'class'=>'input-sm'])->label(false) ?></div>
                            </div>


                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['userName'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'userName')->textInput(['value'=>isset($settingModel['userName'])?$settingModel['userName']:null ,'class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"><?= $labels['password'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'password')->textInput(['value'=>isset($settingModel['password'])?$settingModel['password']:null ,'class'=>'input-sm'])->label(false) ?></div>
                            </div>


                            <div class="col-sm-12">
                                <label class="col-sm-2"><?= $labels['smtpInterrupt'] ?></label>
                                <div class="col-sm-4"><?= $form->field($model, 'smtpInterrupt')->textInput(['value'=>isset($settingModel['smtpInterrupt'])?$settingModel['smtpInterrupt']:null ,'class'=>'input-sm'])->label(false) ?></div>
                                <label class="col-sm-2"></label>
                                <div class="col-sm-4"></div>
                            </div>


                        </div>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>


</div>
