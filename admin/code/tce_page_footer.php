<?php
//============================================================+
// File name   : tce_page_footer.php
// Begin       : 2001-09-02
// Last Update : 2009-09-30
//
// Description : Outputs default XHTML page footer.
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
//    Copyright (C) 2004-2010  Nicola Asuni - Tecnick.com LTD
//    See LICENSE.TXT file for more information.
//============================================================+

/**
 * @file
 * output default XHTML page footer
 * @package com.tecnick.tcexam.admin
 * @author Nicola Asuni
 * @since 2001-09-02
 */

/**
 */

echo K_NEWLINE;
echo '</div>'.K_NEWLINE; //close div.content
echo '</div>'.K_NEWLINE; //close div.body
echo '</div>'.K_NEWLINE; //close div#menuBody

echo '<div id="footer">'.K_NEWLINE;
include('../../shared/code/tce_page_userbar.php'); // display user bar
echo '</div>'.K_NEWLINE;

echo '<!-- '.base64_decode(K_KEY_SECURITY).' -->'.K_NEWLINE;
echo '<script src="'.K_PATH_HOST.K_PATH_TCEXAM.'shared/jscripts/vendor/modernizr-3.11.2.min.js"></script>'.K_NEWLINE;
// echo '<script src="'.K_PATH_HOST.K_PATH_TCEXAM.'shared/jscripts/plugins.js"></script>'.K_NEWLINE;
echo '<script src="'.K_PATH_HOST.K_PATH_TCEXAM.'admin/jscripts/main.js"></script>'.K_NEWLINE;
echo '</body>'.K_NEWLINE;
echo '</html>';

//============================================================+
// END OF FILE
//============================================================+
