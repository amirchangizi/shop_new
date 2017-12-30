<?php
foreach ($menu as $menuId => $menuInfo):

    if(!isset($menuInfo['child']))
    {
        echo "<li ><a class=\"\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\" href='".Yii::$app->urlManager->createUrl(['product/category' ,'categoryId'=>$menuId])."'>".$menuInfo['name']."</a></li>" ;
        continue ;
    }
    echo '<li class=" dropdown mega-dropdown">' ;
    echo '<a href="#top" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">'.$menuInfo['name'].'</a>' ;
    echo '<i class="ddl-switch fa fa-angle-down"></i>';
        foreach ($menuInfo['child'] as $childId => $childInfo) :
?>
                <ul class="dropdown-menu mega-menu">
                    <li class="col-md-2">
                        <div class="dropdown-box">
                            <ul>
                                <a href='<?= Yii::$app->urlManager->createUrl(['product/category' ,'categoryId'=>$childId]) ?>'><?= $childInfo['name'] ?></a>
                            </ul>
                        </div>
                    </li>

                </ul>
<?php
        endforeach;

    echo '</li>' ;
    endforeach;

?>

