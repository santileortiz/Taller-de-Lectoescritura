<h2>Agregar equipo</h2>
<?php
	echo $this->Form->create('Team');
	echo $this->Form->input('adviser_id',array('label' => 'Asesor:'));
	echo $this->Form->input('student_id',array('label' => 'Alumno:'));
	echo $this->Form->end('Guardar equipo');
?>

<a href="../Teams">Regresar</a>
