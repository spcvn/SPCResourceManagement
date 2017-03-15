
[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run
```bash
composer create-project --prefer-dist cakephp/app [app_name]
```

You should now be able to visit the path to where you installed the app and see the default home page.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.

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
