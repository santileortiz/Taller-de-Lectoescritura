<h1>Agregar tutores</h1>
<?php
	echo $this->Form->create('Login');
	echo $this->Form->input('user', array('label' => 'Usuario', 'type' => 'text'));
	echo $this->Form->input('password', array('label' => 'Clave', 'type' => 'text'));
	echo $this->Form->input('type',array("options"=>array('admin'=>'Administrador','asesor'=>  'Asesor', 'Tutor'=> 'Tutor',  'munira'=>'Munira'), 'label' => 'Tipo' ));
	echo $this->Form->end('Guardar login');
?>

<a href="../Logins">Regresar</a>
