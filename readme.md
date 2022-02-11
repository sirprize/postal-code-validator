# Postal-code-validator

Validate Formatting of World-Wide Postal Codes according this ["List of postal codes" article on Wikipedia](https://en.wikipedia.org/wiki/List_of_postal_codes)

## Installation

    composer require sirprize/postal-code-validator

## Usage

### Check If Country Is Supported

    use Sirprize\PostalCodeValidator\Validator;
    
    $validator = new Validator();
    $validator->hasCountry('CH'); // returns true

### Check If Postal Code Is Properly Formatted

    use Sirprize\PostalCodeValidator\Validator;
    
    $validator = new Validator();
    $validator->isValid('CH', 'usjU87jsdf'); // returns false
    $validator->isValid('CH', '3007'); // returns true

### Get The Possible Formats For a Specific Country

    use Sirprize\PostalCodeValidator\Validator;
    
    $validator = new Validator();
    $validator->getFormats('GB'); // returns ['@@## #@@', '@#@ #@@', '@@# #@@', '@@#@ #@@', '@## #@@', '@# #@@']

## Formatting

+ `#` = `0-9`
+ `@` = `a-zA-Z`

## Country Codes

Postal-code-validator uses [ISO 3166](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) 2-letter country codes

## License

See LICENSE.
