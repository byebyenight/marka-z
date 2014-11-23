<?php 
echo $this->Html->meta('icon');
echo $this->Html->css('cake.css',null,array('inline'=>false));
echo $this->Html->script('jquery-1.10.2.min',array('inline'=>false));
echo $this->Html->script('main',array('inline'=>false));
?>
<div id="preview">
</div>
<ul>
		<?php 
       foreach ($urls as $url) {
       $u = $url['Collection']['url'];
  echo '<li><a href="'. $u. '"/>'.$url['Collection']['title']. '</a>
</li>';           
      }
		?>
</ul>
