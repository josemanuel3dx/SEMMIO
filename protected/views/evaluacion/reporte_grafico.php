<?php
/* @var $this MatrizController */
/* @var $model Matriz */

$this->breadcrumbs=array(
	'Evaluar'=>array('index'),
	'Resultados',
);

$this->menu=array(
	//array('label'=>'List Matriz', 'url'=>array('index')),
	//array('label'=>'Manage Matriz', 'url'=>array('admin')),
);
?>
<script>

	$(function(){

		var nombre_matriz = $('input:hidden[name=name_m]').val();
		var nombre_niveles = $('input:hidden[name=name_niveles]').val();
		var resultados = $('input:hidden[name=resultados_niveles]').val();
		myarr = nombre_niveles.split(",");
		myarr_r = resultados.split(",");
        var chart,
        colors = Highcharts.getOptions().colors;
    
        function setChart(name, categories, data, color) {
            chart.xAxis[0].setCategories(categories);
            chart.series[0].remove();
            chart.addSeries({
                name: name,
                data: data,
                color: color || 'white'
            });
        }
    
        $(document).ready(function(){
        
            var categories = [myarr[0],myarr[1],myarr[2],myarr[3],myarr[4]],
                name = 'Niveles',
                data = [{
                        y: parseFloat(myarr_r[0]),
                        color: colors[0],
                        drilldown: {
                            name: 'Nivel Inicial',
                            color: colors[0]
                        }
                    }, {
                        y: parseFloat(myarr_r[1]),
                        color: colors[1],
                        drilldown: {
                            name: 'Nivel Administrado',
                            color: colors[1]
                        }
                    }, {
                        y: parseFloat(myarr_r[2]),
                        color: colors[2],
                        drilldown: {
                            name: 'Nivel Definido',
                            color: colors[2]
                        }
                    }, {
                        y: parseFloat(myarr_r[3]),
                        color: colors[3],
                        drilldown: {
                            name: 'Nivel Medido',
                            color: colors[3]
                        }
                    }, {
                        y: parseFloat(myarr_r[4]),
                        color: colors[4],
                        drilldown: {
                            name: 'Nivel Optimizado',
                            color: colors[4]
                        }
                    }];
        
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    type: 'column'
                },
                title: {
                    text: [nombre_matriz],
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: categories
                },
                yAxis: {
                    title: {
                        text: 'Total Porcentaje'
                    }
                },
                plotOptions: {
                    column: {
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function() {
                                    var drilldown = this.drilldown;
                                    if (drilldown) { // drill down
                                        //setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                    } else { // restore
                                        //setChart(name, categories, data);
                                    }
                                }
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            color: colors[0],
                            style: {
                                fontWeight: 'bold'
                            },
                            formatter: function() {
                                return this.y +'%';
                            }
                        }
                    }
                },
                tooltip: {
                    formatter: function() {
                       // var point = this.point,
                            s = this.x +':<b>'+ this.y +'% Completado</b><br/>';
                        return s;
                    }
                },
                series: [{
                    name: name,
                    data: data,
                    color: 'white'
                }],
                exporting: {
                    enabled: false
                }
            });
        });     
    });

</script>

<h1>Resultado</h1>

<?php $evaluacion=Evaluacion::model()->findByAttributes(array('id_evaluacion'=>$evaluacion_id)); ?>
<?php $matriz=Matriz::model()->findByAttributes(array('id_matriz'=>$evaluacion->id_matriz)); ?>
<?php $niveles=Nivel::model()->findAll(); ?>
<?php $nive =array();

$resultado_graficar = array();

$repuestas_y_caracteristica = Yii::app()->db->createCommand("SELECT a.id_pregunta id_pregunta, a.id_respuesta metrica, ".
	"b.id_caracteristica caracteristica, c.valor valor   ".
	"FROM resultado a ".
	"LEFT JOIN pregunta b ON a.id_pregunta = b.id_pregunta ".
	"LEFT JOIN metrica c ON a.id_respuesta = c.id_metrica ".
	"WHERE id_evaluacion = ".$evaluacion_id)->queryAll();
	
	foreach($niveles as $n){

		$respuestas=0;
		$valor_por_nivel = 0;
		$id_pregunta_array = array();

		foreach($repuestas_y_caracteristica as $ryc){
		
			$repuestas_y_caracteristica2 = Yii::app()->db->createCommand(" SELECT a.id_caracteristica id_caracteristica ".
			     "FROM caracteristica a ".
			     "WHERE id_caracteristica in (".$ryc['caracteristica'].") and id_nivel=".$n['id_nivel'])->queryAll();
			
			if(count($repuestas_y_caracteristica2)>=1){
				$respuestas++;
				$id_pregunta_array[]= $ryc['id_pregunta'];
			
				$resultados_por_nivel = Yii::app()->db->createCommand(" SELECT * ".
					"FROM resultado a ".
					"LEFT JOIN metrica b ON a.id_respuesta = b.id_metrica ".
					"WHERE a.id_pregunta=".$ryc['id_pregunta']." and a.id_evaluacion = ".$evaluacion_id)->queryAll();
					
					foreach($resultados_por_nivel as $r)
						$valor_por_nivel = $valor_por_nivel + $r['valor'];
			}
				
		}
				
		unset($id_pregunta_array);
			
		if($respuestas!=0) 
		    $valor_por_columna[]=round(($valor_por_nivel*100)/($respuestas*4),2);
		else 
            $valor_por_columna[]=0;
	}
	
	$resultado_f = implode(", ",$valor_por_columna); 
	
    foreach($niveles as $niv)
		$nive[] = $niv['nombre_nivel'];	
	
    $niveles_f = implode(", ",$nive);
?>

<input type="hidden" name="name_m" value="<?php echo $matriz->nombre_matriz;?>">
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<input type="hidden" name="name_niveles" value="<?php echo $niveles_f ;?>">
<input type="hidden" name="resultados_niveles" value="<?php echo $resultado_f ;?>">

