<h2>Bienvenido</h2>
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => 'Usuario'));
	echo $this->Form->input('password', array('label' => 'Clave', 'type'=> 'password'));
	echo $this->Form->end('Iniciar Sesion');
?>

<a href="..">Regresar</a>
