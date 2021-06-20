# ci3-wizard-install
 Wizard installer for codeigniter 3 webapps

An installer for applications that need to be distributed with Codeigniter 3.

You will be able to help users who download your project developed with CI3, to carry out the initial basic configuration of Codeigniter 3.

The script takes care of:
- Request the connection data to the database
- Test the connection to the database
- Save the data in the database.php file
- Define base_url in config.php
- Import a .sql file to the database
- Optionally allows adding an administrator user to a table defined in the script configuration, requesting the user to enter an email and password.
