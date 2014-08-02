<?php
class Tutor extends AppModel {
	public $virtualFields = array('dropdown_name' => 'CONCAT(Tutor.name, " ", Tutor.last_name)');
    public $hasMany = 'AttendanceTutor';
    public $belongsTo = array('User', 'Team', 'Adviser');

    // Crea un tutor apartir de un arreglo User y Tutor (como si fuera el modelo), regresa la clave asignada
    public function createTutor($User, $Tutor){
        if ( !array_key_exists('password', $User) ){
            $User['password'] = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 7);
        }

        $User['type'] = 'tutor';
        
        //Crea un usuario nuevo
        $this->User->create();
        $this->User->save($User);

        //Crea un tutor nuevo asociado al usuario
        $Tutor['user_id'] = $this->User->id;
        $this->create();
        $this->save($Tutor);

        return $User['password'];
    }

    //Crea multiples tutores a partir de un arreglo de nombres de usuario y el id del profesor que los da de alta
    //regresa un arreglo con las claves asignadas a cada usuario
    public function createTutors($usernames, $adviser_id){
        $passwd_array = array();
        foreach ($usernames as $k => $value){
            if ( is_int ($k) ){
                $username = $value;
                $password = null;
            }else {
                $username = $k;
                $password = $value;
            }

            if ( $password == null ){
                $password = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 7);
            }
            $newUser = array('User'=>array(
                'username' => $username,
                'password' => $password,
                'type' => 'tutor'
            ));
            
            //Crea un usuario nuevo
            $this->User->create();
            $this->User->save($newUser);
            array_push($passwd_array, $password);

            //Crea un tutor nuevo asociado al usuario
            $this->create();
            $this->save(array('Tutor' => array(
                'user_id' => $this->User->id,
                'adviser_id' => $adviser_id
            )));
        }

        return $passwd_array;
        
    }
}
