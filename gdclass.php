<?php
// ***********************
// クラス
// ***********************
class GD {

  var $im;
  var $type;

// ***********************
// コンストラクタ
// ***********************
  function GD( ) {
  }

// ***********************
// キャンバス作成
// ***********************
  function CreateCanvas( $Width, $Height, $Type="PNG" ) {
    $this->type = $Type;
    $this->im = imagecreatetruecolor($Width, $Height);
  }

// ***********************
// 0, 0 を起点に
// 指定色で塗りつぶす
// ***********************
  function Fill( $Red, $Green, $Blue ) {
    imagefill(
      $this->im,
      0,
      0,
      $this->CreateColor( $Red, $Green, $Blue )
    );
  }
  
// ***********************
// PNG ロード
// ***********************
  function LoadPng( $Target ) {
    $this->type = "PNG";
    $this->im = @ImageCreateFromPng($Target);
  }

// ***********************
// JPEG ロード
// ***********************
  function LoadJpeg( $Target ) {
    $this->type = "JPEG";
    $this->im = @ImageCreateFromJpeg($Target);
  }

// ***********************
// 色リソース作成
// ***********************
  function CreateColor( $Red, $Green, $Blue ) {
    $ret = ImageColorAllocate (
      $this->im,
      $Red, $Green, $Blue );
    return $ret;
  }

// ***********************
// 線幅設定
// ***********************
  function SetLineWidth( $Width ) {
    ImageSetThickness( $this->im, $Width );
  }

// ***********************
// 直線の描画
// ***********************
  function Line( $x1, $y1, $x2, $y2, $Option ) {
    if ( is_array( $Option ) ) {
      ImageSetStyle( $this->im, $Option );
      ImageLine(
        $this->im, $x1, $y1, $x2, $y2, IMG_COLOR_STYLED );
    }
    else {
      ImageLine(
        $this->im, $x1, $y1, $x2, $y2, $Option );
    }
  }

// ***********************
// 矩形の描画
// ***********************
  function Box( $x, $y, $w, $h, $Color, $fill=FALSE ) {
    if ( $fill ) {
      imageFilledRectAngle(
        $this->im, $x, $y, $x+$w, $y+$h, $Color );
    }
    else {
      ImageRectAngle(
        $this->im, $x, $y, $x+$w, $y+$h, $Color );
    }
  }

// ***********************
// ブラウザへ出力
// ***********************
  function Response( ) {
    switch( $this->type ) {
      case "PNG":
        header('Content-Type: image/png');
        ImagePng( $this->im );
        break;
      case "JPEG":
        header('Content-Type: image/jpeg');
        ImageJpeg( $this->im );
        break;
    }
  }

// ***********************
// PNG 保存
// ***********************
  function SavePng( $FilePath ) {
    ImagePng( $this->im, $FilePath );
  }

// ***********************
// JPEG 保存
// ***********************
  function SaveJpeg( $FilePath, $Quality=75 ) {
    ImageJpeg( $this->im, $FilePath, $Quality );
  }

// ***********************
// 色リソース開放
// ***********************
  function DestroyColor( $Color ) {
    ImageColorDeallocate( $this->im, $Color );
  }

// ***********************
// イメージの破棄
// ***********************
  function Destroy( ) {
    ImageDestroy ( $this->im );
  }

// ***********************
// 伸縮された新しいイメージの作成
// ***********************
  function Copy( &$New, $rate ) {
    $w = ImageSx( $this->im );
    $h = ImageSy( $this->im );
    $New = new GD();
    $New->im = ImageCreateTrueColor( $w * $rate, $h * $rate );
    $w2 = ImageSx( $New->im );
    $h2 = ImageSy( $New->im );
    ImageCopyResampled(
      $New->im,
      $this->im,
      0,0,0,0,
      $w2, $h2,
      $w, $h
    );
    $New->type = $this->type;
  }

  function CopyW( &$New, $w_new ) {
    $w = ImageSx( $this->im );
    $rate = $w_new / $w;
    $h = ImageSy( $this->im );
    $New = new GD();
    $New->im = ImageCreateTrueColor( $w_new, (int)($h * $rate) );
    $w2 = ImageSx( $New->im );
    $h2 = ImageSy( $New->im );
    ImageCopyResampled(
      $New->im,
      $this->im,
      0,0,0,0,
      $w2, $h2,
      $w, $h
    );
    $New->type = $this->type;
  }

  function CopyH( &$New, $h_new ) {
    $w = ImageSx( $this->im );
    $h = ImageSy( $this->im );
    $rate = $h_new / $h;
    $New = new GD();
    $New->im = ImageCreateTrueColor( (int)($w * $rate), $h_new );
    $w2 = ImageSx( $New->im );
    $h2 = ImageSy( $New->im );
    ImageCopyResampled(
      $New->im,
      $this->im,
      0,0,0,0,
      $w2, $h2,
      $w, $h
    );
    $New->type = $this->type;
  }

  function CopyWH( &$New, $w_new, $h_new ) {
    $w = ImageSx( $this->im );
    $h = ImageSy( $this->im );
    $New = new GD();
    $New->im = ImageCreateTrueColor( $w_new, $h_new );
    $w2 = ImageSx( $New->im );
    $h2 = ImageSy( $New->im );
    ImageCopyResampled(
      $New->im,
      $this->im,
      0,0,0,0,
      $w2, $h2,
      $w, $h
    );
    $New->type = $this->type;
  }
}
