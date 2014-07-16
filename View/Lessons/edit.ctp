<h2>Editar sesión</h2>
<?php
		echo $this->Form->create('Lesson', array('action' => 'edit'));
		echo $this->Form->input('day', array('label' => 'Día'));
		echo $this->Form->input('start_time', array('label' => 'Hora de inicio'));
		echo $this->Form->input('end_time', array('label' => 'Hora de término'));
		echo $this->Form->input('quota', array('label' => 'Cupo'));
		
		echo $this->Form->end('Guardar cambios');
?>
<a href="../" class="btnOpciones">Salir sin cambios</a>