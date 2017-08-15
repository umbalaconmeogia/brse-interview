<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\HtmlHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = $model->question;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">

    <h1><span class="glyphicon glyphicon-question-sign"></span> <?= Html::encode($this->title) ?></h1>

    <p> 
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'question:ntext',
            'remarks:ntext',
            [
                'label' => 'Category',
                'format' => 'raw',
                'value' => function ($model, $widget) {
                    return HtmlHelper::linkToCategories($model);
                },
            ]
        ],
    ]) ?>

</div>
