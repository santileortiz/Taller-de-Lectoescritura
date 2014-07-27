<h2>Listado de usuarios</h2>
<?php echo $this->Html->link('Agregar usuaro', array('action'=>'add'),array('class' => 'btnAdd'));?>
<br>
<p></p>
<table>
	<tr>
		<th>Usuario</th>
		<th>Password</th>
		<th>Tipo</th>
	</tr>
<?php foreach($users as $k=>$user):?>
	<tr>
		<td><?php echo $user['User']['username'];?></td>
		<td><?php echo $user['User']['password'];?></td>
		<td><?php echo $user['User']['type'];?></td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $user['User']['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $user['User']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$user['User']['id'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<a href="../" class="btnOpciones">Regresar</a>
