<?php

/**
 * TarkvaraTehas [CMS]
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright (c) 2007, Vladimir Kjahrenov
 * @license			http://www.opensource.org/licenses/mit-license.php
 * 
 */
 
?>

<div id="ctr" align="center">
<div class="login">
	<div class="login-form">
                <h1 class="loginTitle">Login</h1>  
                <?php echo CHtml::errorSummary($user); ?>
                
              	<?php echo CHtml::form(); ?>
                <div class="form-block">
                    <div class="inputlabel"><?php echo CHtml::activeLabel($user,'username'); ?></div>
                    <div><?php echo CHtml::activeTextField($user,'username') ?></div>
                    <div class="inputlabel"><?php echo CHtml::activeLabel($user,'password'); ?></div>
                    <div><?php echo CHtml::activePasswordField($user,'password') ?></div>
                    
                    <div align="right">
                        <?php echo CHtml::activeCheckBox($user,'rememberMe'); ?> Remember me next time<br/>
						<?php echo CHtml::submitButton('Login'); ?>
					</div>
					<div>
					<?php echo CHtml::link('Lost your username?', array('user/recover')); ?>
					<br />
					<?php echo CHtml::link('Regiter', array('user/create')); ?>
					</div>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>

            <div class="login-text">
                <p><?php //e($html->image("security.png", array("alt" => "Login"))); ?></p>
                <p>Welcome to TarkvaraTehas!</p>
                <p>Use a valid username and password to gain access to the Administration Console.</p>
            </div>
            <div class="clr"></div>
	</div>
</div>

<div align="center" class="CopyrightFooter"><span class="copyright">&nbsp;All rights reserved &copy; 2003 - <?php echo date("Y"); ?> <a href="http://www.tarkvaratehas.ee/" target="_blank">TarkvaraTehas</a> </span></div>