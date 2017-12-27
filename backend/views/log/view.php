<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-04-14 10:09
 */

/**
 * @var $this yii\web\View
 * @var $model backend\models\AdminLog
 */

$this->title = "Log Detail";
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content" style="word-wrap: break-word">
                <?= $model->description ?>
            </div>
        </div>
    </div>
</div>