<?php

use app\models\Movie;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

// Importamos el archivo JS

$this->registerJsFile('@web/js/gallery.js', [
    'depends' => [\yii\web\JqueryAsset::class],
]);

/** @var yii\web\View $this */
/** @var app\models\MovieSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Galería de peliculas';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="movie-gallery">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    // Definimos SerReturnUrl para que el usuario vuelva después de login, en login tenemos goBack()
    Yii::$app->user->setReturnUrl(Yii::$app->request->url);
    $scrollPosition = Yii::$app->request->get('scroll', 0);
    if ($scrollPosition) {
        echo "<script>window.scrollTo(0, $scrollPosition);</script>";
    }
 ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'options' => ['class' => 'pagination justify-content-center'],
            'linkContainerOptions' => ['class' => 'page-item mx-1'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledListItemSubTagOptions' => ['class' => 'page-link', 'tag' => 'a']
        ],
        'layout' => '<div class="row">{items}</div><div class="pagination-container">{pager}</div>', // Organiza en filas
        'itemOptions' => ['class' => 'col-md-4 mb-4'], // Organiza en columnas 
        'itemView' => function ($model) use ($scrollPosition) {
                    return '<div class="card movie-card h-100 shadow-lg rounded">
                                <img src="' . $model->image . '" class="card-img-css" alt="' . $model->title . '">
                                <div class="card-header h-25">
                                    <h2 class="card-title text-center fw-bold mt-3">' . $model->title . '</h2>
                                </div>
                                <div class="card-body">
                                    
                                    
                                    <p class="bg-light border rounded p-2 text-center">
                                        <strong class="fs-5 text-primary">
                                            Precio: ' . $model->price .' €
                                        </strong>
                                    </p>
                                    
                                    <div class="d-flex justify-content-center gap-5">
                                        <span> <i class="bi bi-calendar"></i> ' . $model->release_date . ' </span>
                                        <span> <i class="bi bi-clock"></i> ' . $model->duration . ' min </span>
                                    
                                    </div>
                                    
                                    <button class="btn btn-primary w-100 mt-3 save-scroll-btn" data-url=\'' . Url::to(['cart/add', 'id' => $model->id]) . '\'"> <!-- Debería enviar por ejemplo cart/add?id=5&scroll=1234 -->
                                        <i class="bi bi-cart-plus"></i>   Añadir al carrito
                                    </button>
                                    
                                    <button type="button" class="btn btn-secondary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#myModal' . $model->id . '">
                                        <i class="bi bi-eye"></i>   Ver descripción
                                    </button>
                                </div>
                            </div>
                        ';
            },
            
 
        
    ]); ?>

    
    
<!-- Modales fuera de ListView -->
<?php foreach ($dataProvider->models as $model): ?>
    <div class="modal fade" id="myModal<?= $model->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $model->title ?></h4>    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?= $model->description ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


</div>