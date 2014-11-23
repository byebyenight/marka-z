<?php
$this->Html->script('jquery-1.10.2.min',array('inline'=>false));
$this->Html->script('jquery.validate',array('inline'=>false));


echo "Validation";


?>
<script>
$(document).ready(function() {
  $('.test_form').validate({
});
});
$.validator.addMethod("buga", function(value) {
		return value == "buga";
	}, 'Please enter "buga"!');
</script>
<form class="test_form">
<input class="required buga"/>
</form>
