<h2>Agregar asistencias</h2>
<?php
	echo $this->Form->create('AttendanceTutor');
	echo $this->Form->input('tutor_id',array("options"=>$comboBoxATutor, 'label' => 'Tutor:' ));
	echo $this->Form->input('date', array('label' => 'Fecha'));
	echo $this->Form->end('Guardar asistencia');
?>

<a href="../AttendanceTutors" class="btnOpciones">Regresar</a>