<h2>Editar tutor</h2>
<?php
		echo $this->Form->create('AttendanceTutor', array('action' => 'edit'));
		echo $this->Form->input('tutor_id', array('label' => 'Tutor', 'type' => 'text'));
		echo $this->Form->input('date', array('label' => 'Fecha'));
		
		echo $this->Form->end('Guardar cambios');
?>
<a href="../" class="btnOpciones">Salir sin cambios</a>