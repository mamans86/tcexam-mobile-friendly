<?php
//============================================================+
// File name   : tce_page_header.php
// Begin       : 2001-09-18
// Last Update : 2010-05-10
//
// Description : output default XHTML page header
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
 * Outputs default XHTML page header.
 * @package com.tecnick.tcexam.admin
 * @author Nicola Asuni
 * @since 2001-09-18
 */

/**
 */

require_once('tce_xhtml_header.php');

// display header (image logo + timer)
echo '<div class="header">'.K_NEWLINE;
echo '<div class="left"></div>'.K_NEWLINE;
echo '<div class="right">'.K_NEWLINE;
echo '<a name="timersection" id="timersection"></a>'.K_NEWLINE;
include('../../shared/code/tce_page_timer.php');
echo '</div>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;

// display menu
echo '<div id="menuBody">'.K_NEWLINE;
echo '<div id="scrollayer" class="scrollmenu">'.K_NEWLINE;
if($_SESSION['session_user_level']>0){
echo '<div id="menuContent">'.K_NEWLINE;
echo '<p id="logoIMG"><img width="77px" height="77px" src="'.K_PATH_HOST.K_PATH_TCEXAM.'cache/logo/'.K_INSTITUTION_LOGO.'" /></p>'.K_NEWLINE;
echo '<p id="appDesc">'.K_APP_DESC.'</p>'.K_NEWLINE;
echo '<p id="insName">'.K_INSTITUTION_NAME.'</p>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;
}

// CSS changes for old browsers
echo '<!--[if lte IE 7]>'.K_NEWLINE;
echo '<style type="text/css">'.K_NEWLINE;
echo 'ul.menu li {text-align:left;behavior:url("../../shared/jscripts/IEmen.htc");}'.K_NEWLINE;
echo 'ul.menu ul {background-color:#003399;margin:0;padding:0;display:none;position:absolute;top:20px;left:0px;}'.K_NEWLINE;
echo 'ul.menu ul li {width:200px;text-align:left;margin:0;}'.K_NEWLINE;
echo 'ul.menu ul ul {display:none;position:absolute;top:0px;left:190px;}'.K_NEWLINE;
echo '</style>'.K_NEWLINE;
echo '<![endif]-->'.K_NEWLINE;
require_once(dirname(__FILE__).'/tce_page_menu.php');
echo '</div>'.K_NEWLINE;

echo '<div class="body">'.K_NEWLINE;

echo '<div class="content">'.K_NEWLINE;
echo '<a name="topofdoc" id="topofdoc"></a>'.K_NEWLINE;
echo '<div class="h-title d-iflex">'.K_NEWLINE;
echo '<span id="mmCloseBtn"><i class="fas fa-bars"></i></span><h1>'.htmlspecialchars($thispage_title, ENT_NOQUOTES, $l['a_meta_charset']).'</h1>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;

//============================================================+
// END OF FILE
//============================================================+
