<h2>Editar tutor</h2>
<?php
    $this->NavMenu->set('Tutores');
    echo $this->Form->create('Tutor', array('action' => 'edit'));
    echo $this->Form->input('name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('career');
    echo $this->Form->input('cell_phone');
    echo $this->Form->input('team_id', array('empty' => array(0 => '')));
    if ( $auth_user == 'admin')
        echo $this->Form->input('adviser_id');
    echo $this->Form->end('Guardar cambios');
    echo $this->Html->link('Salir sin cambios', array('action'=>'index'));
?>
