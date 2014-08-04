<?php $this->NavMenu->set('Mi Perfil');?>
<dl>
    <dt><?php echo 'Usuario/Nómina'; ?></dt>
    <dd>
        <?php echo $adviser['User']['username']; ?>
        &nbsp;
    </dd>
    <dt><?php echo 'Nombre'; ?></dt>
    <dd>
        <?php echo h($adviser['Adviser']['name']); ?>
        &nbsp;
    </dd>
    <dt><?php echo 'Apellido'; ?></dt>
    <dd>
        <?php echo h($adviser['Adviser']['last_name']); ?>
        &nbsp;
    </dd>
    <dt><?php echo 'Celular'; ?></dt>
    <dd>
        <?php echo h($adviser['Adviser']['cell_phone']); ?>
        &nbsp;
    </dd>
</dl>
<br>
<?php
    echo $this->Html->link('Editar', array('controller' => 'Advisers', 'action' => 'edit', $auth_user['Adviser']['id']), array('class'=>'btnAdd'));
?>
