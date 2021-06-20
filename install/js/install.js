var form = $("#wizard");
var dbdata = false;
form.steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "none",
    enablePagination: js_enablePagination,
    onStepChanging: function (event, currentIndex, newIndex) {
        form.validate({errorPlacement: function(error, element) { error.insertBefore(element); }, ignore: ":disabled,:hidden" })

        if(currentIndex == 1 && form.valid()){
	        if(dbdata == true){ return true; }
	        var dbhost = $("#dbhost").val();
			var dbuser = $("#dbuser").val();
			var dbpass = $("#dbpass").val();
			var dbname = $("#dbname").val();
	        $.ajax({
	            type: "post",
	            url: "includes/testConnection.php",
	            data: { hostname: dbhost, username: dbuser, password: dbpass, database: dbname },
	            success: function (resp) {
	                if (resp == 'ok') {
	                    setTimeout(function(){ 
		                    Swal.close(); 
		                    Swal.fire(js_lang["step2_modal_connect_title"], js_lang["step2_modal_connect_body"],'success').then((result) => {
								if (result.isConfirmed) { dbdata = true; form.steps("next"); } 
							});
		                }, 3000);
	                } else {
	                    console.log(resp);
	                    setTimeout(function(){ 
		                    Swal.close(); 
		                    Swal.fire(js_lang["step2_modal_connect_err_title"], js_lang["step2_modal_connect_err_body"],'error');
		                }, 2000);
	                }
	            }
	        });
			Swal.fire({
				title: js_lang["step2_modal_testing_title"], 
				html: js_lang["step2_modal_testing_body"], 
				timer: 20000, 
				timerProgressBar: true, 
				didOpen: () => { Swal.showLoading() },	
			})
        } 
		else { return form.valid(); }        
    },
    onFinishing: function (event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex) {
        //alert("Submitted!");
        doInstall();
    },
    labels: {finish: js_lang["wizard_finish"], next: js_lang["wizard_next"], previous: js_lang["wizard_previous"], loading: js_lang["wizard_loading"]}
});
	
	
	
function doInstall() {

    var base_url = $("#base_url").val();

    var dbhost = $("#dbhost").val();
    var dbuser = $("#dbuser").val();
    var dbpass = $("#dbpass").val();
    var dbname = $("#dbname").val();

    var admin_email = $("#admin_email").val();
    var admin_pass = $("#admin_pass").val();


	
    $.ajax({
        type: "post",
        url: "includes/install.php",
        data: {
            url: base_url,
            hostname: dbhost,
            username: dbuser,
            password: dbpass,
            database: dbname,
            admin_email: admin_email,
            admin_pass: admin_pass,
            admin_table: db_admin_table,
            app_name: config_app_name,
            time_reference: config_time_reference, 
        },
        success: function (resp) {
            if (resp == 'ok') {
            	setTimeout(function(){ 
                    Swal.close(); 
                    Swal.fire(js_lang["submit_modal_finish_title"], js_lang["submit_modal_finish_body"],'success').then((result) => {
						if (result.isConfirmed) { window.location.href = base_url+redirect_url; } 
					});
                }, 3000);
            } else {
            	Swal.close(); 
				Swal.fire("Error", resp, 'error');
            }            
        }
    });
	Swal.fire({
		title: js_lang["submit_modal_title"], 
		html: js_lang["submit_modal_body"], 
		timer: 20000, 
		timerProgressBar: true, 
		didOpen: () => { Swal.showLoading() },	
	})
}