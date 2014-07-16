<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		SATLE - Seguimiento y Administración del Taller de Lecto-Escritura.
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<?php echo $this->Html->image('itesm.png', array('alt' => 'Itesm', 'style' => 'float:right; padding: 0px 5px')); ?>
			<?php echo $this->Html->image('tle.png', array('alt' => 'TLE', 'style' => 'float:left; padding: 0px 5px 0px 0px')); ?>
			<h2 style = "color: white"><a href="/projects/cake" style="text-decoration: none">SATLE</a></h2>
			<h1 style = "color: white; font-size:10px">Seguimiento y Administración del Taller de Lecto-Escritura</h1>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<p style="font-size: 12px; text-align: center">
			DCSH. © Instituto Tecnológico y de Estudios Superiores de Monterrey, México. 2014.	
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
