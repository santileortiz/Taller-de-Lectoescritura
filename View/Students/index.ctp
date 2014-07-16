<h2>Listado de alumnos</h2>
<?php echo $this->Html->link('Agregar alumno', array('action'=>'add'),array('class' => 'btnAdd'));?>
<br>
<p></p>
<table>
	<tr>
		<th>Matrícula</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Edad</th>
		<th>Grado escolar</th>
		<th>Celular</th>
		<th>Teléfono</th>
		<th>Correo electrónico</th>
		<th>Comentarios</th>
		<th>Acciones</th>
	</tr>
<?php foreach($estudiantes as $k=>$estudiante):?>
	<tr>
		<td><?php echo $estudiante['Student']['id'];?></td>
		<td><?php echo $estudiante['Student']['name'];?></td>
		<td><?php echo $estudiante['Student']['last_name'];?></td>
		<?php 	
				date_default_timezone_set('America/Mexico_City');
				$datetime1 = new DateTime(date('Y-m-d', time()));
				$datetime2 = new DateTime($estudiante['Student']['age']);
				$interval = $datetime1->diff($datetime2);
		?>
		<td><?php echo $interval->format("%y")?></td>
		<td><?php echo $estudiante['Student']['grade'];?></td>
		<td><?php echo $estudiante['Student']['cell_phone'];?></td>
		<td><?php echo $estudiante['Student']['phone'];?></td>
		<td><?php echo $estudiante['Student']['email'];?></td>
		<td><?php echo $estudiante['Student']['comment'];?></td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $estudiante['Student']['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $estudiante['Student']['id']), 
					array( 'class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$estudiante['Student']['name'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<a href="/" class="btnOpciones">Regresar</a></li>
