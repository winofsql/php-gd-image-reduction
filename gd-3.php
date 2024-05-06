<?php

require_once("gdclass.php");

$GD = new GD();

# WEB よりイメージを作成
$GD->CreateCanvas( 400, 200, "PNG" );  

$GD->Fill( 0xC0, 0xC0, 0xC0 );
  
# ブラウザに表示
$GD->Response( );
