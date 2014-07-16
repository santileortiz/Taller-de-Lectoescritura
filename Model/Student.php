<?php
class Student extends AppModel {
	public $virtualFields = array('dropdown_name' => 'CONCAT(Student.name, " ", Student.last_name)');
	public $hasOne = 'Team';
	public $hasMany = array(
		'AttendanceStudent' => array(
			'className' => 'AttendanceStudent',
			'foreignKey' => 'student_id'
		)
	);
	public $hasAndBelongsToMany = array(
        'Lesson' =>
            array(
                'className' => 'Lesson',
                'joinTable' => 'lessons_students',
                'foreignKey' => 'student_id',
                'associationForeignKey' => 'lesson_id'
            )
    );
}
