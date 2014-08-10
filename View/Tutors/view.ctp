<?php $this->NavMenu->set('Mi Perfil');?>
<dl>
    <dt><?php echo 'Matricula'; ?></dt>
    <dd>
        <?php echo $tutor['User']['username']; ?>
        &nbsp;
    </dd>
    <dt><?php echo 'Nombre'; ?></dt>
    <dd>
        <?php echo h($tutor['Tutor']['name']); ?>
        &nbsp;
    </dd>
    <dt><?php echo 'Apellido'; ?></dt>
    <dd>
        <?php echo h($tutor['Tutor']['last_name']); ?>
        &nbsp;
    </dd>
    <dt><?php echo 'Celular'; ?></dt>
    <dd>
        <?php echo h($tutor['Tutor']['cell_phone']); ?>
        &nbsp;
    </dd>
</dl>
<br>
<?php
    echo $this->Html->link('Editar', array('controller' => 'tutors', 'action' => 'edit'), array('class'=>'btnAdd'));
    echo $this->Html->link('Cambiar clave', array('controller'=>'Users', 'action'=>'changePassword'), array('class'=>'btnAdd'));
?>
