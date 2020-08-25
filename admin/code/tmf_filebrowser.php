<?php
//============================================================+
// File name   : tce_filemanager.php
// Begin       : 2010-09-20
// Last Update : 2013-04-12
//
// Description : File manager for media files.
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//
// License:
//    Copyright (C) 2004-2013 Nicola Asuni - Tecnick.com LTD
//    See LICENSE.TXT file for more information.
//============================================================+

/**
 * @file
 * File manager for media files.
 * @package com.tecnick.tcexam.admin
 * @author Nicola Asuni
 * @since 2010-09-21
 */

/**
 */

require_once('../config/tce_config.php');

$pagelevel = K_AUTH_ADMIN_FILEMANAGER;
require_once('../../shared/code/tce_authorization.php');
require_once('../../shared/code/tce_functions_form.php');
require_once('../../shared/code/tce_functions_tcecode.php');
require_once('tce_functions_filemanager.php');

$thispage_title = 'File Browser';
require_once('../code/tce_page_header.php');

echo '<div class="container" style="padding:0">'.K_NEWLINE;

echo '<div class="contentbox">'.K_NEWLINE;

echo '<div>'.K_NEWLINE;
echo '<iframe style="width:100%;height:600px" frameborder=0 src="tmf_tinyfilemanager.php"></iframe>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;


echo '<div class="pagehelp">'.$l['hp_filemanager'].'</div>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;

require_once('../code/tce_page_footer.php');

//============================================================+
// END OF FILE
//============================================================+
