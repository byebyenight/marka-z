<?php
echo $this->Html->script('jquery-1.10.2.min',array('inline'=>false));
echo $this->Html->script('processing-1.4.1',array('inline'=>false));
echo $this->Html->css('inremains.css',null,array('inline'=>false));
?>
<?php 
if(isset($element)) {
echo $this->element($element);
}
else {
//echo "<div><a href='/inremains/1'>Hair</a></div>";
//echo "<div><a href='/inremains/2'>Awkward Spirals</a></div>";
//echo "<div><a href='/inremains/3'>It's Coming</a></div>";

}
?>

<div class="css-slideshow"> 
  <figure> 
  </figure> 
  <figure> 
   </figure> 
  <figure> 
  </figure> 
  <figure> 
</figure> 
</div>

