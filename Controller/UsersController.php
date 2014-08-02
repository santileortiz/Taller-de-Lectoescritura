<?php
class UsersController extends AppController {


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
            debug($this->Auth->user());
			if($this->Auth->login()){ //inicia sesion con la informacion POST
                $tipo = $this->Auth->user('type');
                if($tipo=='admin'){
                    $this->redirect(array('controller'=>'pages', 'action'=>'adminPanel'));
                }else if ( $tipo == 'asesor'){
                    $this->redirect(array('controller'=>'Advisers', 'action'=>'home'));
                }
            }
        }
    }

    public function logout(){
        $this->Auth->logout();
        $this->redirect('login');
    }
}
?>
