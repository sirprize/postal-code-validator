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
    public static function dataProviderPostalCodes()
    {
        return [
            'BE Belgium' => [
                'country' => 'BE',
                'validPostalCodes' => ['3007'],
                'invalidPostalCodes' => [],
            ],
            'CH Switzerland' => [
                'country' => 'CH',
                'validPostalCodes' => ['3007'],
                'invalidPostalCodes' => [],
            ],
            'CZ Czech Republic' => [
                'country' => 'CZ',
                'validPostalCodes' => ['602 00'],
                'invalidPostalCodes' => ['60200'],
            ],
            'DE Germany' => [
                'country' => 'DE',
                'validPostalCodes' => ['50672'],
                'invalidPostalCodes' => [],
            ],
            'EE Estonia' => [
                'country' => 'EE',
                'validPostalCodes' => ['10123'],
                'invalidPostalCodes' => [],
            ],
            'FI inland' => [
                'country' => 'FI',
                'validPostalCodes' => ['00160'],
                'invalidPostalCodes' => [],
            ],
            'GB Great Britain' => [
                'country' => 'GB',
                'validPostalCodes' => ['TN1 2GE', 'BD16 3QA'],
                'invalidPostalCodes' => [],
            ],
            'IE Ireland' => [
                'country' => 'IE',
                'validPostalCodes' => ['T12 Y03W', 'D6W XK06'],
                'invalidPostalCodes' => ['BT7 90HR'],
            ],
            'IT Italy' => [
                'country' => 'IT',
                'validPostalCodes' => ['00146'],
                'invalidPostalCodes' => [],
            ],
            'JP Japan' => [
                'country' => 'JP',
                'validPostalCodes' => ['155-0031'],
                'invalidPostalCodes' => ['1550031'],
            ],
            'LU Luxembourg' => [
                'country' => 'LU',
                'validPostalCodes' => ['1099', 'L-1099'],
                'invalidPostalCodes' => ['123', '12345', 'L1099'],
            ],
            'NL Netherlands' => [
                'country' => 'NL',
                'validPostalCodes' => ['1234AB', '1234 AB'],
                'invalidPostalCodes' => ['1234', '1234  AB'],
            ],
            'PT Portugal' => [
                'country' => 'PT',
                'validPostalCodes' => ['2765-073'],
                'invalidPostalCodes' => [],
            ],
            'RU Russia' => [
                'country' => 'RU',
                'validPostalCodes' => ['624800'],
                'invalidPostalCodes' => [],
            ],
            'SE Sweden' => [
                'country' => 'SE',
                'validPostalCodes' => ['113 37'],
                'invalidPostalCodes' => [],
            ],
            'US USA' => [
                'country' => 'US',
                'validPostalCodes' => ['81301'],
                'invalidPostalCodes' => [],
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
