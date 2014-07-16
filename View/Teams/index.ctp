<h2>Listado de equipos</h2>
<a href="Teams/add" class="btnAdd">Agregar equipo</a> 
<br>
<p></p>
<table>
	<tr>
		<th>Equipo</th>
		<th>Clave de asesor</th>
		<th>Clave de alumno</th>
		<th>Acciones</th>
	</tr>
<?php foreach($Equipos as $k=>$equipo):?>
	<tr>
		<td><?php echo $equipo['Team']['id'];?></td>
		<td><?php echo $equipo['Team']['adviser_id'];?></td>
		<td><?php echo $equipo['Team']['student_id'];?></td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $equipo['Team']['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $equipo['Team']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$equipo['Team']['id'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<a href="/projects/cake/" class="btnOpciones">Regresar</a>