<h1>Agregar usuario</h1>
<?php
	echo $this->Form->create('User', array('novalidate'=>true));
	echo $this->Form->input('username', array('label' => 'Usuario', 'type' => 'text'));
	echo $this->Form->input('password', array('label' => 'Clave', 'type' => 'password'));
	echo $this->Form->input('type',array("options"=>array('admin'=>'Administrador','asesor'=>  'Asesor', 'tutor'=> 'Tutor',  'munira'=>'Munira'), 'label' => 'Tipo' ));
	echo $this->Form->end('Guardar usuario');
?>

<a href="../Users">Regresar</a>
