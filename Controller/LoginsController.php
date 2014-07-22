<?php
class LoginsController extends AppController {
    public $helpers = array('Html', 'Form');
	public $components = array('Session');

    public function index() {
        $this->set('logins', $this->Login->find('all'));
    }
    
	public function add() {
		if($this->request->is('post')):
            $formData = $this->request->data;
            $formData['Login']['password'] = sha1($formData['Login']['password']);
            print_r($formData);
			if($this->Login->save($formData)):
				$this->Session->setFlash("¡Login guardado!", 'default', array('class'=>'custom_success'));
			endif;
		endif;
	}

	public function edit($id = null){
		$this->Login->id = $id;
		if($this->request->is('get')):
			$this->request->data = $this->Login->read();
		else: //peticion no es get
			if($this->Login->save($this->request->data)):
				$this->Session->setFlash('¡Login editado!', 'default', array('class'=>'custom_success'));
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
			$this->Session->setFlash('¡Login eliminado!', 'default', array('class'=>'custom_success'));
			if($this->Login->delete($id)):
				$this->redirect( array('action' => 'index') );
			endif;
		endif;
	}
}
?>
