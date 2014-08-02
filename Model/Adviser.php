<?php
class Adviser extends AppModel {
	public $virtualFields = array('dropdown_name' => 'CONCAT(Adviser.name, " ", Adviser.last_name)');
    public $displayField = 'dropdown_name';
	public $hasMany = array('Team', 'Tutor');
    public $belongsTo = array(
        'User' => array(
            'className'=>'User',
            'foreignKey'=>'user_id'
        )
    );

    public function isOwnProfile($action_id, $auth_user){
        $called_adviser = $this->find('first',array('conditions'=>array('Adviser.id'=>$action_id)));
        return $called_adviser['Adviser']['user_id']==$auth_user['id'];
    
    }

    public function getOwnTutors($auth_user){
        $this->recursive = 2;
        $auth_adviser = $this->find('first',array('conditions'=>array('Adviser.id'=>$auth_user['Adviser']['id'])));
        return $auth_adviser['Tutor'];

    }

}
