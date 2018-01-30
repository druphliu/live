<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $type string
 */

use common\models\Options;
use frontend\assets\NewsAsset;
use yii\helpers\Url;
use frontend\widgets\ArticleListView;
use frontend\controllers\components\Article;
use frontend\widgets\ScrollPicView;
use common\widgets\JsBlock;
use frontend\assets\IndexAsset;
use yii\helpers\StringHelper;

NewsAsset::register($this);
$this->title = yii::$app->feehi->website_title;

$this->registerMetaTag(['keywords' => yii::$app->feehi->seo_keywords]);
$this->registerMetaTag(['description' => yii::$app->feehi->seo_description]);
?>

<?php JsBlock::begin(); ?>
<script type="text/javascript">


</script>
<?php JsBlock::end(); ?>
