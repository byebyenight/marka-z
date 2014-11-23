<?php
echo $this->Html->script('jquery-1.10.2.min');
?>
<script>
var i = 1;
$(document).ready(function () {
$("#add_btn").click(function() { 
 var degree = Math.floor(Math.random()*180);
 var input_field = $('<input type="text"></>');
 var post = $('<canvas></canvas>').attr({
   width: 300,
   height: 200
   
}).css("-webkit-transform","rotate("+degree+"deg)")//.css("z-index",i++)
.css("position","absolute").css("left",Math.random()*500).css("top",Math.random()*500)
.bind("click", function() {
    var ctx = $(this)[0].getContext("2d");
    ctx.fillStyle="#FF0000";
    ctx.fillRect(0,0,400,300);
    $(this).append('<textarea col="30" row="10"></textarea>');
}).append(input_field)
	.appendTo('body');
 var ctx =post[0]
	.getContext("2d");
ctx.fillStyle="#444444";  
 ctx.fillRect(0,0,400,300);
});
});
</script>
<style>
#add_btn {
z-index: 9999;
position: absolute
}
</style>
<input id="add_btn" type="submit" value="add"/>
