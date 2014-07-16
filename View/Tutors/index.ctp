<h2>Listado de tutores</h2>
<?php echo $this->Html->link('Agregar tutor', array('action'=>'add'),array('class' => 'btnAdd'));?>
<br>
<p></p>
<table>
	<tr>
		<th>ID</th>
		<th>Matricula</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Carrera</th>
		<th>Celular</th>
		<th>Equipo</th>
		<th>Acciones</th>
	</tr>
<?php foreach($tutores as $k=>$tutor):?>
	<tr>
		<td><?php echo $tutor['Tutor']['id'];?></td>
		<td><?php echo $tutor['Tutor']['tec_id'];?></td>
		<td><?php echo $tutor['Tutor']['name'];?></td>
		<td><?php echo $tutor['Tutor']['last_name'];?></td>
		<td><?php echo $tutor['Tutor']['career'];?></td>
		<td><?php echo $tutor['Tutor']['cell_phone'];?></td>
		<td><?php echo $tutor['Tutor']['team_id'];?></td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $tutor['Tutor']['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $tutor['Tutor']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$tutor['Tutor']['name'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<a href="/" class="btnOpciones">Regresar</a></li>
