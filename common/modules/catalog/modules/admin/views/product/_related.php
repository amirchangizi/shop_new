<p><?= Yii::t('app','Product Related') ?></p>
<?php
use common\helpers\CategoryHelper;
use common\helpers\ProductHelper;
use yii\bootstrap\Html ;
use yii\helpers\ArrayHelper;

//$items = UsergroupMap::findAll(['user_id'=>$model->user_id]) ;


$selected =[] ;
$selectedCat =[] ;
$productId = null ;
if(!$model->isNewRecord)
{
    $productId = $model->product_id ;
    $items = ArrayHelper::map($model->productRelateds ,'related_id' ,'related_id') ;
    foreach ($items as $map)
        $selected[$map] = ['Selected' => true] ;

    $catItems = ArrayHelper::map($model->productToCategories ,'category_id' ,'category_id') ;
    foreach ($catItems as $map)
        $selectedCat[$map] = ['Selected' => true] ;

}

?>

    <?= $form->field($relatedModel, 'related_id')->dropDownList(ProductHelper::getProductByValue($productId), ['options' => $selected,'multiple' => true])->label(false) ?>

    <p><?= Yii::t('app','Product Category') ?></p>

    <?= $form->field($categoryModel, 'category_id')->dropDownList(CategoryHelper::getAllCategoryIdWithoutRoot(), ['options' => $selectedCat,'multiple' => true])->label(false) ?>


<hr/>
