<?php
App::uses('AppController', 'Controller');

class AdvisersController extends AppController {

    public function beforeFilter(){
        parent::beforeFilter();
        
    }	

    public function isAuthorized($user){
        //si es un asesor:
        if ( $user['type'] == 'asesor' ){
            //Solo puede editar su perfil
            if($this->action=='edit'){
                $this->Adviser->User;
                return $this->Adviser->isOwnProfile($this->request->params['pass'][0], $user);
            }else if(in_array($this->action, array( 'index', 'view', 'home', 'addTutors'))){
                //Puede ver la informacion de todos los asesores
                return true;
            }
        }
        //Si es administrador puede hacer cualquier cosa
        return parent::isAuthorized($user);
    }

	public function index() {
		$params = array('order' => 'name');
		$this->set('advisers', $this->Adviser->find('all'));
		$this->set('users', $this->Adviser->User->find('list'));
		$this->set('type', $this->Auth->user('type'));
	}

	public function add() {
		if($this->request->is('post')):
			if($this->Adviser->save($this->request->data)):
				$this->Session->setFlash("¡Asesor guardado!", 'default', array('class'=>'custom_success'));
				$this->redirect(array('action' => 'index'));
			endif;
        else:
		$this->set('users', $this->Adviser->User->find('list'));
		endif;
	}

    public function addTutors(){
        if ( $this->request->is('post') ){
            $usernames = explode(',', $this->request->data['Form']['usernames']);
            foreach ($usernames as $k => $username){
                $without_spaces = preg_replace('/\s+/', '', $username);
                if ( strpos($username, '@') !== false ){
                    $parts = explode('@', $without_spaces);
                    if ( strpos($parts[1], 'itesm') !== false ){
                        $usernames[$k] = strtoupper($parts[0]);
                    }else{
                        $usernames[$k] = $parts[0];
                    }
                }
            }
            $passwords = $this->Adviser->Tutor->createTutors($usernames, $this->Auth->user('Adviser')['id']);
            $this->set('users', array_combine($usernames, $passwords));
            $this->render('htmlPasswords');

        }
    }

	public function edit($id = null){
		$this->Adviser->id = $id;
		if($this->request->is('get')):
			$this->request->data = $this->Adviser->read();
		else: //peticion no es get
            if($this->Adviser->save($this->request->data)):
                $this->Session->setFlash('¡Asesor '.$this->request->data['Adviser']['name'].' editado!', 'default', array('class'=>'custom_success'));
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
			$this->Session->setFlash('¡Asesor eliminado!', 'default', array('class'=>'custom_success'));
			if($this->Adviser->delete($id)):
				$this->redirect( array('action' => 'index') );
			endif;
		endif;
	}

    public function view($id){
        $this->Adviser->id = $id;
        $this->set('adviser', $this->Adviser->read());
    }

    public function home(){
        $this->set('auth_user', $this->Auth->user());
    }
}
?>
