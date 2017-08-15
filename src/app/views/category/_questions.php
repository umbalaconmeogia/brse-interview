<?php
use yii\helpers\Html;
use app\models\Question;
use app\components\HtmlHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
?>
<h3>Question list</h3>
<table>
    <tr>
        <th>No.</th>
        <th>Question</th>
        <th>Category</th>
    </tr>
    <?php foreach ($model->questions as $i => $question) { ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= Html::a($question->question, ['/question/view', 'id' => $question->id]) ?></td>
            <td><?= HtmlHelper::linkToCategories($question) ?></td>
        </tr>    
    <?php } ?>
</table>