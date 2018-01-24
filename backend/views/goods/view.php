<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-04-14 12:09
 */

/**
 * @var $model backend\models\Article
 */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <h3><?= $model->title ?></h3>
            </div>
            <div class="ibox-content">
                <?= $model->content ?>
            </div>
        </div>
    </div>
</div>