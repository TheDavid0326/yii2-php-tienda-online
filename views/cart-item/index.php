<?php

use app\models\CartItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CartItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cart Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-item-index">

    <h1 class="text-center mb-3 fw-bold text-primary"> <?= Html::encode($this->title)?></h1>
    <hr class="border border-primary border-3 opacity-75">

    <p>
        <?= Html::a('Create Cart Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            'id',
            'cart_id',
            'movie_id',
            'price',
            'added_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CartItem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
