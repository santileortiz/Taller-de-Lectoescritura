<?php
class AdvisersController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	public function index() {
		$params = array('order' => 'name');
		$this->set('asesores', $this->Adviser->find('all'));
	}
	
	public function add() {
		if($this->request->is('post')):
			if($this->Adviser->save($this->request->data)):
				$this->Session->setFlash("¡Asesor guardado!", 'default', array('class'=>'custom_success'));
				$this->redirect(array('action' => 'index'));
			endif;
		endif;
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
}
?>
