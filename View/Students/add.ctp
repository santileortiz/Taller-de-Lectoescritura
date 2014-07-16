<h2>Agregar alumno</h2>
<?php
	echo $this->Form->create('Student');
	echo $this->Form->input('name', array('label' => 'Nombre'));
	echo $this->Form->input('last_name', array('label' => 'Apellido'));
	echo $this->Form->input('age', array('label' => 'Fecha de nacimiento'));
	echo $this->Form->input('grade', array('label' => 'Grado escolar'));
	echo $this->Form->input('cell_phone', array('label' => 'Celular'));
	echo $this->Form->input('phone', array('label' => 'Teléfono'));
	echo $this->Form->input('email', array('label' => 'E-mail'));
	echo $this->Form->input('comment', array('label' => 'Comentario'));
	echo $this->Form->end('Guardar alumno');
?>

<a href="../Students">Regresar</a>