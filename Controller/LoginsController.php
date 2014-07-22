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
}
?>
