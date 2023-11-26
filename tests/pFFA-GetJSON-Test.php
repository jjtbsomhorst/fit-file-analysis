<?php
error_reporting(E_ALL);
if (!class_exists('TrainerPlan\FIT\FITFileAnalysis')) {
    require __DIR__ . '/../src/FITFileAnalysis.php';
}

class GetJSONTest extends PHPUnit_Framework_TestCase
{
    private $base_dir;
    private $filename = 'power-analysis.fit';
    private $pFFA;
    
    public function setUp()
    {
        $this->base_dir = __DIR__ . '/../demo/fit_files/';
        $this->pFFA = new TrainerPlan\FIT\FITFileAnalysis($this->base_dir . $this->filename, ['units' => 'raw']);
    }
    
    public function testGetJSON()
    {
        // getJSON() create a JSON object that contains available record message information.
        $crank_length = null;
        $ftp = null;
        $data_required = ['timestamp', 'speed'];
        $selected_cadence = 90;
        $php_object = json_decode($this->pFFA->getJSON($crank_length, $ftp, $data_required, $selected_cadence));
        
        // Assert data
        $this->assertEquals('raw', $php_object->units);
        $this->assertEquals(3043, count($php_object->data));
        $this->assertEquals(1437474517, $php_object->data[0]->timestamp);
        $this->assertEquals(1.378, $php_object->data[0]->speed);
    }
}
