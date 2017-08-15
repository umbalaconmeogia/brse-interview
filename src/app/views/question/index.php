<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use app\components\HtmlHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Question', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'categoryId',
                'label' => 'Category',
                'filter' => Category::hashModels(Category::findAllNotDeleted(), 'id', 'name'),
                'format' => 'raw',
                'value' => function ($model, $widget) {
                    return HtmlHelper::linkToCategories($model);
                },
            ],
            'question:ntext',
            'remarks:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
