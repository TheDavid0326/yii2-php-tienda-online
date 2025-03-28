<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Userdb $model */

$this->title = 'Create Userdb';
$this->params['breadcrumbs'][] = ['label' => 'Userdbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userdb-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
