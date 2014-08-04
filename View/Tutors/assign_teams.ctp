<?php
    $this->NavMenu->set('Equipos');
    echo $this->Form->create('Team');
?>
<Table>
    <tr>
		<th>Matricula</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Carrera</th>
		<th>Marcar</th>
    </tr>
<?php
    foreach ( $tutors as $k => $tutor ){
        echo '<tr>';
        
        echo '<td>'.$tutor['User']['username'].'</td>';
        echo '<td>'.$tutor['Tutor']['name'].'</td>';
        echo '<td>'.$tutor['Tutor']['last_name'].'</td>';
        echo '<td>'.$tutor['Tutor']['career'].'</td>';
        echo '<td>'.$this->Form->checkbox($k, array(
            'value'=>$tutor['Tutor']['id'],
            'hiddenField' => false
        )).'</td>';
        echo '</tr>';
    }

?>
</Table>
<?php 
	echo $this->Form->end('Crear equipo');
?>
