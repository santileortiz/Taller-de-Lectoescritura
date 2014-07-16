<h2>Editar tutor</h2>
<?php
		echo $this->Form->create('Tutor', array('action' => 'edit'));
		echo $this->Form->input('tec_id', array('type' => 'text', 'label' => 'Matrícula'));
		echo $this->Form->input('name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('career');
		echo $this->Form->input('cell_phone');
		echo $this->Form->end('Guardar cambios');
?>
<a href="../" class="btnRegresa">Salir sin cambios</a></li>