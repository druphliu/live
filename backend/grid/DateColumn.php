<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-03-21 19:32
 */

namespace backend\grid;

/**
 * @inheritdoc
 */
class DateColumn extends DataColumn
{
    public $headerOptions = ['width' => '120px'];

    public $format = ['datetime', 'php:Y-m-d H:m'];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}