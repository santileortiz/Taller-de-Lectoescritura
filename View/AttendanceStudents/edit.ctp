<h2>Editar asistencia de alumnos</h2>
<?php
		echo $this->Form->create('AttendanceStudent', array('action' => 'edit'));
		echo $this->Form->input('student_id', array('label' => 'Alumno', 'type' => 'text'));
		echo $this->Form->input('date', array('label' => 'Fecha'));
		echo $this->Form->input('binnacle', array('label' => 'Bitácora'));

		echo $this->Form->end('Guardar cambios');
?>
<a href="../" class="btnOpciones">Salir sin cambios</a>