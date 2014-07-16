<h2>Agregar equipo</h2>
<?php
	echo $this->Form->create('Team');
	echo $this->Form->input('adviser_id',array("options"=>$comboBoxAdviser, 'label' => 'Asesor:' ));
	echo $this->Form->input('student_id',array("options"=>$comboBoxStudent, 'label' => 'Alumno:' ));
	echo $this->Form->end('Guardar equipo');
?>

<a href="../Teams">Regresar</a>