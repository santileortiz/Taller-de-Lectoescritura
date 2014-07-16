<h2>Listado de asesores</h2>
<?php echo $this->Html->link('Agregar asesor', array('action'=>'add'),array('class' => 'btnAdd'));?>
<br>
<p></p>
<table>
	<tr>
		<th>ID</th>
		<th>Nómina</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Celular</th>
		<th>Acciones</th>
	</tr>
<?php foreach($asesores as $k=>$asesor):?>
	<tr>
		<td><?php echo $asesor['Adviser']['id'];?></td>
		<td><?php echo $asesor['Adviser']['tec_id'];?></td>
		<td><?php echo $asesor['Adviser']['name'];?></td>
		<td><?php echo $asesor['Adviser']['last_name'];?></td>
		<td><?php echo $asesor['Adviser']['cell_phone'];?></td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $asesor['Adviser']['id']),array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $asesor['Adviser']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$asesor['Adviser']['name'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<a href="/" class="btnOpciones">Regresar</a>
