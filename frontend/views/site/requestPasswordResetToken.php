<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\form\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = yii::t('app', 'Request password reset') . '-' . yii::$app->feehi->website_title;
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['keywords' => yii::$app->feehi->seo_keywords]);
$this->registerMetaTag(['description' => yii::$app->feehi->seo_description]);
?>
<style>
    .form-group label {
        float: left;
        width: 69px
    }
    p.help-block{
        float: left;
        width: 100px;
    }
</style>
<div class="content" >
    <div class="site-signup article-content" style="margin-top: 77px">
        <div class="title-line"><span class="tit" style="font-size: 38px;">密码重置</span></div>
        <style>
            label {
                float: left;
                width: 100px;
            }
            p.help-block.help-block-error{
                left: 300px;
                width: 240px;
            }
        </style>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col align-self-center">
                <p><?= yii::t('app', 'Please fill out your email. A link to reset password will be sent there.') ?></p>
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email', ['template' => "<div style='position:relative'>{label}{input}\n{error}\n{hint}</div>"])->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton(yii::t('app', 'Send'), ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>