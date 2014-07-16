<h2>Asistencia de tutores</h2>
<?php echo $this->Html->link('Agregar asistencia', array('action'=>'add'),array('class' => 'btnAdd'));?>
<br>
<p></p>
<table>
	<tr>
		<th>Matricula</th>
		<th>Fecha</th>
		<th>Acciones</th>
	</tr>
<?php foreach($asistencia as $k=>$asiste):?>
	<tr>
		<td><?php echo $asiste['AttendanceTutor']['tutor_id'];?></td>
		<td><?php echo $asiste['AttendanceTutor']['date'];?></td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $asiste['AttendanceTutor']['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $asiste['AttendanceTutor']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$asiste['AttendanceTutor']['tutor_id'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<a href="/" class="btnOpciones">Regresar</a>
