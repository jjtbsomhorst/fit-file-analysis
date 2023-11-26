<?php
error_reporting(E_ALL);
if (!class_exists('TrainerPlan\FIT\FITFileAnalysis')) {
    require __DIR__ . '/../src/FITFileAnalysis.php';
}

class EnumDataTest extends PHPUnit_Framework_TestCase
{
    private $base_dir;
    private $filename = 'swim.fit';
    private $pFFA;
    
    public function setUp()
    {
        $this->base_dir = __DIR__ . '/../demo/fit_files/';
        $this->pFFA = new TrainerPlan\FIT\FITFileAnalysis($this->base_dir . $this->filename, ['units' => 'raw']);
    }
    
    public function testEnumData_manufacturer()
    {
        $this->assertEquals('Garmin', $this->pFFA->manufacturer());
    }
    
    public function testEnumData_product()
    {
        $this->assertEquals('Forerunner 910XT', $this->pFFA->product());
    }
    
    public function testEnumData_sport()
    {
        $this->assertEquals('Swimming', $this->pFFA->sport());
    }
}
