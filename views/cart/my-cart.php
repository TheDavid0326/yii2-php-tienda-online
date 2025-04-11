<?php

use app\models\Cart;
use Codeception\Attribute\DataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CartSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Mi carrito';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if(!empty($cart->cartItems)): // Empty devuele true si $cart->cartItems es vacio o null?>
    <?= GridView::widget([
        'dataProvider' => new ArrayDataProvider([
            'allModels' => $cart->cartItems,
            'pagination' => [
                'pageSize' => 10
            ],
        ]),
        'showFooter' => true,
        'footerRowOptions' => ['style' => 'font-weight: bold'],
        'columns' => [
            [
                'attribute' => 'movie.title',
                'label' => 'Película',
                'footer' => sprintf('Vas a comprar %s películas', count($cart->cartItems)) // Contamos el número de películas en el carrito,
            ],
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img((Yii::getAlias('@web/') . $model->movie->image), ['alt' => $model->movie->image, 'style' => 'width: 100px;']);
                }
            ],
            [
                'attribute' => 'price',
                'label' => 'Precio',
                'value' => function($model) {
                    return Yii::$app->formatter->asCurrency($model->movie->price, 'EUR'); // Formateamos el precio a euros
                },
                'footer' => sprintf('TOTAL: %s', Yii::$app->formatter->asCurrency(array_sum(
                    array_map(function($item) {
                        return $item->price;
                    }, $cart->cartItems)
                ), 'EUR'))  // Formateamos el precio a euros
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [ // Añadimos 'buttons' para que no vaya a cart/delete por defecto
                    'delete' => function ($url, $model) { // Yii pasa a los callbacks de los botones de la ActionColumn los siguientes parámetros: $url, $model, $key
                        return Html::a('Eliminar', Url::to(['cart-item/delete', 'id' => $model->id]),[
                            'class' => 'btn btn-danger',
                            'data-method' => 'post',
                            'data-confirm' => sprintf('¿Estás seguro de que deseas eliminar este producto "%s" del carrito?', $model->movie->title)
                        ]);
                    }
                ],
                'footer' => Html::a('Vaciar carrito', Url::to(['cart/delete-all']), [
                    'class' => 'btn btn-danger',
                    'data-method' => 'post',
                    'data-confirm' => '¿Estás seguro de que deseas vaciar tu carrito?'
                ])
            ]
        ]
    ]);
    ?>

    <?php if (!empty($cart->cartItems)): ?>
        <div class="text-end mt-3">
            <?= Html::a('Comprar', ['cart/buy'], [
                'class' => 'btn btn-success btn-lg',
                'data-method' => 'post',
                'data-confirm' => '¿Estás seguro de que deseas comprar estos productos?'
            ]) ?>
        </div>
    <?php endif; ?>
        
    



<?php else: ?>
    <div class="alert alert-info" role="alert">
        No tienes productos en tu carrito.
    </div>

<?php endif;  ?>

<?php  ?>