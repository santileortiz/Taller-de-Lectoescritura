<h2>Listado de equipos</h2>
<?php 
$this->NavMenu->set('Equipos');
?>
<br>
<p></p>
<table>
	<tr>
		<th>Equipo</th>
		<th>Alumno</th>
		<th>Acciones</th>
	</tr>
<?php foreach($Equipos as $k=>$equipo):?>
	<tr>
		<td><?php echo $equipo['Team']['id'];?></td>
        <td><?php 
        if ( $equipo['Team']['student_id'] == 0 )
            echo 'No asignado';
        else 
            echo $equipo['Student']['dropdown_name'];?>
        </td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $equipo['Team']['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $equipo['Team']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$equipo['Team']['id'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<?php
echo $this->Html->link('Agregar equipo', array('action'=>'add'),array('class' => 'btnAdd'));
?>
