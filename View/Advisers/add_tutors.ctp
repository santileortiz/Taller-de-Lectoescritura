<h1>Agregar tutores</h1>
<p>
    En la caja de texto a continuacion, copie y pegue los correos institucionales
    de los tutores que desea agregar al sistema separados por coma.
</p>
<?php
    $this->NavMenu->set('Tutores');
	echo $this->Form->create('Form');
	echo $this->Form->input('usernames');
	echo $this->Form->end('Guardar tutores');
?>

<a href="../Tutors">Regresar</a>
