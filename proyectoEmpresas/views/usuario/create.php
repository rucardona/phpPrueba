<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\usuarioForm */

$this->title = 'Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
