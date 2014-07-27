<h2>Editar usuario</h2>
<?php
		echo $this->Form->create('User', array('action' => 'edit'));
		echo $this->Form->input('user', array('type' => 'text', 'label' => 'Usuario'));
		echo $this->Form->input('passowrd');
		echo $this->Form->input('type');
		echo $this->Form->end('Guardar cambios');
?>
<a href="../" class="btnRegresa">Salir sin cambios</a></li>
