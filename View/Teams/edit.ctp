<?php 
$this->NavMenu->set('Equipos');
?>
<h2>Editar equipo</h2>
<?php
		echo $this->Form->create('Team', array('action' => 'edit'));
		//echo $this->Form->input('adviser_id', array('label' => 'Asesor'));
		echo $this->Form->input('student_id', array('label' => 'Alumno', 'empty'=>''));
		echo $this->Form->end('Guardar cambios');
?>
<a href="../" class="btnOpciones">Salir sin cambios</a>
