<?php

/*
 * This file is part of the postal-code-validator package
 *
 * (c) Christian Hoegl <chrigu@sirprize.me>
 */

namespace Sirprize\PostalCodeValidator\Tests;

use Sirprize\PostalCodeValidator\ValidationException;
use Sirprize\PostalCodeValidator\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function dataProviderPostalCodes()
    {
        return [
            'BE Belgium' => [
                'country' => 'BE',
                'valid' => ['3007'],
                'invalid' => [],
            ],
            'CH Switzerland' => [
                'country' => 'CH',
                'valid' => ['3007'],
                'invalid' => [],
            ],
            'CZ Czech Republic' => [
                'country' => 'CZ',
                'valid' => ['602 00'],
                'invalid' => ['60200'],
            ],
            'DE Germany' => [
                'country' => 'DE',
                'valid' => ['50672'],
                'invalid' => [],
            ],
            'EE Estonia' => [
                'country' => 'EE',
                'valid' => ['10123'],
                'invalid' => [],
            ],
            'FI inland' => [
                'country' => 'FI',
                'valid' => ['00160'],
                'invalid' => [],
            ],
            'GB Great Britain' => [
                'country' => 'GB',
                'valid' => ['TN1 2GE', 'BD16 3QA'],
                'invalid' => [],
            ],
            'IE Ireland' => [
                'country' => 'IE',
                'valid' => ['T12 Y03W', 'D6W XK06'],
                'invalid' => ['BT7 90HR'],
            ],
            'IT Italy' => [
                'country' => 'IT',
                'valid' => ['00146'],
                'invalid' => [],
            ],
            'JP Japan' => [
                'country' => 'JP',
                'valid' => ['155-0031'],
                'invalid' => ['1550031'],
            ],
            'NL Netherlands' => [
                'country' => 'NL',
                'valid' => ['1234AB', '1234 AB'],
                'invalid' => ['1234', '1234  AB'],
            ],
            'PT Portugal' => [
                'country' => 'PT',
                'valid' => ['2765-073'],
                'invalid' => [],
            ],
            'RU Russia' => [
                'country' => 'RU',
                'valid' => ['624800'],
                'invalid' => [],
            ],
            'SE Sweden' => [
                'country' => 'SE',
                'valid' => ['113 37'],
                'invalid' => [],
            ],
            'US USA' => [
                'country' => 'US',
                'valid' => ['81301'],
                'invalid' => [],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderPostalCodes
     * @param string $country
     * @param string[] $validPostalCodes
     * @param string[] $invalidPostalCodes
     * @throws ValidationException
     */
    public function testValidPostalCodes($country, $validPostalCodes, $invalidPostalCodes)
    {
        $validator = new Validator();
        foreach ($validPostalCodes as $postalCode) {
            $this->assertTrue($validator->isValid($country, $postalCode));
        }

        foreach ($invalidPostalCodes as $postalCode) {
            $this->assertFalse($validator->isValid($country, $postalCode));
        }
    }

    /**
     * @test
     *
     * Test if ignoreSpaces options works. CZ is just an example country code
     */
    public function testIgnoreSpaces()
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid('CZ', '602 00'));
        $this->assertFalse($validator->isValid('CZ', '60200'));
        $this->assertTrue($validator->isValid('CZ', '60200', true));
    }

    /**
     * @test
     * @throws ValidationException
     *
     * Test if getFormats() works. TW is just an example country code
     */
    public function testGetFormats()
    {
        $validator = new Validator();
        $this->assertSame(array('###', '###-##'), $validator->getFormats('TW'));
    }

    public function testInvalidCountryCode()
    {
        $this->expectException(ValidationException::class);

        $validator = new Validator();
        $validator->isValid('XXXXXX', 'YYYYYY');
    }

    public function testGetFormatsWithInvalidCountryCode()
    {
        $this->expectException(ValidationException::class);

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
