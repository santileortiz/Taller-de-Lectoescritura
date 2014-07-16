<?php
class Lesson extends AppModel {
	public $hasAndBelongsToMany = array(
        'Student' =>
            array(
                'className' => 'Student',
                'joinTable' => 'lessons_students',
                'foreignKey' => 'lesson_id',
                'associationForeignKey' => 'student_id'
            )
    );
}
