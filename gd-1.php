<?php

require_once("gdclass.php");

$GD = new GD();

# WEB よりイメージを作成
$GD->LoadJpeg( "sample.jpg" );

# ブラウザに表示
$GD->Response( );
