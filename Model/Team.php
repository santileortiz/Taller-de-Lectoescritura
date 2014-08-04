<?php
class Team extends AppModel {
	public $belongsTo = array(
        'Adviser' => array(
            'className' => 'Adviser',
            'foreignKey' => 'adviser_id'
        ),
        'Student' => array(
            'className' => 'Student',
            'foreignKey' => 'student_id'
        )
    );

    public $hasMany = array('Tutor');

    public $hasAndBelongsToMany = array('Lesson');

}
?>
