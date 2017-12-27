<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-03-23 15:47
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Comments'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', 'Comments')],
];
/**
 * @var $model backend\models\Comment
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]);
