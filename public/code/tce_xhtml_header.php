<?php
//============================================================+
// File name   : tce_xhtml_header.php
// Begin       : 2004-04-24
// Last Update : 2013-01-29
//
// Description : Output defaults XHTML header (doctype + head).
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
//    Copyright (C) 2004-2013  Nicola Asuni - Tecnick.com LTD
//    See LICENSE.TXT file for more information.
//============================================================+

/**
 * @file
 * Outputs default XHTML header (doctype + head).
 * @package com.tecnick.tcexam.public
 * @author Nicola Asuni
 * @since 2004-04-24
 * int $pagelevel page access level (0-10), default 0
 * string $thispage_title page title, default K_SITE_TITLE
 * string $thispage_description page description, default K_SITE_DESCRIPTION
 * string $thispage_author page author, default K_SITE_AUTHOR
 * string $thispage_reply page reply to, default K_SITE_REPLY_TO
 * string $thispage_keywords page keywords, default K_SITE_KEYWORDS
 * string $thispage_icon page icon, default K_SITE_ICON
 * string $thispage_style page CSS file name, default K_SITE_STYLE
 */

/**
 */

// if necessary load default values
if (!isset($pagelevel) or empty($pagelevel)) {
    $pagelevel = 0;
}
if (!isset($thispage_title) or empty($thispage_title)) {
    $thispage_title = K_SITE_TITLE;
}
if (!isset($thispage_description) or empty($thispage_description)) {
    $thispage_description = K_SITE_DESCRIPTION;
}
if (!isset($thispage_author) or empty($thispage_author)) {
    $thispage_author = K_SITE_AUTHOR;
}
if (!isset($thispage_reply) or empty($thispage_reply)) {
    $thispage_reply = K_SITE_REPLY;
}
if (!isset($thispage_keywords) or empty($thispage_keywords)) {
    $thispage_keywords = K_SITE_KEYWORDS;
}
if (!isset($thispage_icon) or empty($thispage_icon)) {
    $thispage_icon = K_SITE_ICON;
}
if (!isset($thispage_style) or empty($thispage_style)) {
    if (strcasecmp($l['a_meta_dir'], 'rtl') == 0) {
        $thispage_style = K_SITE_STYLE_RTL;
    } else {
        $thispage_style = K_SITE_STYLE;
    }
}
?>
<!doctype html>
<html class="no-js" lang="<?php echo $l['a_meta_language']; ?>">

<head>
  <meta charset="<?php echo $l['a_meta_charset']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  echo '<title>'.htmlspecialchars($thispage_title, ENT_NOQUOTES, $l['a_meta_charset']).'</title>'.K_NEWLINE;
  //echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.$l['a_meta_language'].'" lang="'.$l['a_meta_language'].'" dir="'.$l['a_meta_dir'].'">'.K_NEWLINE;
  echo '<meta name="language" content="'.$l['a_meta_language'].'" />'.K_NEWLINE;
  echo '<meta name="tcexam_level" content="'.$pagelevel.'" />'.K_NEWLINE;
  echo '<meta name="description" content="'."\x5b\x54\x43\x45\x78\x61\x6d\x5d".' '.htmlspecialchars($thispage_description, ENT_COMPAT, $l['a_meta_charset']).' ['.base64_decode(K_KEY_SECURITY).']" />'.K_NEWLINE;
  echo '<meta name="author" content="nick"/>'.K_NEWLINE;
  echo '<meta name="reply-to" content="'.htmlspecialchars($thispage_reply, ENT_COMPAT, $l['a_meta_charset']).'" />'.K_NEWLINE;
  echo '<meta name="keywords" content="'.htmlspecialchars($thispage_keywords, ENT_COMPAT, $l['a_meta_charset']).'" />'.K_NEWLINE;
  echo '<meta property="og:title" content="'.htmlspecialchars($thispage_title, ENT_NOQUOTES, $l['a_meta_charset']).'">'.K_NEWLINE;
  echo '<meta property="og:type" content="">'.K_NEWLINE;
  echo '<meta property="og:url" content="">'.K_NEWLINE;
  echo '<meta property="og:image" content="">'.K_NEWLINE;
  // calendar
  //$enable_calendar=true;
if (isset($enable_calendar) and $enable_calendar) {
    echo '<style type="text/css">@import url('.K_PATH_SHARED_JSCRIPTS.'jscalendar/calendar-blue.css);</style>'.K_NEWLINE;
    echo '<script type="text/javascript" src="'.K_PATH_SHARED_JSCRIPTS.'jscalendar/calendar.js"></script>'.K_NEWLINE;
    if (F_file_exists(''.K_PATH_SHARED_JSCRIPTS.'jscalendar/lang/calendar-'.$l['a_meta_language'].'.js')) {
        echo '<script type="text/javascript" src="'.K_PATH_SHARED_JSCRIPTS.'jscalendar/lang/calendar-'.$l['a_meta_language'].'.js"></script>'.K_NEWLINE;
    } else {
        echo '<script type="text/javascript" src="'.K_PATH_SHARED_JSCRIPTS.'jscalendar/lang/calendar-en.js"></script>'.K_NEWLINE;
    }
    echo '<script type="text/javascript" src="'.K_PATH_SHARED_JSCRIPTS.'jscalendar/calendar-setup.js"></script>'.K_NEWLINE;
}
echo '<!-- '.'T'.'C'.'E'.'x'.'a'.'m'.'19'.'73'.'01'.'04'.' -->'.K_NEWLINE;

  ?>
  <link rel="manifest" href="<?php echo K_PATH_HOST.K_PATH_TCEXAM; ?>site.webmanifest">
  <link rel="apple-touch-icon" href="<?php echo K_PATH_HOST.K_PATH_TCEXAM; ?>icon.png">
  <!-- Place favicon.ico in the root directory -->
  <?php
  echo '<link rel="shortcut icon" href="'.$thispage_icon.'" />'.K_NEWLINE;
  ?>
  <link rel="stylesheet" href="<?php echo K_PATH_HOST.K_PATH_TCEXAM.'public/styles/normalize.css'; ?>">
  <link rel="stylesheet" href="<?php echo K_PATH_HOST.K_PATH_TCEXAM.'public/styles/main.css'; ?>">
  <link rel="stylesheet" href="<?php echo $thispage_style; ?>">
  <link rel="stylesheet" href="<?php echo K_PATH_HOST.K_PATH_TCEXAM; ?>public/styles/fontawesome/css/all.min.css" type="text/css" />
  <meta name="theme-color" content="#fafafa">
</head>
<?php
echo '<body>'.K_NEWLINE;

global $login_error;
if (isset($login_error) and $login_error) {
    F_print_error('WARNING', $l['m_login_wrong']);
}

//============================================================+
// END OF FILE
//============================================================+
