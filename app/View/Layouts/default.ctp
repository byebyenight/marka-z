<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
        MarkA-Z
	</title>
	<?php 
echo "<link rel='Shortcut Icon' type='image/x-icon' href='../img/icon.png'/>";
		
               // echo $this->Html->meta('favicon.ico',
                  //    '/favicon.ico',
                //       array('type' => 'icon'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Mark A-Z</h1>		
		</div>
		<div id="content">

			<?php // echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php  /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);*/
			?>
		</div>
	</div>
	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>

