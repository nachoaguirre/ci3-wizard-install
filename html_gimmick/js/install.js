var form = $("#wizard");
var dbdata = false;
form.steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "none",
    enablePagination: true,
    onStepChanging: function (event, currentIndex, newIndex) {
        form.validate({errorPlacement: function(error, element) { error.insertBefore(element); }, ignore: ":disabled,:hidden" })

        if(currentIndex == 1 && form.valid()){
	        if(dbdata == true){ return true; }	        
			Swal.fire({
				title: 'Testing Connection', 
				html: 'Hang on a minute', 
				timer: 5000, 
				timerProgressBar: true, 
				didOpen: () => { Swal.showLoading() },	
			})
			setTimeout(function(){ 
                Swal.close(); 
                Swal.fire('Connected to Database!', "Let's continue...",'success').then((result) => {
					if (result.isConfirmed) { dbdata = true; form.steps("next"); } 
				});
            }, 3000);
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
    labels: {finish: "Install", next: "Next", previous: "Previous", loading: "Loading"}
});
	
	
	
function doInstall() {

	Swal.fire({
		title: 'Installing the app', 
		html: 'Hang on a minute', 
		timer: 4000, 
		timerProgressBar: true, 
		didOpen: () => { Swal.showLoading() },	
	})
	setTimeout(function(){ 
        Swal.close(); 
        Swal.fire(
        	'Installation Completed', 
        	'The application is ready to be used. Now you will be redirected to the application. Thanks for your time.',
        	'success'
        ).then((result) => {
			if (result.isConfirmed) { window.location.href = "https://github.com/nachoaguirre/ci3-wizard-install"; } 
		});
    }, 4000);
}