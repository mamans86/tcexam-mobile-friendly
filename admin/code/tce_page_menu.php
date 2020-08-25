<?php
//============================================================+
// File name   : tce_page_menu.php
// Begin       : 2004-04-20
// Last Update : 2013-07-04
//
// Description : Output XHTML unordered list menu.
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
//    Copyright (C) 2004-2012 Nicola Asuni - Tecnick.com LTD
//    See LICENSE.TXT file for more information.
//============================================================+

/**
 * @file
 * Output XHTML unordered list menu.
 * @package com.tecnick.tcexam.admin
 * @author Nicola Asuni
 * @since 2004-04-20
 */

/**
 */

require_once('../config/tce_auth.php');
require_once('../../shared/code/tce_functions_menu.php');

$menu = array(
    'index.php' => array('link' => 'index.php', 'title' => $l['h_index'], 'name' => "<i class='fas fa-home'></i> ".$l['w_index'], 'level' => K_AUTH_INDEX, 'key' => '', 'enabled' => true),
    'tce_menu_users.php' => array('link' => '#parent', 'title' => $l['w_users'], 'name' => "<i class='fas fa-users'></i> ".$l['w_users']." <i class='fas fa-chevron-circle-down li-parent'></i>", 'level' => K_AUTH_ADMIN_USERS, 'key' => '', 'enabled' => true),
    'tce_menu_modules.php' => array('link' => '#parent', 'title' => $l['w_modules'], 'name' => "<i class='fas fa-book'></i> ".$l['w_modules']." <i class='fas fa-chevron-circle-down li-parent'></i>", 'level' => K_AUTH_ADMIN_MODULES, 'key' => '', 'enabled' => true),
    'tce_menu_tests.php' => array('link' => '#parent', 'title' => $l['w_tests'], 'name' => "<i class='fas fa-spell-check'></i> ".$l['w_tests']." <i class='fas fa-chevron-circle-down li-parent'></i>", 'level' => K_AUTH_ADMIN_TESTS, 'key' => '', 'enabled' => true),
    'tce_edit_backup.php' => array('link' => 'tce_edit_backup.php', 'title' => $l['t_backup_editor'], 'name' => "<i class='fas fa-luggage-cart'></i> ".$l['w_backup'], 'level' => K_AUTH_BACKUP, 'key' => '', 'enabled' => ((K_DATABASE_TYPE == 'MYSQL') or (K_DATABASE_TYPE == 'POSTGRESQL'))),
    'public' => array('link' => '../../public/code/index.php', 'title' => $l['h_public_link'], 'name' => "<i class='fab fa-safari'></i> ".$l['w_public'], 'level' => 0, 'key' => '', 'enabled' => true),
    'tcexam.org' => array('link' => 'http://www.tcexam.org', 'title' => $l['h_guide'], 'name' => "<i class='fas fa-hands-helping'></i> ".$l['w_guide'], 'level' => K_AUTH_ADMIN_INFO, 'key' => '', 'enabled' => true),
    'tce_page_info.php' => array('link' => 'tce_page_info.php', 'title' => $l['h_info'], 'name' => "<i class='fas fa-info-circle'></i> ".$l['w_info'], 'level' => K_AUTH_ADMIN_INFO, 'key' => '', 'enabled' => true),
    'tce_logout.php' => array('link' => 'tce_logout.php', 'title' => $l['h_logout_link'], 'name' => "<i class='fas fa-sign-out-alt'></i> ".$l['w_logout'], 'level' => 1, 'key' => '', 'enabled' => ($_SESSION['session_user_level'] > 0)),
    'tce_login.php' => array('link' => 'tce_login.php', 'title' => $l['h_login_button'], 'name' => "<i class='fas fa-sign-in-alt'></i> ".$l['w_login'], 'level' => 0, 'key' => '', 'enabled' => ($_SESSION['session_user_level'] < 1))
);

$menu['tce_menu_users.php']['sub'] = array(
    'tce_edit_user.php' => array('link' => 'tce_edit_user.php', 'title' => $l['t_user_editor'], 'name' => "<i class='fas fa-user-cog'></i> ".$l['w_users'], 'level' => K_AUTH_ADMIN_USERS, 'key' => '', 'enabled' => true),
    'tce_edit_group.php' => array('link' => 'tce_edit_group.php', 'title' => $l['t_group_editor'], 'name' => "<i class='fas fa-users-cog'></i> ".$l['w_groups'], 'level' => K_AUTH_ADMIN_USERS, 'key' => '', 'enabled' => true),
    'tce_select_users.php' => array('link' => 'tce_select_users.php', 'title' => $l['t_user_select'], 'name' => "<i class='fas fa-user-tag'></i> ".$l['w_select'], 'level' => K_AUTH_ADMIN_USERS, 'key' => '', 'enabled' => true),
    'tce_show_online_users.php' => array('link' => 'tce_show_online_users.php', 'title' => $l['t_online_users'], 'name' => "<i class='fas fa-signal'></i> ".$l['w_online'], 'level' => K_AUTH_ADMIN_USERS, 'key' => '', 'enabled' => true),
    'tce_import_users.php' => array('link' => 'tce_import_users.php', 'title' => $l['t_user_importer'], 'name' => "<i class='fas fa-people-arrows'></i> ".$l['w_import'], 'level' => K_AUTH_ADMIN_USERS, 'key' => '', 'enabled' => true)
);

