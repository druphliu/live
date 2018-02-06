<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-06-19 14:46
 */
namespace frontend\widgets;

class ScrollPicView extends \yii\base\Widget
{

    public $banners;

    public $template = " <div class=\"swiper-container\"><div class=\"swiper-wrapper\">{lis}  </div>
                    <div class=\"swiper-pagination\"></div>
                </div>";

    public $liTemplate = "<div class=\"swiper-slide\">
                            <a target='{target}' href=\"{link_url}\">
                            <img src=\"{img_url}\">
                            <p>{title}</p>
                            </a>
                        </div>";


    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();
        $lis = '';
        foreach ($this->banners as $banner) {
            $lis .= str_replace(['{link_url}', '{img_url}', '{target}','{title}'], [$banner['link'], $banner['img'], $banner['target'],$banner['desc']], $this->liTemplate);
        }
        return str_replace('{lis}', $lis, $this->template);
    }

}