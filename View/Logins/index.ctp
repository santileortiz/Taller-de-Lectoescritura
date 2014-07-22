<h2>Listado de logins</h2>
<?php echo $this->Html->link('Agregar login', array('action'=>'add'),array('class' => 'btnAdd'));?>
<br>
<p></p>
<table>
	<tr>
		<th>Usuario</th>
		<th>Password</th>
		<th>Tipo</th>
	</tr>
<?php foreach($logins as $k=>$login):?>
	<tr>
		<td><?php echo $login['Login']['user'];?></td>
		<td><?php echo $login['Login']['password'];?></td>
		<td><?php echo $login['Login']['type'];?></td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $login['Login']['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $login['Login']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$login['Login']['id'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<a href="../" class="btnOpciones">Regresar</a>
