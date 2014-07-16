<?php
class Adviser extends AppModel {
	public $virtualFields = array('dropdown_name' => 'CONCAT(Adviser.name, " ", Adviser.last_name)');
	public $hasMany = 'Team';
}
