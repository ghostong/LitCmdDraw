<?php

namespace Lit\CmdDraw;

class TextPictures
{
    protected $text = '*';
    protected $textColor = [255, 255, 255];
    protected $imageWidth = 200;
    protected $imageHeight = 200;
    protected $imageColor = [0, 0, 0];
    protected $fontSize = 140;
    protected $textFont = __DIR__ . '/../data/fonts/SourceCodePro-Regular.ttf';
    protected $savePath = '';
    protected $textOffsetX = 0;
    protected $textOffsetY = 0;

    public function text($text) {
        $this->text = $text;
        return $this;
    }

    public function textColor($color) {
        $this->textColor = $color;
        return $this;
    }

    public function textFont($font) {
        $this->textFont = $font;
        return $this;
    }

    public function textOffsetX($offset) {
        $this->textOffsetX = $offset;
        return $this;
    }

    public function textOffsetY($offset) {
        $this->textOffsetY = $offset;
        return $this;
    }

    public function fontSize($fontSize) {
        $this->fontSize = $fontSize;
        return $this;
    }

    public function imageWidth($width) {
        $this->imageWidth = $width;
        return $this;
    }

    public function imageHeight($width) {
        $this->imageHeight = $width;
        return $this;
    }

    public function imageColor($imageColor) {
        $this->imageColor = $imageColor;
        return $this;
    }

    public function savePath($path) {
        $this->savePath = $path;
        return $this;
    }

    protected function getAlign() {
        $textBox = imagettfbbox($this->fontSize, 0, $this->textFont, $this->text);
        $textWidth = $textBox[2] - $textBox[0];
        $textHeight = $textBox[7] - $textBox[1];
        $x = ($this->imageWidth - $textWidth) / 2;
        $y = ($this->imageHeight - $textHeight) / 2;
        return [floor($x) + $this->textOffsetX, floor($y) + $this->textOffsetY];
    }

    public function createImage() {
        $image = imagecreatetruecolor($this->imageWidth, $this->imageHeight);
        $bgColor = imagecolorallocate($image, $this->imageColor[0], $this->imageColor[1], $this->imageColor[2]);
        imagefilledrectangle($image, 0, 0, $this->imageWidth, $this->imageHeight, $bgColor);
        $txtColor = imagecolorallocate($image, $this->textColor[0], $this->textColor[1], $this->textColor[2]);
        list($x, $y) = $this->getAlign();
        imagettftext($image, $this->fontSize, 0, $x, $y, $txtColor, $this->textFont, $this->text);
        if ($this->savePath) {
            imagepng($image, $this->savePath, 0);
            $imgBin = file_get_contents($this->savePath);
        } else {
            ob_start();
            imagepng($image, null, 0);
            $imgBin = ob_get_clean();
        }
        imagedestroy($image);
        return $imgBin;
    }

}