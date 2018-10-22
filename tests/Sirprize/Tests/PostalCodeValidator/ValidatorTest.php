<?php

/*
 * This file is part of the postal-code-validator package
 *
 * (c) Christian Hoegl <chrigu@sirprize.me>
 */
 
namespace Sirprize\Tests\PostalCodeValidator;

use Sirprize\PostalCodeValidator\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
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
        $this->assertFalse($validator->isValid('JP', '1550031'));
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
        $this->assertTrue($validator->isValid('SE', '113 37'));
    }

    public function testCzechCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('CZ', '602 00'));
        $this->assertFalse($validator->isValid('CZ', '60200'));
        $this->assertTrue($validator->isValid('CZ', '60200', true));
    }

    public function testIrelandCode()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('IE', 'T12 Y03W'));
    }

    public function testGetFormats()
    {
        $validator = new Validator();
        $this->assertSame(array('###', '###-##'), $validator->getFormats('TW'));
    }

    /**
     * @expectedException Sirprize\PostalCodeValidator\ValidationException
     */
    public function testGetFormatsWithInvalidCountryCode()
    {
        $validator = new Validator();
        $validator->getFormats('invalid_postal_code');
    }

    public function testHasCountry()
    {
        $validator = new Validator();
        $this->assertTrue($validator->hasCountry('TW'));
        $this->assertFalse($validator->hasCountry('invalid_postal_code'));
    }
}
