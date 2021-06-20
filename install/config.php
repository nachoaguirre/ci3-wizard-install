<?php
	/**********
	 * Main installer settings
	 *
	 */	
	$config["app_name"]       = "Mi APP";
	$config["app_url"]        = "https://myci3.app";
	$config["redirect_url_on_finish"] = 'auth/login';
	$config["php_min_version_str"] = '5.6+';
	$config["php_min_version_int"] = '50600';

	/**********
	 * config.php values
	 *
	 */	
	$config["time_reference"] = "local";

	/**********
	 * Frontend settings
	 *
	 */		
	$config["head_title"]     = "MI APP";
	$config["head_subtitle"]  = "ASISTENTE DE INSTALACIÓN";
	
	/**********
	 * Create admin user settings
	 *
	 */	
	$config["create_admin"]                = true;
	$config["create_admin_table"]          = 'users';
	$config["create_admin_ask_email"]      = true;
	$config["create_admin_email_field"]    = 'email';
	$config["create_admin_ask_password"]   = true;
	$config["create_admin_password_field"] = 'password';
	$config["create_admin_password_hash"]  = 'bcrypt';
	
	
	
	
	/**********
	 * l18m
	 *
	 */		
	$config["lang_head_title"]            = "Instalación";
	$config["lang_wizard_step"]           = "Paso";
	$config["lang_wizard_label_finish"]   = "Instalar";
	$config["lang_wizard_label_next"]     = "Siguiente";
	$config["lang_wizard_label_previous"] = "Anterior";
	$config["lang_wizard_label_loading"]  = "Cargando...";

	$config["lang_wizard_step1_title"]       = "Requerimientos";
	$config["lang_wizard_step1_pre_info"]    = "Verifica que cumples todos los requisitos antes de continuar.";
	$config["lang_wizard_step1_post_error"]  = "Soluciona los errores para continuar con la instalación.";
	$config["lang_wizard_step1_thead1"]      = "Item";
	$config["lang_wizard_step1_thead2"]      = "Requerido";
	$config["lang_wizard_step1_thead3"]      = "Actual";
	$config["lang_wizard_step1_tbody1_item"] = "Actual";
	$config["lang_wizard_step1_tbody2_item"] = "Escribir archivo configuración";
	$config["lang_wizard_step1_tbody3_item"] = "Escribir archivo BDD";
	$config["lang_wizard_step1_tbody4_item"] = "Ruta a archivos temporales";
	$config["lang_wizard_step1_tbody5_item"] = "Escribir archivos temporales";

	$config["lang_wizard_step2_title"]              = "Configuración de la base de datos";
	$config["lang_wizard_step2_pre_info"]           = "A continuación debes ingresar los datos de conexión con tu base de datos. Si no los conoces, contacta a tu proveedor de hosting";
	$config["lang_wizard_step2_label_host"]         = "Host Base de Datos";
	$config["lang_wizard_step2_label_user"]         = "Usuario";
	$config["lang_wizard_step2_label_pass"]         = "Clave";
	$config["lang_wizard_step2_label_dbname"]       = "Nombre Base de Datos";
	$config["lang_wizard_step2_placeholder_host"]   = "Host Base de Datos";
	$config["lang_wizard_step2_placeholder_user"]   = "Usuario Base de Datos";
	$config["lang_wizard_step2_placeholder_pass"]   = "Clave del usuario";
	$config["lang_wizard_step2_placeholder_dbname"] = "Nombre de la Base de Datos";
	$config["lang_wizard_step2_req_host"]           = "Ingresa el host del servidor MySQL";
	$config["lang_wizard_step2_req_user"]           = "Ingresa el usuario MySQL";
	$config["lang_wizard_step2_req_dbname"]         = "Ingresa el nombre de la base de datos MySQL";
	
	$config["lang_modal_step2_testing_title"]     = "Probando conexión";
	$config["lang_modal_step2_testing_body"]      = "Espera un momento";
	$config["lang_modal_step2_connect_title"]     = "Conexión Satisfactoria";
	$config["lang_modal_step2_connect_body"]      = "Continuemos...";
	$config["lang_modal_step2_connect_err_title"] = "Error al conectar";
	$config["lang_modal_step2_connect_err_body"]  = "Revisa los datos de conexión para continuar...";

	$config["lang_wizard_step3_title"]     = "URL del sitio";
	$config["lang_wizard_step3_pre_info"]  = "La URL base del sitio";
	$config["lang_wizard_step3_post_info"] = "Detectamos la URL de forma automática. Probablemente no sea necesario que cambies este valor.";

	$config["lang_wizard_step4_title"]             = "Usuario Administrador";
	$config["lang_wizard_step4_label_email"]       = "Email Administrador";
	$config["lang_wizard_step4_label_pass"]        = "Clave Administrador";
	$config["lang_wizard_step4_placeholder_email"] = "Email del Administrador";
	$config["lang_wizard_step4_placeholder_pass"]  = "Clave para el Administrador";
	$config["lang_wizard_step4_req_email"]         = "Ingresa el email del administrador";
	$config["lang_wizard_step4_req_pass"]          = "Ingresa la clave del administrador";
	
	$config["lang_modal_submit_title"] = "Instalando la aplicación";
	$config["lang_modal_submit_body"] = "Aguarda un momento....";
	$config["lang_modal_submit_finish_title"] = "Instalación Completada";
	$config["lang_modal_submit_finish_body"] = "La aplicación está lista para ser usada. Ahora serás redireccionado a la aplicación. Gracias por tu tiempo.";
	