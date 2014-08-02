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
		<th>Acciones</th>
	</tr>
<?php foreach($tutors as $k=>$tutor):?>
	<tr>
		<td><?php echo $tutor['User']['username'];?></td>
		<td><?php echo $tutor['name'];?></td>
		<td><?php echo $tutor['last_name'];?></td>
		<td><?php echo $tutor['career'];?></td>
		<td><?php echo $tutor['cell_phone'];?></td>
		<td><?php echo $tutor['team_id'];?></td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $tutor['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $tutor['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$tutor['name'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<?php echo $this->Html->link('Agregar tutor', array('controller'=>'Tutors', 'action'=>'add', $auth_user),array('class' => 'btnAdd'));?>
