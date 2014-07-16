<h2>Listado de sesiones</h2>

<a href="/cakephp/" class="btnOpciones">Regresar</a>
<table id="schedule">
	<tr>
		<th style="border: 0px solid black;">&nbsp;</th>
		<th rowspan="2">Lunes</th>
		<th rowspan="2">Martes</th>
		<th rowspan="2">Miercoles</th>
		<th rowspan="2">Jueves</th>
		<th rowspan="2">Viernes</th>
	</tr>
<?php for($i=7; $i<=21; $i++){
    echo '<tr><td rowspan="2" class="time">'.$i.':00</td></tr>';
	echo '<tr>';
    $sesionesDeLaHora=$sesiones[$i];
    $sesion=array_pop($sesionesDeLaHora);
    for($j=0; $j<=4; $j++){
        if($sesion!=NULL){
            $idSesion = $sesion['Lesson']['id'];
            $diaSesion=$sesion['Lesson']['day'];
            if ($j == $diaSesion ){
                echo '<td idsesion="'.$idSesion.'" day="'.$j.'" hour="'.$i.'" rowspan="2" class="full" onclick="selectCell(this)">'.$sesion['Lesson']['quota'].'</td>';
                $sesion=array_pop($sesionesDeLaHora);
            } else {
                echo '<td day="'.$j.'" hour="'.$i.'" rowspan="2" class="empty" onclick="selectCell(this)">&nbsp</td>';
            }
        } else{
            echo '<td day="'.$j.'" hour="'.$i.'" rowspan="2" class="empty" onclick="selectCell(this)">&nbsp</td>';
        }
    }
	echo '</tr>';
}
?>
</table>

<?php 
    $this->Html->script('lessonUI.js', array('inline'=>false));
?>
