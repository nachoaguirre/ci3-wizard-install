<?php 
	require_once('config.php'); 
	require_once('includes/helpers.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $config["lang_head_title"]; ?> - <?php echo $config["app_name"]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;400;600;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
<div class="container">
	<div class="row justify-content-center">
	    <div class="col-sm-12 col-lg-6 panel"> 
	        
	        <div class="panel-head">
	            <h1><?php echo $config["head_title"]; ?></h1>
	            <span><?php echo $config["head_subtitle"]; ?></span>
	            <hr />
	        </div>	
	        	        
	        <div>
	            <form action="#" method="post" id="wizard">

	                <h3><strong><?php echo $config["lang_wizard_step"]; ?> 1:</strong> <?php echo $config["lang_wizard_step1_title"]; ?></h3>
	                <section>
		                <div class="alert alert-secondary d-flex align-items-center" role="alert">
			                <i class="fas fa-info-circle"></i>
							<div><?php echo $config["lang_wizard_step1_pre_info"]; ?></div>
						</div>
		                <div class="table-responsive">											
							<table class="table table-dark table-striped">
								<thead>
									<tr>
										<th scope="col"><?php echo $config["lang_wizard_step1_thead1"]; ?></th>
										<th scope="col"><?php echo $config["lang_wizard_step1_thead2"]; ?></th>
										<th scope="col"><?php echo $config["lang_wizard_step1_thead3"]; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="small"><?php echo $config["lang_wizard_step1_tbody1_item"]; ?></td>
										<td><?php echo $config["php_min_version_str"]; ?></td>
										<td><?php echo checkPHPVersion($config["php_min_version_int"]); ?></td>
									</tr>
									<tr>
										<td class="small"><?php echo $config["lang_wizard_step1_tbody2_item"]; ?></td>
										<td>TRUE</td>
										<td><?php echo (canWriteConfig()) ? "<span class='text-success'>TRUE</span>" : "<span class='text-danger'>FALSE</span>"; ?></td>
									</tr>
									<tr>
										<td class="small"><?php echo $config["lang_wizard_step1_tbody3_item"]; ?></td>
										<td>TRUE</td>
										<td><?php echo (canWriteDatabase()) ? "<span class='text-success'>TRUE</span>" : "<span class='text-danger'>FALSE</span>"; ?></td>
									</tr>
									<tr>
										<td class="small"><?php echo $config["lang_wizard_step1_tbody4_item"]; ?></td>
										<td></td>
										<td><?php echo tempPath(); ?></td>
									</tr>
									<tr>
										<td class="small"><?php echo $config["lang_wizard_step1_tbody5_item"]; ?></td>
										<td>TRUE</td>
										<td><?php echo ( canWriteTempPath() ) ? "<span class='text-success'>TRUE</span>" : "<span class='text-danger'>FALSE</span>"; ?></td>
									</tr>							    
								</tbody>
							</table> 
						</div>     
						<?php 
							$checkReqs = checkReqs($cumple);
							if($checkReqs["result"]){
								echo '<script> var js_enablePagination = true;</script>';
							} else {
								echo '
								<div class="alert alert-danger d-flex align-items-center" role="alert">
									<i class="fas fa-exclamation-circle"></i>
									<div>'.$config["lang_wizard_step1_post_error"].'</div>
								</div>';
								echo '<script> var js_enablePagination = false;</script>';
							}							
							?>               												
	                </section>
	                
	                
	                
	                <h3><?php echo $config["lang_wizard_step"]; ?> 2: <?php echo $config["lang_wizard_step2_title"]; ?></h3>
	                <section>
		                <div class="alert alert-secondary d-flex align-items-center" role="alert">
			                <i class="fas fa-info-circle"></i>
							<div><?php echo $config["lang_wizard_step2_pre_info"]; ?></div>
						</div>
		                <div>	
		                    <label><?php echo $config["lang_wizard_step2_label_host"]; ?></label>
							<input type="text" id="dbhost" name="dbhost" placeholder="<?php echo $config["lang_wizard_step2_placeholder_host"]; ?>" data-msg="<?php echo $config["lang_wizard_step2_req_host"]; ?>" value="localhost" required>
		                </div>
						<div>
		                    <label><?php echo $config["lang_wizard_step2_label_user"]; ?></label>
							<input type="text" id="dbuser" name="dbuser" placeholder="<?php echo $config["lang_wizard_step2_placeholder_user"]; ?>" data-msg="<?php echo $config["lang_wizard_step2_req_user"]; ?>" required>
						</div>
						<div>
		                    <label><?php echo $config["lang_wizard_step2_label_pass"]; ?></label>
							<input type="text" id="dbpass" name="dbpass" placeholder="<?php echo $config["lang_wizard_step2_placeholder_pass"]; ?>">
						</div>
						<div>
		                    <label><?php echo $config["lang_wizard_step2_label_dbname"]; ?></label>
							<input type="text" id="dbname" name="dbname" placeholder="<?php echo $config["lang_wizard_step2_placeholder_dbname"]; ?>" data-msg="<?php echo $config["lang_wizard_step2_req_dbname"]; ?>" required>	                    
						</div>
	                </section> 
	
	
	
	                <h3><?php echo $config["lang_wizard_step"]; ?> 3: <?php echo $config["lang_wizard_step3_title"]; ?></h3>
	                <section>
	                    <span class="text-white small"><?php echo $config["lang_wizard_step3_pre_info"]; ?></span>
	                    <input type="text" id="base_url" name="base_url" placeholder="Base URL" value="<?php echo $base_url; ?>" required>
	                    <div class="alert alert-secondary d-flex align-items-center" role="alert">
			                <i class="fas fa-info-circle"></i>
							<div><?php echo $config["lang_wizard_step3_post_info"]; ?></div>
						</div>						
	                </section>
	                
	                
					<?php if ($config["create_admin"]) { ?>
					<h3><?php echo $config["lang_wizard_step"]; ?> 4: <?php echo $config["lang_wizard_step4_title"]; ?></h3>
	                <section>
	                    <label><?php echo $config["lang_wizard_step4_label_email"]; ?></label>
	                    <input type="text" id="admin_email" name="admin_email" placeholder="<?php echo $config["lang_wizard_step4_placeholder_email"]; ?>" data-msg="<?php echo $config["lang_wizard_step4_req_email"]; ?>" required>
	
	                    <label><?php echo $config["lang_wizard_step4_label_pass"]; ?></label>
	                    <input type="password" id="admin_pass" name="admin_pass" placeholder="<?php echo $config["lang_wizard_step4_placeholder_pass"]; ?>" data-msg="<?php echo $config["lang_wizard_step4_req_pass"]; ?>" required>
	                </section>
	                <?php } ?>
		
	            </form>
	        </div>  
	        
	        <div>
		        <small class="d-block text-center text-light"><a href="<?php echo $config["app_url"]; ?>"><?php echo $config["app_name"]; ?></a></small>
	        </div>
	    </div>	
	</div>
</div>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
	const js_lang = {
		step2_modal_testing_title    : '<?php echo $config["lang_modal_step2_testing_title"]; ?>',
		step2_modal_testing_body     : '<?php echo $config["lang_modal_step2_testing_body"]; ?>',
		step2_modal_connect_title    : '<?php echo $config["lang_modal_step2_connect_title"]; ?>',
		step2_modal_connect_body     : '<?php echo $config["lang_modal_step2_connect_body"]; ?>',
		step2_modal_connect_err_title: '<?php echo $config["lang_modal_step2_connect_err_title"]; ?>',
		step2_modal_connect_err_body : '<?php echo $config["lang_modal_step2_connect_err_body"]; ?>',
		wizard_finish                : "<?php echo $config["lang_wizard_label_finish"]; ?>",
		wizard_next                  : "<?php echo $config["lang_wizard_label_next"]; ?>",
		wizard_previous              : "<?php echo $config["lang_wizard_label_previous"]; ?>",
		wizard_loading               : "<?php echo $config["lang_wizard_label_loading"]; ?>",
		submit_modal_title           : '<?php echo $config["lang_modal_submit_title"]; ?>',
		submit_modal_body            : '<?php echo $config["lang_modal_submit_body"]; ?>',
		submit_modal_finish_title    : '<?php echo $config["lang_modal_submit_finish_title"]; ?>',
		submit_modal_finish_body     : '<?php echo $config["lang_modal_submit_finish_body"]; ?>',
	}
	const redirect_url          = '<?php echo $config["redirect_url_on_finish"]; ?>';
	const db_admin_table        = '<?php echo $config["create_admin_table"]; ?>';
	const config_app_name       = '<?php echo $config["app_name"]; ?>';
	const config_time_reference = '<?php echo $config["time_reference"]; ?>';
</script>

<script src="js/install.js"></script>

</body>
</html>