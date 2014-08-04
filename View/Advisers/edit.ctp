<?php $this->NavMenu->set('Mi Perfil');?>
<h2>Editar asesor</h2>
<?php
		echo $this->Form->create('Adviser', array('action' => 'edit'));
		echo $this->Form->input('Adviser.name', array('label' => 'Nombre'));
		echo $this->Form->input('Adviser.last_name', array('label' => 'Apellido'));
		echo $this->Form->input('Adviser.cell_phone', array('label' => 'Celular'));
		echo $this->Form->end('Guardar cambios');
?>
<a href="../" class="btnOpciones">Salir sin cambios</a>
