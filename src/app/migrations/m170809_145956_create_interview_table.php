<?php

use yii\db\Migration;

/**
 * Handles the creation of table `interview`.
 */
class m170809_145956_create_interview_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('interview', [
            'id' => $this->primaryKey(),
			'interviewee' => $this->string()->notNull(),
			'inteview_date' => $this->date(),
			'remarks' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('interview');
    }
}
