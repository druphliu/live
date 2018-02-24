<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

/* @var $this yii\web\View */
/* @var $form \yii\bootstrap\ActiveForm*/
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerMetaTag(['keywords' => yii::$app->feehi->seo_keywords]);
$this->registerMetaTag(['description' => yii::$app->feehi->seo_description]);

$this->title = yii::t('app', 'Login') . '-' . yii::$app->feehi->website_title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrap ">
    <div class="site-login article-content" style="margin-top: 77px">
        <div class="title-line"><span class="tit" style="font-size: 38px;">登录</span></div>


        <div class="row form-login">
            <div class="col-md-3"></div>
            <div class="col align-self-center">
                <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>

                <?= $form->field($model, 'username', ['template' => "<div style='position:relative'>{label}{input}\n{error}\n{hint}</div>"])->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password', ['template' => "<div style='position:relative'>{label}{input}\n{error}\n{hint}</div>"])->passwordInput() ?>

                <?= $form->field($model, 'rememberMe', ['labelOptions'=>['style'=>'width:117px;position:relative;top:3px']])->checkbox(['style'=>'margin-right:0px;position:relative;top:-2px'])?>

                <div class="form-group" style="color:#999;margin-right: 120px;">
                    <?= yii::t('frontend', 'If you forgot your password you can') ?> <?= Html::a(yii::t('frontend', 'reset it'), ['site/request-password-reset']) ?>
                </div>

                <div class="form-group" style="margin-right: 50px">
                    <?= Html::submitButton(yii::t('frontend', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
