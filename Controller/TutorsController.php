<?php
class TutorsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

    public function isAuthorized($user){
        $this->
        //si es un asesor:
        if ( $user['type'] == 'asesor' ){
            //Solo puede editar su perfil
            if(in_array($this->action, array( 'assignTeams', 'index', 'view', 'add', 'delete', 'edit'))){
                //Puede ver la informacion de todos los asesores
                return true;
            }
        }
        //Si es administrador puede hacer cualquier cosa
        return parent::isAuthorized($user);
    }
	public function index() {
        if ( $this->Auth->user('type') == 'asesor'){
            $params = array(
                'conditions' => array('Tutor.adviser_id' => $this->Auth->user('Adviser')['id'])
            );
        }else
            $params = array('Tutor.order' => 'name');
		$this->set('tutores', $this->Tutor->find('all', $params));
	}

    public function create(){
        debug($this->Tutor->createTutors(array(
            'tutor1'=>'casa1234',
            'tutor2'=>'12345'
        ), $this->Auth->user('Adviser')['id']));
    }
	
	public function add() {
		$this->loadModel('Adviser');
		$advisers = $this->Adviser->find('list');
    	$this->set('advisers',$advisers);

		$this->loadModel('Team');
		$teams = $this->Team->find('list');
    	$this->set('teams',$teams);

		if($this->request->is('post')){
            if ( $this->Auth->user('type') == 'asesor'){
                $this->request->data['Tutor']['adviser_id'] = $this->Auth->user('Adviser')['id'];
            }

            $User = $this->request->data['User'];
            $Tutor = $this->request->data['Tutor'];

            debug($User);
            debug($Tutor);
            $password = $this->Tutor->createTutor($User, $Tutor);
            $this->Session->setFlash("¡Tutor guardado! Clave: ".$password, 'default', array('class'=>'custom_success'));
            $this->redirect(array('action' => 'index'));
        }
    }

	public function edit($id = null){
		$this->Tutor->id = $id;
		if($this->request->is('get')){
            $this->set('advisers',$this->Tutor->Adviser->find('list'));
            $this->set('teams',$this->Tutor->Team->find('list'));
			$this->request->data = $this->Tutor->read();
        }else{ //peticion no es get
            if($this->Tutor->save($this->request->data)){
                $this->Session->setFlash('¡Tutor '.$this->request->data['Tutor']['name'].' editado!', 'default', array('class'=>'custom_success'));
                $this->redirect( array('action' => 'index') );
            }else{
                $this->Session->setFlash('Error al guardar los cambios...');
            }
        }
	}

	public function delete($id){
		if($this->request->is('get')):
			throw new MethodNotAllowedException('Esto es hack');
		else:
			$this->Session->setFlash('¡Tutor eliminado!', 'default', array('class'=>'custom_success'));
			if($this->Tutor->delete($id)):
				$this->redirect( array('action' => 'index') );
			endif;
		endif;
	}

    public function assignTeams(){
        
        if ( $this->request->is('post') ){
            $members = $this->request->data['Team'];
            $this->Tutor->addTeam($members);
        }

        $params = array(
            'conditions' => array(
                'Tutor.adviser_id' => $this->Auth->user('Adviser')['id'],
                'Tutor.team_id' => 0
            )
        );
    
        $unassigned_tutors = $this->Tutor->find('all', $params);

        if ( count($unassigned_tutors) != 0 ){
            $this->set('tutors', $unassigned_tutors);
        }else{
            $this->redirect(array('controller' => 'Teams', 'action' => 'index'));
        }

    }
}
?>
