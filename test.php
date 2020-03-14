<?php 

require_once './src/DetectLang.php';

$detectlang = new \DetectLang\DetectLang();
$detectlang->set_text('Is මේක a sample text?');

print_r($detectlang->get_language());
print_r($detectlang->get_scores());

 ?>