<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use frontend\widgets\MenuView;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <meta charset="<?= yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    </head>
    <?php $this->beginBody() ?>
    <body>
    <div class="page-container content-width">
            <div class="nav clearfix">
                <img src="/static/images/logo.png" class="logo">
                <?= MenuView::widget() ?>
                <div class="login-register">
                    <?php
                    if (yii::$app->user->isGuest) {
                        ?>
                        <a href="<?= Url::to(['site/login']) ?>"
                           class="signin-loader"><?= yii::t('frontend', 'Hi, Log in') ?></a><i></i>
                        <a href="<?= Url::to(['site/signup']) ?>"
                           class="signup-loader"><?= yii::t('frontend', 'Sign up') ?></a>
                    <?php } else { ?>
                    <a href="<?= Url::to(['user/index']) ?>"><?= Html::encode(yii::$app->user->identity->username) ?></a>
                        <i></i>
                        <a href="<?= Url::to(['site/logout']) ?>"
                           class="signup-loader"><?= yii::t('frontend', 'Log out') ?></a>
                    <?php } ?>
                </div>
        </div>
    </div>
    <div class="margin-top">
        <?= $content ?>
    </div>

    <?php echo $this->renderFile('@app/views/layouts/footer.php');?>
    </body>
    <?php $this->endBody() ?>
    <?php
    if (yii::$app->feehi->website_statics_script) {
        echo yii::$app->feehi->website_statics_script;
    }
    ?>
    </html>
<?php $this->endPage() ?>