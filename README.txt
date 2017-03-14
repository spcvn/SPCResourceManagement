==================================================
SPC-VN GUIDE - by Unotrung
version 1.1 | 3/2017
==================================================
Module : 
	- Update permission for user
	- Fixed theme ACEadmin
	- Fixed error old version
Install v1.1
	Update file app.php : 
		replace this code to /config/app.php
		______________________________________________________________________________________
		
			'Security' => [
		        'salt' => env('SECURITY_SALT', '96feb054e1f4b1fb400ce2fb63908f8652e07b18d139e603a1b9051e443d139a'),
		        'password' => env('PASS_SALT', 'qOPNjKLaPIVWTcjdlPOMSOINzVvXQyAYtdDuBfpz'),
	    	],
	    ______________________________________________________________________________________

	run composer : 
		composer update
	run migration : 
		cake migrations migrate
	run seed :
		cake migrations seed --seed TblMasterDepartmentsSeed
		cake migrations seed --seed TblMasterUsersSeed



==================================================
SPC-VN GUIDE - by Unotrung
version 1/2017
==================================================
Install app
	run migration : 
		cake migrations migrate
	run seed :
		cake migrations seed



