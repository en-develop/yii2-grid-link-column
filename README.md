Url column
==========
Column for creating links for the grid

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist en-develop/yii2-grid-link-column "*"
```

or add

```
"en-develop/yii2-grid-link-column": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?=  
     yii\grid\GridView::widget([
         //...
         [
             'class' => 'en-develop\grid\LinkColumn',
             'attribute' => 'yourAttribute',
             'url' => 'your url', // [] or
             'params' => [
                'urlParam' => 'modelAttribute'
             ],
             'linkOptions' => []
         ]
         //...
     ]);
?>
```