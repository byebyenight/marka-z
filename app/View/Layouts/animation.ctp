<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
          <script type="text/javascript" charset="utf-8" src="../js/test_edgePreload.js"></script>
              <style>
                      .edgeLoad-EDGE-228027035 { visibility:hidden; }
                          </style>
	<?php echo $this->Html->charset(); ?>
	<title>
    In Remains
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

