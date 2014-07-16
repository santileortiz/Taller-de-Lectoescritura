<?php
class AttendanceTutorsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	public function index() {
		$params = array('order' => 'name');
		$this->set('asistencia', $this->AttendanceTutor->find('all', $params));
	}
	
	public function add() {
		$this->loadModel('Tutor');
		$user1 = $this->Tutor->find('list', array('fields' => array('Tutor.id', 'dropdown_name')));
    	$this->set('comboBoxATutor',$user1);

		if($this->request->is('post')):
			if($this->AttendanceTutor->save($this->request->data)):
				$this->Session->setFlash("¡Asistencia guardada!", 'default', array('class'=>'custom_success'));
				$this->redirect(array('action' => 'index'));
			endif;
		endif;
	}

	public function edit($id = null){
		$this->AttendanceTutor->id = $id;
		if($this->request->is('get')):
			$this->request->data = $this->AttendanceTutor->read();
		else: //peticion no es get
		if($this->AttendanceTutor->save($this->request->data)):
			$this->Session->setFlash('¡Asistencia de tutor '.$this->request->data['AttendanceTutor']['name'].' editada!', 'default', array('class'=>'custom_success'));
			$this->redirect( array('action' => 'index') );
		else:
			$this->Session->setFlash('Error al guardar los cambios...', 'default', array('class'=>'custom_success'));
		endif;
	endif;
	}

	public function delete($id){
		if($this->request->is('get')):
			throw new MethodNotAllowedException('Esto es hack');
		else:
			$this->Session->setFlash('¡Asistencia de Tutor eliminada!', 'default', array('class'=>'custom_success'));
			if($this->AttendanceTutor->delete($id)):
				$this->redirect( array('action' => 'index') );
			endif;
		endif;
	}
}
?>