<?php

require __DIR__ . '/../lib/Thoom/Generator/RandomString.php';

use Thoom\Generator\RandomString;

class RandomStringTest extends \PHPUnit_Framework_TestCase
{
    protected $iterations = 1000;
    protected $len = 30;
    
    public function testAlnum()
    {
        //ALPHANUM_LOWER
        for ($i = 0; $i < $this->iterations; $i++) {
            $alnum = RandomString::alnum($this->len, RandomString::ALPHANUM_LOWER);
            
            $this->assertEquals($this->len, strlen($alnum));
            $this->assertEquals(1, preg_match("/^[a-z0-9]+$/", $alnum));
        }
        
        //ALPHANUM_UPPER
        for ($i = 0; $i < $this->iterations; $i++) {
            $alnum = RandomString::alnum($this->len, RandomString::ALPHANUM_UPPER);
            
            $this->assertEquals($this->len, strlen($alnum));
            $this->assertEquals(1, preg_match("/^[A-Z0-9]+$/", $alnum));
        }
        
        //ALPHANUM_MIXED
        for ($i = 0; $i < $this->iterations; $i++) {
            $alnum = RandomString::alnum($this->len, RandomString::ALPHANUM_MIXED);
            
            $this->assertEquals($this->len, strlen($alnum));
            $this->assertEquals(1, preg_match("/^[a-zA-Z0-9]+$/", $alnum));
        }
    }
    
    public function testAlpha()
    {
        //ALPHA_LOWER
        for ($i = 0; $i < $this->iterations; $i++) {
            $alpha = RandomString::alpha($this->len, RandomString::ALPHA_LOWER);
            
            $this->assertEquals($this->len, strlen($alpha));
            $this->assertEquals(1, preg_match("/^[a-z]+$/", $alpha));
        }
        
        //ALPHA_UPPER
        for ($i = 0; $i < $this->iterations; $i++) {
            $alpha = RandomString::alpha($this->len, RandomString::ALPHA_UPPER);
            
            $this->assertEquals($this->len, strlen($alpha));
            $this->assertEquals(1, preg_match("/^[A-Z]+$/", $alpha));
        }
        
        //ALPHA_MIXED
        for ($i = 0; $i < $this->iterations; $i++) {
            $alpha = RandomString::alpha($this->len, RandomString::ALPHA_MIXED);
            
            $this->assertEquals($this->len, strlen($alpha));
            $this->assertEquals(1, preg_match("/^[a-zA-Z]+$/", $alpha));
        }
    }
    
    public function testNum()
    {
        for ($i = 0; $i < $this->iterations; $i++) {
            $num = RandomString::num($this->len);
            
            $this->assertEquals($this->len, strlen($num));
            $this->assertTrue(is_numeric($num));
        }
    }
    
    public function testUser()
    {
        for ($i = 0; $i < $this->iterations; $i++) {
            $user = RandomString::user($this->len, array('-', '*', 1, 2, 3, 4));
            
            $this->assertEquals($this->len, strlen($user));
            $this->assertEquals(1, preg_match("/^[\-|\*|1-4]+$/", $user));
        }
    }
}