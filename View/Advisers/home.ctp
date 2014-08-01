<br>
<h2 style="font-size:20px">Bienvenido asesor</h2>
<p>Seleccione:</p>
<p></p>
<ul class="nav">
<?php
$this->NavMenu->set();
echo $this->Html->link('Perfil',array('controller'=>'Advisers', 'action'=>'view', $auth_user['Adviser']['id']),
    array('class'=>'btnMenu'));
echo $this->Html->link('Tutores',array('controller'=>'Tutors', 'action'=>'index'),
    array('class'=>'btnMenu'));
echo $this->Html->link('Asesores',array('controller'=>'Advisers', 'action'=>'index'),
    array('class'=>'btnMenu'));
echo $this->Html->link('Sesiones',array('controller'=>'Lessons', 'action'=>'index'),
    array('class'=>'btnMenu'));
echo $this->Html->link('Equipos',array('controller'=>'Teams', 'action'=>'index'),
    array('class'=>'btnMenu'));
echo $this->Html->link('Usuarios',array('controller'=>'Users', 'action'=>'index'),
    array('class'=>'btnMenu'));
?>
</ul>
<br>
<p>Registrar:</p>
<ul class="nav"> 
<?php
echo $this->Html->link('Asistencia tutores',array('controller'=>'AttendanceTutors',
    'action'=>'index'), array('class'=>'btnMenu'));
echo $this->Html->link('Asistencia alumnos',array('controller'=>'AttendanceStudents',
    'action'=>'index'), array('class'=>'btnMenu'));
?>
</ul>
