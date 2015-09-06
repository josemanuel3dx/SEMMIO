<?php
/* @var $this MatrizController */
/* @var $model Matriz */

$this->breadcrumbs=array(
	'Matriz'=>array('index'),
	'Ver',
);

?>
	
<script>

	$(document).ready(function(){

		$('#matrix').val('1');
	    $("select[name=matrix]").change(function(){
		   id_matriz = $('select[name=matrix]').val();
		   $.ajax({
	        url: <?php echo "'".CController::createUrl('matriz/mostrar')."'"; ?>,
	       	type: "GET",
	       	data: {'id_matriz' : $('select[name=matrix]').val()},
	       	dataType: 'json',
	       	success: function(data){
			   $("#mostrar_matriz").html(data.message);
	       	},
	       	error: function(data){
			   alert('ERROR');
			},

	        });
	    });
	    
	    $('#matrix').trigger('change');	 
	});

</script>
	
<script>
	$(function() {
		$(document ).tooltip();
	});
</script>

<style>
	label {
		display: inline-block;
		width: 5em;
	}
</style>

<h1>Matrices de Interoperabilidad</h1>

<center>

	<select name="matrix" id="matrix">
		<?php foreach($mode1 as $data): ?>
			<h1><?php //echo $data->id_matriz.' - '. $data->nombre_matriz;?></h1>
		    <option value="<?php echo $data->id_matriz?>"><?php echo $data->nombre_matriz?></option>
		<?php endforeach; ?>
	 </select>	
	 
	 <div id="mostrar_matriz"></div>

</center>