$menu['tce_menu_modules.php']['sub'] = array(
    'tce_edit_module.php' => array('link' => 'tce_edit_module.php', 'title' => $l['t_modules_editor'], 'name' => "<i class='fas fa-book-reader'></i> ".$l['w_modules'], 'level' => K_AUTH_ADMIN_MODULES, 'key' => '', 'enabled' => true),
    'tce_edit_subject.php' => array('link' => 'tce_edit_subject.php', 'title' => $l['t_subjects_editor'], 'name' => "<i class='far fa-bookmark'></i> ".$l['w_subjects'], 'level' => K_AUTH_ADMIN_SUBJECTS, 'key' => '', 'enabled' => true),
    'tce_edit_question.php' => array('link' => 'tce_edit_question.php', 'title' => $l['t_questions_editor'], 'name' => "<i class='fas fa-question'></i> ".$l['w_questions'], 'level' => K_AUTH_ADMIN_QUESTIONS, 'key' => '', 'enabled' => true),
    'tce_edit_answer.php' => array('link' => 'tce_edit_answer.php', 'title' => $l['t_answers_editor'], 'name' => "<i class='fas fa-hat-wizard'></i> ".$l['w_answers'], 'level' => K_AUTH_ADMIN_ANSWERS, 'key' => '', 'enabled' => true),
    'tce_show_all_questions.php' => array('link' => 'tce_show_all_questions.php', 'title' => $l['t_questions_list'], 'name' => "<i class='fas fa-stream'></i> ".$l['w_list'], 'level' => K_AUTH_ADMIN_RESULTS, 'key' => '', 'enabled' => true),
    'tce_import_questions.php' => array('link' => 'tce_import_questions.php', 'title' => $l['t_question_importer'], 'name' => "<i class='fas fa-file-import'></i> ".$l['w_import'], 'level' => K_AUTH_ADMIN_IMPORT, 'key' => '', 'enabled' => true),
    'tce_filemanager.php' => array('link' => 'tce_filemanager.php', 'title' => $l['t_filemanager'], 'name' => "<i class='fas fa-folder'></i> ".$l['w_file_manager'], 'level' => K_AUTH_ADMIN_FILEMANAGER, 'key' => '', 'enabled' => true),
	'tmf_filebrowser.php' => array('link' => 'tmf_filebrowser.php', 'title' => 'File Browser', 'name' => "<i class='fas fa-folder-open'></i> File Browser", 'level' => K_AUTH_ADMIN_FILEMANAGER, 'key' => '', 'enabled' => true),
    'tce_edit_sslcerts.php' => array('link' => 'tce_edit_sslcerts.php', 'title' => $l['t_sslcerts'], 'name' => "<i class='fas fa-key'></i> ".$l['w_sslcerts'], 'level' => K_AUTH_ADMIN_SSLCERT, 'key' => '', 'enabled' => true)
);

$menu['tce_menu_tests.php']['sub'] = array(
    'tce_edit_test.php' => array('link' => 'tce_edit_test.php', 'title' => $l['t_tests_editor'], 'name' => "<i class='fas fa-calendar-plus'></i> ".$l['w_tests'], 'level' => K_AUTH_ADMIN_TESTS, 'key' => '', 'enabled' => true),
    'tce_select_tests.php' => array('link' => 'tce_select_tests.php', 'title' => $l['t_test_select'], 'name' => "<i class='fas fa-calendar-check'></i> ".$l['w_select'], 'level' => K_AUTH_ADMIN_TESTS, 'key' => '', 'enabled' => true),
    'tce_import_omr_answers.php' => array('link' => 'tce_import_omr_answers.php', 'title' => $l['t_omr_answers_importer'], 'name' => "<i class='fas fa-align-center'></i> ".$l['w_import_omr_answers'], 'level' => K_AUTH_ADMIN_OMR_IMPORT, 'key' => '', 'enabled' => true),
    'tce_import_omr_bulk.php' => array('link' => 'tce_import_omr_bulk.php', 'title' => $l['t_omr_bulk_importer'], 'name' => "<i class='fas fa-mail-bulk'></i> ".$l['t_omr_bulk_importer'], 'level' => K_AUTH_ADMIN_OMR_IMPORT, 'key' => '', 'enabled' => true),
    'tce_edit_rating.php' => array('link' => 'tce_edit_rating.php', 'title' => $l['t_rating_editor'], 'name' => "<i class='far fa-edit'></i> ".$l['w_rating'], 'level' => K_AUTH_ADMIN_RATING, 'key' => '', 'enabled' => true),
    'tce_show_result_allusers.php' => array('link' => 'tce_show_result_allusers.php', 'title' => $l['t_result_all_users'], 'name' => "<i class='fas fa-paste'></i> ".$l['w_results'], 'level' => K_AUTH_ADMIN_RESULTS, 'key' => '', 'enabled' => true),
    'tce_show_result_user.php' => array('link' => 'tce_show_result_user.php', 'title' => $l['t_result_user'], 'name' => "<i class='fas fa-user-graduate'></i> ".$l['w_users'], 'level' => K_AUTH_ADMIN_RESULTS, 'key' => '', 'enabled' => true)
);

echo '<a name="menusection" id="menusection"></a>'.K_NEWLINE;

// link to skip navigation
echo '<div class="hidden">';
echo '<a href="#topofdoc" accesskey="2" title="[2] '.$l['w_skip_navigation'].'">'.$l['w_skip_navigation'].'</a>';
echo '</div>'.K_NEWLINE;

echo '<ul class="menu">'.K_NEWLINE;
foreach ($menu as $link => $data) {
    echo F_menu_link($link, $data, 0);
}
echo '</ul>'.K_NEWLINE; // end of menu

//============================================================+
// END OF FILE
//============================================================+
