<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Interview */

$this->title = $model->interviewee . ' at ' . $model->inteview_date;
$this->params['breadcrumbs'][] = ['label' => 'Interviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interview-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
      <div class="col-md-6 text-left">
            <?= Html::a('Start', ['start', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
      </div>
      <div class="col-md-6 text-right">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
      </div>
    </div>
    <p></p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'interviewee',
            'interviewer',
            'inteview_date',
            'remarks:ntext',
        ],
    ]) ?>

</div>
