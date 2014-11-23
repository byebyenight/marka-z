<?php
echo $this->Html->script('jquery-1.10.2.min',array('inline'=>false));
echo $this->Html->script('processing-1.4.1',array('inline'=>false));
echo $this->Html->css('processing.css',null,array('inline'=>false));
#echo $this->Html->css('inremains.css',null,array('inline'=>false));
?>
<div id="pieces">
<div class="piece" data-track="1">
<?php echo $this->element("piece1"); ?>
</div>
<div class="piece" data-track="2">
<?php echo $this->element("piece2"); ?>
</div>
<div class="piece" data-track="3">
<?php echo $this->element("piece3"); ?>
</div>
</div> 
<?php
/*
if(isset($element)) {
echo $this->element($element);
}
else {
echo "<div><a href='/processing/1'>Hair</a></div>";
echo "<div><a href='/processing/2'>Awkward Spirals</a></div>";
echo "<div><a href='/processing/3'>It's Coming</a></div>";

}
*/
?>
