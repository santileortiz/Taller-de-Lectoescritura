<?php
class LessonsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	public function index() {
        for ($i=0; $i<24; $i++){
            $time=mktime($i, 0, 0);
            $params = array('order' => 'Lesson.day DESC', 'conditions'=>array('Lesson.start_time'=>date('G:i:s',$time)));
            $calendario[$i]=$this->Lesson->find('all', $params);
        }
        $this->set('sesiones', $calendario);
	}
	
	public function add() {
		if($this->request->is('post')):
			if($this->Lesson->save($this->request->data)):
                $params = array('conditions'=>array('Lesson.id'=>$this->Lesson->id));
                $celdaNueva=$this->Lesson->find('all', $params);
                $this->set(array('idsesion'=>$this->Lesson->id,'celda'=>$celdaNueva[0]));
			endif;
		endif;
	}

//	public function edit($id = null){
//		$this->Lesson->id = $id;
//		if($this->request->is('get')):
//			$this->request->data = $this->Lesson->read();
//		else: //peticion no es get
//		if($this->Lesson->save($this->request->data)):
//			$this->Session->setFlash('¡Sesión editada!', 'default', array('class'=>'custom_success'));
//			$this->redirect( array('action' => 'index') );
//		else:
//			$this->Session->setFlash('Error al guardar los cambios...');
//		endif;
//	endif;
//	}

	public function delete($id){
		if($this->request->is('get')):
			throw new MethodNotAllowedException('Esto es hack');
		else:
			$this->Lesson->delete($id);
		endif;
	}
}
?>
