<?php
class TeamsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	public function index() {
		$params = array('order' => 'adviser_id');
		$this->set('Equipos', $this->Team->find('all', $params));
	}
	
	public function add() {
    	$this->set('advisers',$this->Team->Adviser->find('list'));

    	$this->set('students',$this->Team->Student->find('list'));

		if($this->request->is('post')):
			if($this->Team->save($this->request->data)):
				$this->Session->setFlash("¡Equipo guardado!", 'default', array('class'=>'custom_success'));
				$this->redirect(array('action' => 'index'));
			endif;
		endif;
	}

	public function edit($id = null){
		$this->Team->id = $id;
		if($this->request->is('get')):
			$this->request->data = $this->Team->read();
		else: //peticion no es get
		if($this->Team->save($this->request->data)):
			$this->Session->setFlash('¡Equipo '.$this->request->data['Team']['team_id'].' editado!', 'default', array('class'=>'custom_success'));
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
			$this->Session->setFlash('¡Equipo eliminado!', 'default', array('class'=>'custom_success'));
			if($this->Team->delete($id)):
				$this->redirect( array('action' => 'index') );
			endif;
		endif;
	}
}
?>
