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

$pagelevel = K_AUTH_OPERATOR;
require_once('../../shared/code/tce_authorization.php');
require_once('../../shared/code/tce_functions_form.php');
require_once('../../shared/code/tce_functions_tcecode.php');
require_once('tce_functions_filemanager.php');

$thispage_title = 'MS Word to XML Converter';
require_once('../code/tce_page_header.php');

echo '<div class="container" style="padding:0">'.K_NEWLINE;

echo '<div class="contentbox">'.K_NEWLINE;

echo '<div class="tceformbox">'.K_NEWLINE;
echo '<fieldset style="text-align:left;background:#fff">'.K_NEWLINE;
?>
<h3>Langkah menggunakan konverter:</h3>
<ol>
<li>Download Format MS Word <a href="https://drive.google.com/file/d/1YB7m56snLBaDKy0dBEJ5JULBt9vKABRe/view">disini</a></li>
<li>Setelah didownload ubah sesuai dengan keinginan, perhatikan beberapa contoh soal. Ada tipe soal MCSA, MCMA, Isian singkat, Uraian Panjang, maupun Ordering</li>
<li>Setelah selesai, simpan soal</li>
<li>Buka Halaman Web Konverter <a href="https://pemdas.yayasan-gondang.com/word-to-tcexam-xml/admin/code/tmf_word_import.php" target="blank">disini</a></li>
<li>Login menggunakan akun yang dimiliki. Untuk request akun silakan hubungi Mr.Man <br/>WhatsApp: <a href="https://wa.me/628561575817">https://wa.me/628561575817</a><br/>Telegram: <a href="https://t.me/mamans86">@mamans86</a></li>
<li>Buka kembali soal yang telah Anda susun di Microsoft Word, tekan CTRL+A untuk menseleksi semua soal.</li>
<li>Tekan CTRL+C untuk menyalin/mengcopy semua soal.</li>
<li>Paste semua soal yang ada pada MS Word ke form yang disediakan</li>
<li>Silakan Review soal yang telah masuk ke editor. Apabila ada yang belum sesuai silakan lakukan perubahan seperlunya.</li>
<li>Klik tombol PROCEED untuk mulai memproses soal ke dalam sistem</li>
<li>Daftar soal yang telah masuk akan ditampilkan, dan Anda bisa mereview ulang. Apabila butuh mengulangi proses pengubahan silakan klik tombol Retry di bawah.</li>
<li>Apabila sudah merasa bahwa soal yang telah masuk sudah sesuai, silakan klik tombol Convert and Download XML Format</li>
<li>Anda dapat menggunakan file XML ini untuk diimportkan ke TCExam Anda masing-masing.</li>
</ol>
<h3>Untuk mengimport file XML ke TCExam caranya adalah :</h3>
<ol>
<li>Masuk ke menu Modules - Import</li>
<li>Pada form yang disediakan klik Choose File untuk memilih File XML yang tadi telah kita Download</li>
<li>Kemudian klik tombol SEND untuk memasukkan soal ke dalam database</li>
<li>Soal yang sudah diimport dapat diperiksa kembali melalui menu Modules - List</li>
</ol>
<?php
//echo '<iframe style="width:100%;height:600px" frameborder=0 src="'.K_ADMIN_MSWORD2XML_CONVERTER_URL.'/word-to-tcexam-xml-app/admin/code/tmf_word_import.php" sandbox="allow-forms"></iframe>'.K_NEWLINE;
echo '</fieldset></div>'.K_NEWLINE;

echo '</div>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;

require_once('../code/tce_page_footer.php');

//============================================================+
// END OF FILE
//============================================================+
