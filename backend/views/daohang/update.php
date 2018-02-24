<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-03-21 14:32
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', '直播导航'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . yii::t('app', '直播导航')],
];
/**
 * @var $model backend\models\FriendlyLink
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>