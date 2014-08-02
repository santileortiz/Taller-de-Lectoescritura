<h2>Listado de tutores</h2>
<?php $this->NavMenu->set('Tutores');?>
<br>
<p></p>
<table>
	<tr>
		<th>Matricula</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Carrera</th>
		<th>Celular</th>
		<th>Equipo</th>
<?php if ( $auth_user['type'] != 'tutor'):?>
		<th>Acciones</th>
<?php endif;?>
	</tr>
<?php foreach($tutores as $k=>$tutor):?>
	<tr>
		<td><?php echo $tutor['User']['username'];?></td>
		<td><?php echo $tutor['Tutor']['name'];?></td>
		<td><?php echo $tutor['Tutor']['last_name'];?></td>
		<td><?php echo $tutor['Tutor']['career'];?></td>
		<td><?php echo $tutor['Tutor']['cell_phone'];?></td>
		<td><?php echo $tutor['Tutor']['team_id'];?></td>
		<!--Btn Acciones-->
<?php if ( $auth_user['type'] != 'tutor'):?>
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $tutor['Tutor']['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $tutor['Tutor']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$tutor['Tutor']['name'].'?'));?>
<?php endif;?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<?php echo $this->Html->link('Agregar tutor', array('action'=>'add'),array('class' => 'btnAdd'));?>
<?php echo $this->Html->link('Agregar varios tutores', array('controller'=>'Advisers', 'action'=>'addTutors'),array('class' => 'btnAdd'));?>
