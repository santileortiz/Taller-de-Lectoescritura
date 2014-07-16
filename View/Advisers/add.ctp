<h2>Agregar asesor</h2>
<?php
	echo $this->Form->create('Adviser');
	echo $this->Form->input('tec_id', array('label' => 'Nómina', 'type' => 'text'));
	echo $this->Form->input('name', array('label' => 'Nombre'));
	echo $this->Form->input('last_name', array('label' => 'Apellido'));
	echo $this->Form->input('cell_phone', array('label' => 'Celular'));
	echo $this->Form->end('Guardar asesor');
?>

<a href="../Advisers">Regresar</a>
