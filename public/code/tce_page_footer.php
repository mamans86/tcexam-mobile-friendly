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
 * Outputs default XHTML page footer.
 * @package com.tecnick.tcexam.public
 * @author Nicola Asuni
 * @since 2001-09-02
 */

/**
 */

echo K_NEWLINE;
echo '</div>'.K_NEWLINE; //close div.body
echo '<div id="footer">'.K_NEWLINE;
include('../../shared/code/tce_page_userbar.php'); // display user bar
echo '</div>'.K_NEWLINE; //close div#footer
echo '<!-- '.base64_decode(K_KEY_SECURITY).' -->'.K_NEWLINE;

echo '<script src="'.K_PATH_SHARED_JSCRIPTS.'plugins.js"></script>'.K_NEWLINE;
//echo '<script src="'.K_PATH_SHARED_JSCRIPTS.'main.js"></script>'.K_NEWLINE;
echo '</body>'.K_NEWLINE;
echo '</html>';

//============================================================+
// END OF FILE
//============================================================+
