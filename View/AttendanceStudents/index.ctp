<h2>Listado de asistencias de alumnos</h2>
<?php echo $this->Html->link('Agregar asistencia', array('action'=>'add'),array('class' => 'btnAdd'));?>
<br>
<p></p>
<table>
	<tr>
		<th>Fecha</th>
		<th>Matrícula de alumno</th>
		<th>Bitácora</th>
		<th>Acciones</th>
	</tr>
<?php foreach($asistenciaEstudiantes as $k=>$asistenciaEstudiante):?>
	<tr>
		<td><?php echo $asistenciaEstudiante['AttendanceStudent']['date'];?></td>
		<td><?php echo $asistenciaEstudiante['AttendanceStudent']['student_id'];?></td>
		<td><?php echo $asistenciaEstudiante['AttendanceStudent']['binnacle'];?></td>
		<!--Btn Acciones-->
		<td><?php echo $this->Html->link('Editar', array('action'=>'edit', $asistenciaEstudiante['AttendanceStudent']['id']), array( 'class' => 'btnOpciones'));?>
			<?php echo $this->Form->postLink('Eliminar', array('action'=>'delete', $asistenciaEstudiante['AttendanceStudent']['id']),
			array('class' => 'btnOpciones','confirm'=> '¿Realmente desea eliminar a '.$asistenciaEstudiante['AttendanceStudent']['date'].'?'));?>
		</td>
	</tr>
<?php endforeach;?>
</table>
<a href="/" class="btnOpciones">Regresar</a>
