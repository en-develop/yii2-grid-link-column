<?php

namespace edevelop\grid;

use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Class LinkColumn
 * To add an UrlColumn to the gridview, add it to the [[GridView::columns|columns]] configuration as follows:
 *   ...
 *   [
 *       'class' => 'edevelop\grid\LinkColumn',
 *       'attribute' => 'yourAttribute',
 *       'url' => 'your url',
 *       'params' => [
 *           'urlParam' => 'modelAttribute'
 *       ],
 *       'linkOptions' => []
 *   ]
 *  ...
 *
 * @package edevelop\grid
 */
class LinkColumn extends DataColumn
{
    /**
     * link
     * @var
     */
    public $url = '/';

    /**
     * Params for link
     * @var
     */
    public $params = [];

    /**
     * Options for link settings
     * @var
     */
    public $linkOptions = [];

    /**
     * @var string
     */
    public $format = 'raw';

    /**
     * {@inheritdoc}
     * @throws \yii\base\InvalidArgumentException
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        return Html::a(
            $model->{$this->attribute},
            $this->generateUrl($model),
            $this->linkOptions
        );
    }


    /**
     * @param $model
     * @throws \yii\base\InvalidArgumentException
     * @return string
     */
    protected function generateUrl($model)
    {
        $url[] = $this->url;

        if (null !== $this->params && is_array($this->params)) {
            foreach ($this->params as $key => $param) {
                $url[$key] = $model->$param;
            }
        }

        return Url::to($url);
    }
}
