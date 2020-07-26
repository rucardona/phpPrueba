<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\usuarioForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NroIdentificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'empresaId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
