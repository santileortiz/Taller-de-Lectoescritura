<?php 
$this->NavMenu->set('Equipos');
?>
<h2>Agregar equipo</h2>
<?php
	echo $this->Form->create('Team');
	echo $this->Form->input('student_id', array('label' => 'Alumno', 'empty'=>''));
	echo $this->Form->end('Guardar equipo');
?>
