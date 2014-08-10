<?php
$this->NavMenu->set();

echo '<h2>Usuario: '.$auth_user['username'].'</h2>';
echo $this->Form->create('User');
echo $this->Form->input('password', array('label'=>'Clave nueva'));
echo $this->Form->input('repass', array('label'=>'Confirma la clave', 'type'=>'password'));
echo $this->Form->end('Cambiar');
?>
