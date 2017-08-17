<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Interview */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interview-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'interviewee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'interviewer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inteview_date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
