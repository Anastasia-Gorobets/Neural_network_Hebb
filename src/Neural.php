<?php
namespace Source;
class Neural
{
    public $x1;
    public $x2;
    public $x3;
    public $x4;

    public $w1;
    public $w2;

    public $y1;
    public $y2;
    public $y3;
    public $y4;

    public $s1;
    public $s2;

    public $xi;

    public function __construct($x1, $x2, $x3, $x4)
    {

        $this->w1 = array_fill(0, 20, 0); //начальные весы
        $this->w2 = array_fill(0, 20, 0);

        $this->x1 = $x1;
        $this->x2 = $x2;
        $this->x3 = $x3;
        $this->x4 = $x4;

        $this->y1 = [1, 1]; //выходы
        $this->y2 = [1, -1];
        $this->y3 = [-1, 1];
        $this->y4 = [-1, -1];

        $this->s1 = 0;
        $this->s2 = 0;
    }

    public function study()
    {
        //обучаем для x1
        for ($i = 0; $i <= 19; $i++) {
            $this->w1[$i] = $this->w1[$i] + $this->x1[$i] * $this->y1[0];
            $this->w2[$i] = $this->w2[$i] + $this->x1[$i] * $this->y1[1];
        }
        //обучаем для x2
        for ($i = 0; $i <= 19; $i++) {
            $this->w1[$i] = $this->w1[$i] + $this->x2[$i] * $this->y2[0];
            $this->w2[$i] = $this->w2[$i] + $this->x2[$i] * $this->y2[1];
        }
        //обучаем для x3
        for ($i = 0; $i <= 19; $i++) {
            $this->w1[$i] = $this->w1[$i] + $this->x3[$i] * $this->y3[0];
            $this->w2[$i] = $this->w2[$i] + $this->x3[$i] * $this->y3[1];
        }
        //обучаем для x4
        for ($i = 0; $i <= 19; $i++) {
            $this->w1[$i] = $this->w1[$i] + $this->x4[$i] * $this->y4[0];
            $this->w2[$i] = $this->w2[$i] + $this->x4[$i] * $this->y4[1];
        }
    }
    public function checkStop()
    {
        $count = 0;
        $flag = true;
        while (true) {
            $s1 = 0;
            $s2 = 0;
            for ($i = 0; $i <= 19; $i++) {
                $s1 += $this->w1[$i] * $this->x1[$i];
                $s2 += $this->w2[$i] * $this->x1[$i];
            }
            if (!($s1 > 0 && $s2 > 0)) {
                $flag = false;
            }
            $s1 = 0;
            $s2 = 0;
            for ($i = 0; $i <= 19; $i++) {
                $s1 += $this->w1[$i] * $this->x2[$i];
                $s2 += $this->w2[$i] * $this->x2[$i];
            }
            if (!($s1 > 0 && $s2 < 0)) {
                $flag = false;
            }
            $s1 = 0;
            $s2 = 0;
            for ($i = 0; $i <= 19; $i++) {
                $s1 += $this->w1[$i] * $this->x3[$i];
                $s2 += $this->w2[$i] * $this->x3[$i];
            }
            if (!($s1 < 0 && $s2 > 0)) {
                $flag = false;
            }
            $s1 = 0;
            $s2 = 0;
            for ($i = 0; $i <= 19; $i++) {
                $s1 += $this->w1[$i] * $this->x4[$i];
                $s2 += $this->w2[$i] * $this->x4[$i];
            }
            if (!($s1 < 0 && $s2 < 0)) {
                $flag = false;
            }
            $count++;
            if ($flag == false) {
                $this->study();
            } else {
                echo "Education was successful. It took epochs:$count<br>";
                break;
            }
        }
    }
    public function printW()
    {
        echo "W:<br>";
        foreach ($this->w1 as $w1) {
            echo $w1 . ' ';
        }
        echo '<br>';
        foreach ($this->w2 as $w2) {
            echo $w2 . ' ';
        }
    }
    public function checkSymbol($xi)
    {
        $this->xi = $xi;
        for ($i = 0; $i <= 19; $i++) {
            $this->s1 += $this->w1[$i] * $this->xi[$i];
            $this->s2 += $this->w2[$i] * $this->xi[$i];
        }
        echo "<br><br>S=$this->s1 $this->s2<br>";
        if ($this->s1 > 0 && $this->s2 > 0) return "<h3>This is most likely first symbol</h3>";
        else if ($this->s1 > 0 && $this->s2 < 0)return "<h3>This is most likely second symbol</h3>";
        else if ($this->s1 < 0 && $this->s2 > 0) return "<h3>This is most likely third symbol</h3>";
        else if ($this->s1 < 0 && $this->s2 < 0) return "<h3>This is most likely fourth symbol</h3>";
        else{
            return  "The neural network can not make an accurate choice. Check your data, please<br>";
        }
    }
}