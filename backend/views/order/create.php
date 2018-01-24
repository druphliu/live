<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-03-23 15:47
 */
use yii\helpers\Url;

/**
 * @var $model backend\models\Article
 */
$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Articles'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', 'Articles')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]);