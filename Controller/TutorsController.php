<?php
class TutorsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index() {
		$params = array('order' => 'name');
		$this->set('tutores', $this->Tutor->find('all', $params));
	}
	
	public function add() {
		$this->loadModel('Team');
		$users = $this->Team->find('list');
    	$this->set('comboBox',$users);

		if($this->request->is('post')):
			if($this->Tutor->save($this->request->data)):
				$this->Session->setFlash("¡Tutor guardado!", 'default', array('class'=>'custom_success'));
				$this->redirect(array('action' => 'index'));
			endif;
		endif;
	}

	public function edit($id = null){
		$this->Tutor->id = $id;
		if($this->request->is('get')):
			$this->request->data = $this->Tutor->read();
		else: //peticion no es get
		if($this->Tutor->save($this->request->data)):
			$this->Session->setFlash('¡Tutor '.$this->request->data['Tutor']['name'].' editado!', 'default', array('class'=>'custom_success'));
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
			$this->Session->setFlash('¡Tutor eliminado!', 'default', array('class'=>'custom_success'));
			if($this->Tutor->delete($id)):
				$this->redirect( array('action' => 'index') );
			endif;
		endif;
	}
}
?>