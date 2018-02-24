<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\models\form\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = yii::t('frontend', 'Sign up') . '-' . yii::$app->feehi->website_title;
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['keywords' => yii::$app->feehi->seo_keywords]);
$this->registerMetaTag(['description' => yii::$app->feehi->seo_description]);
?>
<div class="content-wrap">
    <div class="site-signup article-content" style="margin-top: 77px">
        <div class="title-line"><span class="tit" style="font-size: 38px;">注册</span></div>
        <style>
            label {
                float: left;
                width: 100px
            }
        </style>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col align-self-center">
                <p><?= yii::t('frontend', 'Please fill out the following fields to signup') ?>:</p>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username', ['template' => "<div style='position:relative'>{label}{input}\n{error}\n{hint}</div>"])->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email', ['template' => "<div style='position:relative'>{label}{input}\n{error}\n{hint}</div>"])->textInput() ?>

                <?= $form->field($model, 'password', ['template' => "<div style='position:relative'>{label}{input}\n{error}\n{hint}</div>"])->passwordInput() ?>

                <div class="form-group" style="margin-left: 180px">
                    <?= Html::submitButton(yii::t('frontend', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
