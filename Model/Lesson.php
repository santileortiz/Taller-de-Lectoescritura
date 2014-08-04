<?php
class Lesson extends AppModel {
	public $hasAndBelongsToMany = array('Team');
}
