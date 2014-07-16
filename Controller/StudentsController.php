<?php
class StudentsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	public function index() {
		$this->set('estudiantes', $this->Student->find('all'));
	}
	
	public function add() {
		if($this->request->is('post')):
			if($this->Student->save($this->request->data)):
				$this->Session->setFlash("¡Alumno guardado!", 'default', array('class'=>'custom_success'));
				$this->redirect(array('action' => 'index'));
			endif;
		endif;
	}

	public function edit($id = null){
		$this->Student->id = $id;
		if($this->request->is('get')):
			$this->request->data = $this->Student->read();
		else: //peticion no es get
			if($this->Student->save($this->request->data)):
				$this->Session->setFlash('¡Estudiante '.$this->request->data['Student']['name'].' editado!', 'default', array('class'=>'custom_success'));
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
			$this->Session->setFlash('¡Alumno eliminado!', 'default', array('class'=>'custom_success'));
			if($this->Student->delete($id)):
				$this->redirect( array('action' => 'index') );
			endif;
		endif;
	}
}
?>