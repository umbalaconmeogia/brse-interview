<?php
namespace app\components;

use app\models\Question;
use yii\helpers\Html;

class HtmlHelper
{
    /**
     * Create links to categories that a question belongs to.
     * @param Question $question
     * @return string
     */
    public static function linkToCategories(Question $question)
    {
        $links = [];
        foreach ($question->categories as $category) {
            $links[] = Html::a($category->name, ['/category/view', 'id' => $category->id]);
        }
        return join(', ', $links);
    }
}