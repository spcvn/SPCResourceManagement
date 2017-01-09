<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot password email</title>
</head>
<body>
<b>Dear <?=$user?>!</b>
<p>this is forgot password email!<br/>
please visit below <a href="<?=$link.$token?>">link</a>  to type new password.<br/>
<a href="<?=$link.$token?>"><?=$link.$token?></a><br/>
thanks.</p>
</body>
</html>

