<?php

use app\models\Movie;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MovieSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Movies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Movie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            [
                'attribute'=>'Añadir al carrito',
                'format'=>'html',
                'value'=>function($model) {
                    return Html::a('Añadir al carrito', ['cart/add', 'id' => $model->id], ['class' => 'btn btn-primary']);
                } // Le pasamos el id de la película a CartController, desde ahí lo recibimos con actionAdd($id)
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Movie $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
