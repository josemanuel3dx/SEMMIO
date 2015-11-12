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


<h1>Resultados</h1>

<?php foreach ($dataVista as $value) {

    echo '<div id="grafico'.$value[2].'" style="min-width: 310px; height: 400px; margin: 0 auto"></div>';
    echo '<br><br><br>';
}?>



<script>

	$(function(){

        var dataGraficos = <?php echo json_encode($dataVista);?>;
        var nivelesDesc = <?php echo json_encode($nivelesDesc);?>;

        var resultados, nombre_niveles, categories, nombre_matriz, data, name, divGrafico;
        


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


            for(var i=0;i<dataGraficos.length;i++)
            {

                resultados = dataGraficos[i][0];
                nombre_niveles = dataGraficos[i][1];
                divGrafico = "grafico"+dataGraficos[i][2];
                nombre_matriz  = dataGraficos[i][3];

                myarr = nombre_niveles.split(",");
                myarr_r = resultados.split(",");
            
        
                categories = [myarr[0],myarr[1],myarr[2],myarr[3],myarr[4]];


                name = 'Niveles';
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
                        renderTo: divGrafico,
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
                         style: {
                                "width": "420px"
                            },
                        formatter: function() {
                            s = this.x +': <b>'+ this.y+'% Completado</b><br/>'+nivelesDesc[this.x];


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
            
            }


        });     
    });

</script>











