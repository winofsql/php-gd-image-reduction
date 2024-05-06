<?php

require_once("gdclass.php");

$GD = new GD();

# WEB よりイメージを作成
$GD->LoadJpeg( "sample.jpg" );

// 幅を基準に縮小
$GD->CopyW( $GD2, 300 );

# ブラウザに表示
$GD2->Response( );

