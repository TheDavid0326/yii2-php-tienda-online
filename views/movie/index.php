<?php

use app\models\Movie;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use yii\data\ActiveDataProvider;

/** @var yii\web\View $this */
/** @var app\models\MovieSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Movies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-index">

    <h1 class="text-center mb-3 fw-bold text-primary"> <?= Html::encode($this->title)?></h1>
    <hr class="border border-primary border-3 opacity-75">

    <p>
        <?= Html::a('Create Movie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    // Definimos SerReturnUrl para que el usuario vuelva después de login, en login tenemos goBack()
    Yii::$app->user->setReturnUrl(Yii::$app->request->url);

    // Si el usuario no está logueado, mostramos un botón de login, si está logueado, mostramos el botón de añadir al carrito
    $cartButton = Yii::$app->user->isGuest 
    ? [
        'attribute' => 'Añadir al carrito',
        'format' => 'html',
        'value' => function($model) {
            return Html::a('Inicia sesión para añadir al carrito', ['/site/login', 'return_url' => Yii::$app->request->url], ['class' => 'btn btn-secondary']);
        }
    ]
    : [
        'attribute' => 'Añadir al carrito',
        'format' => 'html',
        'value' => function($model) {
            return Html::a('Añadir al carrito', ['cart/add', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }
    ]; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-hover'],
        'pager' => [
            'options' => ['class' => 'pagination justify-content-center'],
            'linkContainerOptions' => ['class' => 'page-item mx-1'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledListItemSubTagOptions' => ['class' => 'page-link', 'tag' => 'a']
        ],
        'columns' => [
            'id',
            'title',
            'description:ntext',
            'price',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function (Movie $model) {
                    return Html::img((Yii::getAlias('@web/') . $model->image), ['alt' => $model->title, 'style' => 'width: 100px;']);
                }
            ],
            'release_date',
            'duration',
            $cartButton,
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Movie $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
