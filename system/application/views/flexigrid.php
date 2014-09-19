<html>
	<head>
		<title>Flexigrid dan Codeigniter</title>
		<link href="<?=$this->config->item('base_url');?>css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?=$this->config->item('base_url');?>css/flexigrid.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="<?=$this->config->item('base_url');?>js/jquery.pack.js"></script>
		<script type="text/javascript" src="<?=$this->config->item('base_url');?>js/flexigrid.pack.js"></script>
	</head>
	
	<body>
		<h2>Flexigrid dan Codeigniter</h2>
		<?php
		echo $js_grid;
		?>
		<script type="text/javascript">
		
		function test(com,grid) {
									if(com=='Select All') {
									$('.bDiv tbody tr',grid).addClass('trSelected');
									}
									
									if(com=='DeSelect All') {
										$('.bDiv tbody tr',grid).removeClass('trSelected');
										}
									
									if(com == 'Delete') {
										if('.trSelected',grid).length>0{
										 if(confirm('Delete ' + $('.trSelected',grid).length +' item?')){
										 var items = $('.trSelected',grid);
										 var items = '';
										 for(i=0;i<items.length;i++){
											itemlist+= items[i].id.substr(3)+",";
											}
											$.ajax({
													type: "POST",
													url: "<?=site_url("/ajax/deletec");?>"
													data: "items="+itemlist,
													success: function(data){
														$('#flex1').flexReload();
															alert(data);
														}
														});
								}
						}
						else{
							return false;
						}
					}
				}
	</script>
	<table id="flex1" style="display:none"></table>
	</body>
</html>