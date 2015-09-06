	$(document).ready(function(){
	    $("select[name=matrix]").change(function(){
		   id_matriz = $('select[name=matrix]').val();
		   $.ajax({
	       url: "mostrarmatriz",
	        //url: <?php echo "'".CController::createUrl('solicitantes/ExistePersona')."'"; ?>,
               
	       
	       type: "GET",
	       //data: "id_matriz="+id_matriz,
	       data: {'id_matriz' : $('select[name=matrix]').val()},
	       dataType: 'json',
	       success: function(data){
			   alert('Bueno');
	           //$("#mostrar_matriz").val(data);
	           //$("#mostrar_matriz").html(response);
	       },
	       error: function(data){
			   console.log(data);
			   alert('Malo');
			   },
	        });
	    });
	    
	});
	
		/*$(document).ready(function(){
		    $("select[name=matrix]").change(function(){
				$.ajax({
				    alert($('select[name=matrix]').val());   
		        });
		     });
		});*/
	
