<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Movie $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="movie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= Html::img($model->image, [
        'width' => '200px',
        'class' => 'img-thumbnail',
        'style' => 'margin-bottom: 20px; border-radius: 20px'
    ]) ?>

    <?= $form->field($model, 'fileImage')->fileInput(['class' => 'form-control'])->label('Image') ?>

    <?= $form->field($model, 'release_date')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
