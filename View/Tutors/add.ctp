<h1>Agregar tutores</h1>
<?php
    $this->NavMenu->set('Tutores');
	echo $this->Form->create('Tutor');
	echo $this->Form->input('User.username', array('label' => 'Matricula', 'type' => 'text'));
	echo $this->Form->input('name', array('label' => 'Nombre'));
	echo $this->Form->input('last_name', array('label' => 'Apellido'));
	echo $this->Form->input('career', array('label' => 'Carrera'));
	echo $this->Form->input('cell_phone', array('label' => 'Celular', 'type' => 'text'));
	echo $this->Form->input('team_id',array('label' => 'Equipo', 'empty' => array(0 => '')));
    if ( $auth_user['type'] == 'admin' )
        echo $this->Form->input('adviser_id',array('label' => 'Equipo' ));
	echo $this->Form->end('Guardar tutor');
?>

<a href="../Tutors">Regresar</a>
