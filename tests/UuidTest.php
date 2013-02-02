<?php

require __DIR__ . '/../lib/Thoom/Generator/Uuid.php';

use Thoom\Generator\Uuid;
    
class UuidTest extends \PHPUnit_Framework_TestCase
{
    protected $namespace = 'e2b11da7-f944-4e9f-b1d9-eebe072569f7';
    
    public function testv3()
    {
        $v3 = Uuid::v3($this->namespace, 'v3');
        $this->assertTrue(Uuid::validate($v3));

        $dupe = Uuid::v3($this->namespace, 'v3');
        $this->assertEquals($v3, $dupe);
        
        $nodupe = Uuid::v3($this->namespace, 'fail');
        $this->assertNotEquals($v3, $nodupe);
    }

    public function testv3pack()
    {
        $v3 = Uuid::v3($this->namespace, 'v3', $binary = true);
        $this->assertTrue(Uuid::validate(Uuid::unpack($v3)));
    }
    
    public function testv4()
    {
        $v4 = Uuid::v4();
        $this->assertTrue(Uuid::validate($v4));
    }
    
    public function testv4pack()
    {
        $v4 = Uuid::v4($binary = true);
        $this->assertTrue(Uuid::validate(Uuid::unpack($v4)));
    }
    
    public function testv5()
    {
        $v5 = Uuid::v5($this->namespace, 'v5');
        $this->assertTrue(Uuid::validate($v5));

        $dupe = Uuid::v5($this->namespace, 'v5');
        $this->assertEquals($v5, $dupe);
        
        $nodupe = Uuid::v5($this->namespace, 'fail');
        $this->assertNotEquals($v5, $nodupe);
    }
    
    public function testv5pack()
    {
        $v5 = Uuid::v5($this->namespace, 'v5', $binary = true);
        $this->assertTrue(Uuid::validate(Uuid::unpack($v5)));
    }
}