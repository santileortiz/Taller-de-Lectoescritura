<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User  extends AppModel {
    public $hasOne =array('Adviser', 'Tutor');

    public $displayField = 'username';

    public $validate = array(
        'username' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se necesita un usuario'
        ),
        'password' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se necesita una clave'
        ),
        'repass' => array(
            'equaltofield' => array(
                'rule' => array('equaltofield','password'),
                'message' => 'Las claves no coinciden',
            )
        ),
        'type' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'asesor', 'tutor', 'munira')),
                'message' => 'Por favor eliga un tipo valido',
                'allowEmpty' => false
            )
        )
    );

    function equaltofield($check,$otherfield)
    {
        //get name of field
        $fname = '';
        foreach ($check as $key => $value){
            $fname = $key;
            break;
        }
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    }

    public function authenticate($formData){
        $user = $this->find('first', array(
            'conditions' => array('Login.user' => $formData['Auth']['username'])
        ));
        if($user['Login']['password'] == sha1($formData['Auth']['password'])){
            return $user['Login']['type'];
        }
        else
            return null;
    }

    public function beforeSave($options = array()) {
        if (!empty($this->data['User']['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data['User']['password'] = $passwordHasher->hash(
                $this->data['User']['password']
            );
        }
        return true;
    }
}
?>
