<?php $this->NavMenu->set('Tutores');?>
<p>
A continuacion se encuentra un listado con los usuarios de los Tutores creados
por favor copielos a un lugar seguro (hoja de Excel) pues al cerrar esta ventana
 no sera posible recuperarlos.
</p>
<table>
	<tr>
		<th>Usuario</th>
		<th>Clave</th>
    </tr>
<?php foreach($users as $username=>$password):?>
	<tr>
		<td><?php echo $username;?></td>
		<td><?php echo $password;?></td>
    </tr>
<?php endforeach;?>
</table>
<?php echo $this->Html->link('Regresar', array('controller'=>'Tutors','action'=>'index'),array('class' => 'btnAdd'));?>
