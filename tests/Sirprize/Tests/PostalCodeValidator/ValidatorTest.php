<?php

/*
 * This file is part of the postal-code-validator package
 *
 * (c) Christian Hoegl <chrigu@sirprize.me>
 */
 
namespace Sirprize\Tests\PostalCodeValidator;

use Sirprize\PostalCodeValidator\Validator;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * @expectedException Sirprize\PostalCodeValidator\ValidationException
     */
    public function testInvalidCountryCode()
    {
        $validator = new Validator();
        $validator->isValid('XXXXXX', 'YYYYYY');
    }
    
    public function testUkCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('GB', 'TN1 2GE'));
        $this->assertTrue($validator->isValid('GB', 'BD16 3QA'));
    }
    
    public function testSwissCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('CH', '3007'));
    }
    
    public function testGermanCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('DE', '50672'));
    }
    
    public function testPortugeseCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('PT', '2765-073'));
    }
    
    public function testJapaneseCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('JP', '155-0031'));
    }
    
    public function testUsCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('US', '81301'));
    }
    
    public function testEstonianCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('EE', '10123'));
    }
    
    public function testRussianCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('RU', '624800'));
    }
    
    public function testBelgianCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('BE', '1620'));
    }
    
    public function testItalianCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('IT', '00146'));
    }
    
    public function testFinnishCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('FI', '00160'));
    }
    
    public function testSwedishCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('SE', '11337'));
    }
}