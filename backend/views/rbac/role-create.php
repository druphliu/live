<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-09-12 22:02
 */
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $model backend\models\form\Rbac
 */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Roles'), 'url' => Url::to(['roles'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', 'Roles')],
];

?>
<?= $this->render('_role-form', [
    'model' => $model,
]) ?>