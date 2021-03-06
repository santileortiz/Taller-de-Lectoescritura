<?php
class UsersController extends AppController {

    public function isAuthorized($user){
        //si es un asesor:
        if ( $user['type'] == 'asesor' ){
            if(in_array($this->action, array('changePassword'))){
                return true;
            }
        }
        else if ( $user['type'] == 'tutor' ){
            if(in_array($this->action, array('changePassword'))){
                return true;
            }
        }
        //Si es administrador puede hacer cualquier cosa
        return parent::isAuthorized($user);
    }

    public function index() {
        $this->set('users', $this->User->find('all'));
    }
    
	public function add() {
		if($this->request->is('post')):
			if($this->User->save($this->request->data)):
				$this->Session->setFlash("¡Usuario guardado!", 'default', array('class'=>'custom_success'));
			endif;
		endif;
	}

	public function edit($id = null){
		$this->User->id = $id;
		if($this->request->is('get')):
			$this->request->data = $this->User->read();
		else: //peticion no es get
			if($this->User->save($this->request->data)):
				$this->Session->setFlash('¡User editado!', 'default', array('class'=>'custom_success'));
				$this->redirect( array('action' => 'index') );
			else:
				$this->Session->setFlash('Error al guardar los cambios...');
			endif;
		endif;
	}

	public function delete($id){
		if($this->request->is('get')):
			throw new MethodNotAllowedException('Esto es hack');
		else:
			$this->Session->setFlash('¡Usuario eliminado!', 'default', array('class'=>'custom_success'));
			if($this->User->delete($id)):
				$this->redirect( array('action' => 'index') );
			endif;
		endif;
	}

    public function login(){
        if($this->request->is('post')){
			if($this->Auth->login()){ //inicia sesion con la informacion POST
                $tipo = $this->Auth->user('type');
                if($tipo=='admin'){
                    $this->redirect(array('controller'=>'pages', 'action'=>'adminPanel'));
                }else if ( $tipo == 'asesor'){
                    $this->redirect(array('controller'=>'Advisers', 'action'=>'home'));
                }else if ( $tipo == 'tutor'){
                    $this->redirect(array('controller'=>'Tutors', 'action'=>'home'));
                }

            } else {
                $this->Session->setFlash('Usuario/Clave incorrecto');
            }
        }
    }

    public function logout(){
        $this->Auth->logout();
        $this->redirect('login');
    }

    public function changePassword($id = null){
        if ( $this->Auth->user('type') != 'admin' )
            $id = $this->Auth->user('id');

        $this->User->id = $id;

        if ( $this->request->is('post') ){
            if ( $this->User->save($this->request->data) ){
                $this->Session->setFlash("Clave cambiada", 'default', array('class'=>'custom_success'));
                if ( $this->Auth->user('type') == 'asesor' )
                    $this->redirect(array('controller'=>'Advisers', 'action' => 'view'));
                else if ( $this->Auth->user('type') == 'tutor' )
                    $this->redirect(array('controller'=>'Tutors', 'action' => 'view', $this->Auth->user('Adviser')['id']));
            }
        }
    }
}
?>
