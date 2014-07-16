<h2>Editar equipo</h2>
<?php
		echo $this->Form->create('Team', array('action' => 'edit'));
		echo $this->Form->input('adviser_id', array('label' => 'Asesor', 'type' => 'text'));
		echo $this->Form->input('student_id', array('label' => 'Alumno', 'type' => 'text'));
		echo $this->Form->end('Guardar cambios');
?>
<a href="../" class="btnOpciones">Salir sin cambios</a>