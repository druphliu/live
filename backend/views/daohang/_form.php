<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-03-21 14:35
 */

/**
 * @var $this yii\web\View
 * @var $model backend\models\FriendlyLink
 */

use backend\widgets\ActiveForm;
use common\libs\Constants;

$this->title = "Friendly Links";
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin([
                    'options' => [
                        'enctype' => 'multipart/form-data',
                        'class' => 'form-horizontal'
                    ]
                ]); ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'image')->imgInput(['style' => "max-width:200px;max-height:200px"]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'type')->dropDownList([1=>'直播平台',2=>'小视频平台',3=>'电视台',4=>'广播电台']); ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'url')->textInput(['maxlength' => 512]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'sort')->textInput(['maxlength' => 64]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'target')->radioList(Constants::getTargetOpenMethod()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'status')->radioList(Constants::getYesNoItems()) ?>
                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>