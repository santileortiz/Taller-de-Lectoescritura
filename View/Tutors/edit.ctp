<h2>Editar tutor</h2>
<?php
    if ( $auth_user['type'] == 'asesor' )
        $this->NavMenu->set('Tutores');
    else if ( $auth_user['type'] == 'tutor' )
        $this->NavMenu->set('Mi perfil');
    echo $this->Form->create('Tutor', array('action' => 'edit'));
    echo $this->Form->input('name', array('label' => 'Nombre'));
    echo $this->Form->input('last_name', array('label'=>'Apellido'));
    echo $this->Form->input('career', array('label' => 'Carrera'));
    echo $this->Form->input('cell_phone', array('label'=>'Teléfono celular'));
    if ( $auth_user['type'] != 'tutor' )
        echo $this->Form->input('team_id', array('label'=>'Equipo','empty' => array(0 => '')));
    if ( $auth_user == 'admin')
        echo $this->Form->input('adviser_id', array('label'=>'Asesor'));
    echo $this->Form->end('Guardar cambios');
?>
