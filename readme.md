# Postal-code-validator

Validate Formatting of World-Wide Postal Codes

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
    $validator->getFormats('GB'); // returns array('@# #@@', '@** #@@', '@@#* #@@')

## Formats

+ `#` = `0-9`
+ `@` = `a-zA-Z`
+ `*` = `a-zA-Z0-9`

## License

See LICENSE.
