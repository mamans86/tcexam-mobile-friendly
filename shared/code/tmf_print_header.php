<?php
//start print header
echo '<div id="print-header">'.K_NEWLINE;
	echo '<div id="instLogo">'.K_NEWLINE;
		echo '<img src="'.K_PATH_URL_CACHE.'logo/'.K_INSTITUTION_LOGO.'" />'.K_NEWLINE;
	echo '</div>'.K_NEWLINE;
	echo '<div id="instData">'.K_NEWLINE;
		echo '<h2>'.K_INSTITUTION_NAME.'</h2>'.K_NEWLINE;
		echo '<p>'.K_ADDRESS_LINE1.'</p>'.K_NEWLINE;
		echo '<p>'.K_ADDRESS_LINE2.'</p>'.K_NEWLINE;
		echo '<p>'.K_ADDRESS_LINE3.'</p>'.K_NEWLINE;
	echo '</div>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;
echo '<hr id="hr-print-header" />'.K_NEWLINE;
//end print header
?>