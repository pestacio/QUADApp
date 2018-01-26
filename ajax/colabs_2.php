<?php 
require_once("inc/init.php"); 
?>


<!-- row -->
<div class="row">
	
	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-home"></i> 
				Page Header 
			<span>>  
				Subtitle
			</span>
		</h1>
	</div>
	<!-- end col -->
	
	<!-- right side of the page with the sparkline graphs -->
	<!-- col -->
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">

            
            <!-- end sparks -->
	</div>
	<!-- end col -->
	
</div>
<!-- end row -->

<!--
	The ID "widget-grid" will start to initialize all widgets below 
	You do not need to use widgets if you dont want to. Simply remove 
	the <section></section> and you can use wells or panels instead 
	-->

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">
		
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
				<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
					
					data-widget-colorbutton="false"	
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true" 
					data-widget-sortable="false"
					
				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-comments"></i> </span>
					<h2><?php echo 'Colaboradores';?></h2>
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						<input class="form-control" type="text">	
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body">
						
						<!-- this is what the user will see -->
						<table id="colabs" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
                                                                <tr>
                                                                    <th><?php echo 'RHId';?></th>
                                                                    <th><?php echo 'Nome';?></th>
                                                                    <th data-hide="tablet"><?php echo 'Nome Reduzido';?></th>
                                                                    <th data-hide="tablet"><?php echo 'Acrónimo';?></th>
                                                                    <th data-hide="tablet"><?php echo 'Dt.Nascimento';?></th>
                                                                    <th data-hide="tablet"><?php echo 'Género';?></th>
                                                                </tr>                                                                
							</thead>
<?php
    $db = new \Oracle\Db("Colaboradores", "PTE");
    $sql = "SELECT RHID,NOME,NOME_REDZ,ACRONIMO,DT_NASCIMENTO,SEXO FROM RH_IDENTIFICACOES ORDER BY 1";
    $res = $db->execFetchAll($sql, "Colaboradores");
    foreach ($res as $row) {
            echo "<tr>";
            echo "<td>".$row['RHID']."</td>";
            echo "<td>".$row['NOME']."</td>";
            echo "<td>".$row['NOME_REDZ']."</td>";
            echo "<td>".$row['ACRONIMO']."</td>";
            echo "<td>".$row['DT_NASCIMENTO']."</td>";
            echo "<td>".$row['SEXO']."</td>";
            echo "</tr>";
    }
    
    
?>
                                                        
						</table>
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->
		
	</div>

	<!-- end row -->

	<!-- row -->

	<div class="row">

		<!-- a blank row to get started -->
		<div class="col-sm-12">
			<!-- your contents here -->
		</div>
			
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
	
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 * TO LOAD A SCRIPT:
	 * var pagefunction = function (){ 
	 *  loadScript(".../plugin.js", run_after_loaded);	
	 * }
	 * 
	 * OR you can load chain scripts by doing
	 * 
	 * loadScript(".../plugin.js", function(){
	 * 	 loadScript("../plugin.js", function(){
	 * 	   ...
	 *   })
	 * });
	 */
	
	// pagefunction
	
	var pagefunction = function() {
		// clears the variable if left blank
	};
	
	// end pagefunction
	
	// run pagefunction
	var pagefunction = function() {

                $('#colabs').dataTable({
                    "language": {
                            "url": "<?php echo $ui_datatable_lang_url;?>",
                    },
                    "scrollY":          "250px",
                    "scrollCollapse":   true,
                    "paging":           false,
                    "processing":       true,
  //                  "serverSide":       true,
 //                   "ajax": "data-source/oracle_controller.php",
/*                    "columns": [
                        {
                            "targets": 0,
                            "title": 'CD_ARTIGO', //column title
                            "label": 'CD_ARTIGO', // editor label
                            "data": 'CD_ARTIGO',  //db field name
                            "name": 'CD_ARTIGO',  // editor db field name
                            //"width": "5%",
                            "visible": true,
                            //type: 'hidden',
                            //attr: {
                            //    "name": 'rhid', //editor for validation purposes
                            //},
                        },
                        {
                            "targets": 1,
                            "title": 'DSP_ARTIGO', //column title
                            "label": 'DSP_ARTIGO', // editor label
                            "data": 'DSP_ARTIGO',  //db field name
                            "name": 'DSP_ARTIGO',  // editor db field name
                            //"width": "5%",
                            "visible": true,
                            //type: 'hidden',
                            //attr: {
                            //    "name": 'rhid', //editor for validation purposes
                            //},
                        },
                        {
                            "targets": 2,
                            "title": 'DT_INI_ARTG', //column title
                            "label": 'DT_INI_ARTG', // editor label
                            "data": 'DT_INI_ARTG',  //db field name
                            "name": 'DT_INI_ARTG',  // editor db field name
                            //"width": "5%",
                            "visible": true,
                            //type: 'hidden',
                            //attr: {
                            //    "name": 'rhid', //editor for validation purposes
                            //},
                        },
                        {
                            "targets": 3,
                            "title": 'DT_FIM', //column title
                            "data": 'DT_FIM',  //db field name
                            "label": 'DT_FIM', // editor label
                            "name": 'DT_FIM',  // editor db field name
                            //"width": "5%",
                            "visible": true,
                            //type: 'hidden',
                            //attr: {
                            //    "name": 'rhid', //editor for validation purposes
                            //},
                        },
                        {
                            "targets": 4,
                            "title": 'DESCRICAO', //column title
                            "label": 'DESCRICAO', // editor label
                            "data": 'DESCRICAO',  //db field name
                            "name": 'DESCRICAO',  // editor db field name
                            //"width": "5%",
                            "visible": true,
                            //type: 'hidden',
                            //attr: {
                            //    "name": 'rhid', //editor for validation purposes
                            //},
                        }                    
                    ]*/
        
                });

        }
	// load related plugins
	
	loadScript("js/plugin/datatables/jquery.dataTables.min.js", function(){
		loadScript("js/plugin/datatables/dataTables.colVis.min.js", function(){
			loadScript("js/plugin/datatables/dataTables.tableTools.min.js", function(){
				loadScript("js/plugin/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});

</script>
