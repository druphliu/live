<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-12-05 13:00
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Ad'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . yii::t('app', 'Ad')],
];
/**
 * @var $model backend\models\form\AdForm
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]);
