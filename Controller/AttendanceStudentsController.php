<?php
class AttendanceStudentsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	public function index() {
		$params = array('order' => 'name');
		$this->set('asistenciaEstudiantes', $this->AttendanceStudent->find('all', $params));
	}
	
	public function add() {
		$this->loadModel('Student');
		$user1 = $this->Student->find('list', array('fields' => array('Student.id', 'dropdown_name')));
    	$this->set('comboBoxAStudent',$user1);

		if($this->request->is('post')):
			if($this->AttendanceStudent->save($this->request->data)):
				$this->Session->setFlash("¡Asistencia guardada!", 'default', array('class'=>'custom_success'));
				$this->redirect(array('action' => 'index'));
			endif;
		endif;
	}

	public function edit($id = null){
		$this->AttendanceStudent->id = $id;
		if($this->request->is('get')):
			$this->request->data = $this->AttendanceStudent->read();
		else: //peticion no es get
		if($this->AttendanceStudent->save($this->request->data)):
			$this->Session->setFlash('¡Asistencia '.$this->request->data['AttendanceStudent']['id'].' editada!', 'default', array('class'=>'custom_success'));
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
			$this->Session->setFlash('¡Asistencia eliminada!', 'default', array('class'=>'custom_success'));
			if($this->AttendanceStudent->delete($id)):
				$this->redirect( array('action' => 'index') );
			endif;
		endif;
	}
}
?>
