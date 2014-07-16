<?php
class Tutor extends AppModel {
	public $virtualFields = array('dropdown_name' => 'CONCAT(Tutor.name, " ", Tutor.last_name)');
    public $hasMany = 'AttendanceTutor';
    public $belongsTo = 'Team';
}