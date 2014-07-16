<h2>Editar alumno</h2>
<?php
		echo $this->Form->create('Student', array('action' => 'edit'));
		echo $this->Form->input('name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('age');
		echo $this->Form->input('grade');
		echo $this->Form->input('cell_phone');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('comment');
		echo $this->Form->end('Guardar cambios');
?>
<a href="../" class="btnRegresa">Salir sin cambios</a></li>