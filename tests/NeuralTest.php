<?php
class NeuralTest extends PHPUnit_Framework_TestCase
{
    public  function testCheckSymbol(){
        $x1=[1,-1,-1,1,1,-1,-1,1,1,1,1,1,1,-1,-1,1,1,-1,-1,1];
        $x2=[1,1,1,1,1,-1,-1,1,1,-1,-1,1,1,-1,-1,1,1,1,1,1];
        $x3=[1,1,1,1,1,-1,-1,1,1,1,1,1,1,-1,-1,-1,1,-1,-1,-1];
        $x4=[1,1,1,1,1,-1,-1,-1,1,-1,-1,-1,1,-1,-1,-1,1,-1,-1,-1];
        $xi=[1,-1,-1,1,1,-1,-1,1,1,1,1,1,1,-1,-1,1,1,-1,-1,1];
        $neural=new Source\Neural($x1,$x2,$x3,$x4);
        $neural->study();
        $neural->checkStop();
        $this->assertEquals("<h3>This is most likely first symbol</h3>",$neural->checkSymbol($xi));
    }
}