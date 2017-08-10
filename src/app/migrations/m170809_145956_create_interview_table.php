<?php

use batsg\migrations\BaseMigrationCreateTable;

/**
 * Handles the creation of table `interview`.
 */
class m170809_145956_create_interview_table extends BaseMigrationCreateTable
{
    /**
     * @var string
     */
    protected $table = 'interview';
    
    /**
     * {@inheritDoc}
     * @see \batsg\migrations\BaseMigrationCreateTable::createDbTable()
     */
    protected function createDbTable()
    {
        $this->createTableWithExtraFields($this->table, [
            'id' => $this->primaryKey(),
            'interviewee' => [$this->string()->notNull(), '面接受ける者'],
            'interviewer' => [$this->string()->notNull(), '面接官'],
            'inteview_date' => [$this->date(), '面接日'],
            'remarks' => [$this->text(), '備考'],
        ]);
        
        $this->addComments($this->table, '面接');
    }
}
