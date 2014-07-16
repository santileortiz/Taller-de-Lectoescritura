<h2>Agregar asistencia de alumno</h2>
<?php
	echo $this->Form->create('AttendanceStudent');
	echo $this->Form->input('student_id',array("options"=>$comboBoxAStudent, 'label' => 'Alumno:' ));
	echo $this->Form->input('date', array('label' => 'Fecha'));
	echo $this->Form->input('binnacle', array('label' => 'Bitácora'));
	echo $this->Form->end('Guardar asistencia');
?>

<a href="../" class="btnOpciones">Regresar</a>
