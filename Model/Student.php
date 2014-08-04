<?php
class Student extends AppModel {
	public $virtualFields = array('dropdown_name' => 'CONCAT(Student.name, " ", Student.last_name)');
    
    public $displayField = 'dropdown_name';
	public $hasOne = 'Team';
	public $hasMany = array(
		'AttendanceStudent' => array(
			'className' => 'AttendanceStudent',
			'foreignKey' => 'student_id'
		)
	);

    public function listUnassigned($self_id = null){

        $params = array(
            'conditions' => array(
                'Team.student_id !=' => 0
            )
        );

        $assigned_teams = $this->Team->find('all', $params);
        $students = $this->find('all');

        $student_list = array();

        foreach ( $students as $student ) {
            if ( $student['Team']['id'] == null || $student['Team']['id'] == $self_id )
                $student_list[$student['Student']['id']] = $student['Student'][$this->displayField];
        }

        return $student_list;
    }
}
