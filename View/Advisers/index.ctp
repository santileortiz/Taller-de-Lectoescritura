<?php $this->NavMenu->set('Asesores');?>
<h2>Listado de asesores</h2>
<?php if ( $type == 'admin'):?>
<?php echo $this->Html->link('Agregar asesor', array('action'=>'add'),array('class' => 'btnAdd'));?>
<?php endif;?>
<br>
<p></p>
<table>
	<tr>
		<th>ID</th>
		<th>Nómina</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Celular</th>
        <?php if ( $type == 'admin'):?>
		<th>Acciones</th>
        <?php endif;?>
	</tr>
<?php foreach($advisers as $k=>$adviser):?>
	<tr>
		<td><?php echo $adviser['Adviser']['id'];?></td>
		<td><?php echo $adviser['User']['username'];?></td>
		<td><?php echo $adviser['Adviser']['name'];?></td>
		<td><?php echo $adviser['Adviser']['last_name'];?></td>
		<td><?php echo $adviser['Adviser']['cell_phone'];?></td>
		<!--Btn Acciones-->
        <?php if ( $type == 'admin'):?>
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $adviser['Adviser']['id']),array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $adviser['Adviser']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$adviser['Adviser']['name'].'?'));?>
		</td>
        <?php endif;?>
	</tr>
<?php endforeach;?>
</table>
