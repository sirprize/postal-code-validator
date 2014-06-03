<?php

/*
 * This file is part of the postal-code-validator package
 *
 * (c) Christian Hoegl <chrigu@sirprize.me>
 */
 
namespace Sirprize\PostalCodeValidator;

/**
 * Validator.
 *
 * @author Christian Hoegl <chrigu@sirprize.me>
 */
 
class Validator
{
    /*
     * country code: ISO 3166 2-letter code
     * format:
     *     # - numberic 0-9
     *     @ - alpha a-zA-Z
     *     * - alphanumerica a-zA-Z0-9
     */
    protected $formats = array(
        'AF' => array('####'),                      # AFGHANISTAN
        'AL' => array('####'),                      # ALBANIA
        'DZ' => array('#####'),                     # ALGERIA
        'AS' => array('#####'),                     # AMERICAN SAMOA
        'AD' => array('#####', '@D###'),            # ANDORRA
        'AO' => array(),                            # ANGOLA
        'AI' => array(),                            # ANGUILLA
        'AQ' => array(),                            # ANTARCTICA
        'AG' => array(),                            # ANTIGUA AND BARBUDA
        'AR' => array('####', '@####@@@'),          # ARGENTINA
        'AM' => array('####'),                      # ARMENIA
        'AW' => array(),                            # ARUBA
        'AU' => array('####'),                      # AUSTRALIA
        'AT' => array('####'),                      # AUSTRIA
        'AZ' => array('######', '####'),            # AZERBAIJAN
        'BS' => array(),                            # BAHAMAS
        'BH' => array(),                            # BAHRAIN
        'BD' => array('####'),                      # BANGLADESH
        'BB' => array('BB#####'),                   # BARBADOS
        'BY' => array('######'),                    # BELARUS
        'BE' => array('####'),                      # BELGIUM
        'BZ' => array(),                            # BELIZE
        'BJ' => array(),                            # BENIN
        'BM' => array('@@ ##'),                     # BERMUDA
        'BT' => array(),                            # BHUTAN
        'BO' => array(),                            # BOLIVIA
        'BA' => array('#####'),                     # BOSNIA AND HERZEGOWINA
        'BW' => array(),                            # BOTSWANA
        'BV' => array(),                            # BOUVET ISLAND
        'BR' => array('#####-###', '#####'),        # BRAZIL
        'IO' => array(),                            # BRITISH INDIAN OCEAN TERRITORY
        'BN' => array('@@####'),                    # BRUNEI DARUSSALAM
        'BG' => array('####'),                      # BULGARIA
        'BF' => array(),                            # BURKINA FASO
        'BI' => array(),                            # BURUNDI
        'KH' => array('#####'),                     # CAMBODIA
        'CM' => array(),                            # CAMEROON
        'CA' => array('@#@ #@#', '@#@ #@'),         # CANADA
        'CV' => array('####'),                      # CAPE VERDE
        'KY' => array('KY#-####'),                  # CAYMAN ISLANDS
        'CF' => array(),                            # CENTRAL AFRICAN REPUBLIC
        'TD' => array(),                            # CHAD
        'CL' => array('#######'),                   # CHILE
        'CN' => array('######'),                    # CHINA
        'CX' => array(),                            # CHRISTMAS ISLAND
        'CC' => array(),                            # COCOS (KEELING) ISLANDS
        'CO' => array('#####'),                     # COLOMBIA
        'KM' => array(),                            # COMOROS
        'CD' => array(),                            # CONGO, Democratic Republic of (was Zaire)
        'CG' => array(),                            # CONGO, People's Republic of
        'CK' => array(),                            # COOK ISLANDS
        'CR' => array('#####'),                     # COSTA RICA
        'CI' => array(),                            # COTE D'IVOIRE
        'HR' => array('#####'),                     # CROATIA
        'CU' => array('#####'),                     # CUBA
        'CY' => array('####'),                      # Cyprus
        'CZ' => array('### ##'),                    # Czech Republic
        'DK' => array('####'),                      # DENMARK
        'DJ' => array(),                            # DJIBOUTI
        'DM' => array(),                            # DOMINICA
        'DO' => array('#####'),                     # DOMINICAN REPUBLIC
        'TL' => array(),                            # EAST TIMOR
        'EC' => array('######'),                    # ECUADOR
        'EG' => array('#####'),                     # EGYPT
        'SV' => array('####'),                      # EL SALVADOR
        'GQ' => array(),                            # EQUATORIAL GUINEA
        'ER' => array(),                            # ERITREA
        'EE' => array('#####'),                     # ESTONIA
        'ET' => array('####'),                      # ETHIOPIA
        'FK' => array('FIQQ 1ZZ'),                  # FALKLAND ISLANDS (MALVINAS)
        'FO' => array('###'),                       # FAROE ISLANDS
        'FJ' => array(),                            # FIJI
        'FI' => array('#####'),                     # FINLAND
        'FR' => array('#####'),                     # FRANCE
        'FX' => array(),                            # FRANCE, METROPOLITAN
        'GF' => array('#####'),                     # FRENCH GUIANA
        'PF' => array('#####'),                     # FRENCH POLYNESIA
        'TF' => array(),                            # FRENCH SOUTHERN TERRITORIES
        'GA' => array(),                            # GABON
        'GM' => array(),                            # GAMBIA
        'GE' => array('####'),                      # GEORGIA
        'DE' => array('#####'),                     # GERMANY
        'GH' => array(),                            # GHANA
        'GI' => array(),                            # GIBRALTAR
        'GR' => array('#####', '### ##'),           # GREECE
        'GL' => array('####'),                      # GREENLAND
        'GD' => array(),                            # GRENADA
        'GP' => array('#####'),                     # GUADELOUPE
        'GU' => array('#####'),                     # GUAM
        'GT' => array('#####'),                     # GUATEMALA
        'GN' => array(),                            # GUINEA
        'GW' => array('####'),                      # GUINEA-BISSAU
        'GY' => array(),                            # GUYANA
        'HT' => array('####'),                      # HAITI
        'HM' => array(),                            # HEARD AND MC DONALD ISLANDS
        'HN' => array('#####'),                     # HONDURAS
        'HK' => array(),                            # HONG KONG
        'HU' => array('####'),                      # HUNGARY
        'IS' => array('###'),                       # ICELAND
        'IN' => array('######'),                    # INDIA
        'ID' => array('#####'),                     # INDONESIA
        'IR' => array('#####'),                     # IRAN
        'IQ' => array('#####'),                     # IRAQ
        'IE' => array(),                            # IRELAND
        'IL' => array('#####'),                     # ISRAEL
        'IT' => array('#####'),                     # ITALY
        'JM' => array('JM@@@##'),                   # JAMAICA
        'JP' => array('###-####', '#######'),       # JAPAN
        'JO' => array('#####'),                     # JORDAN
        'KZ' => array('######'),                    # KAZAKHSTAN
        'KE' => array('#####'),                     # KENYA
        'KI' => array(),                            # KIRIBATI
        'KW' => array('#####'),                     # KUWAIT
        'KG' => array('######'),                    # KYRGYZSTAN
        'LA' => array('#####'),                     # LAO PEOPLE'S DEMOCRATIC REPUBLIC
        'LV' => array('####'),                      # LATVIA
        'LB' => array('####'),                      # LEBANON
        'LS' => array('###'),                       # LESOTHO
        'LR' => array('####'),                      # LIBERIA
        'LY' => array('#####'),                     # LIBYAN ARAB JAMAHIRIYA
        'LI' => array('####'),                      # LIECHTENSTEIN
        'LT' => array('#####'),                     # LITHUANIA
        'LU' => array('####'),                      # LUXEMBOURG
        'MO' => array(),                            # MACAU
        'MK' => array('####'),                      # MACEDONIA
        'MG' => array('###'),                       # MADAGASCAR
        'MW' => array(),                            # MALAWI
        'MY' => array('#####'),                     # MALAYSIA
        'MV' => array('####', '#####'),             # MALDIVES
        'ML' => array(),                            # MALI
        'MT' => array('@@@ ####'),                  # MALTA
        'MH' => array('#####'),                     # MARSHALL ISLANDS
        'MQ' => array('#####'),                     # MARTINIQUE
        'MR' => array(),                            # MAURITANIA
        'MU' => array(),                            # MAURITIUS
        'YT' => array('#####'),                     # MAYOTTE
        'MX' => array('#####', '####'),             # MEXICO
        'FM' => array('#####'),                     # MICRONESIA
        'MD' => array('####'),                      # MOLDOVA
        'MC' => array('#8000', '#####'),            # MONACO
        'MN' => array('#####', '######'),           # MONGOLIA
        'ME' => array('#####'),                     # MONTENEGRO
        'MS' => array(),                            # MONTSERRAT
        'MA' => array('#####'),                     # MOROCCO
        'MZ' => array('#####'),                     # MOZAMBIQUE
        'MM' => array('#####'),                     # MYANMAR
        'NA' => array(),                            # NAMIBIA
        'NR' => array(),                            # NAURU
        'NP' => array('#####'),                     # NEPAL
        'NL' => array('#### @@', '####', '####@@'), # NETHERLANDS
        'AN' => array(),                            # NETHERLANDS ANTILLES
        'NC' => array('#####'),                     # NEW CALEDONIA
        'NZ' => array('####'),                      # NEW ZEALAND
        'NI' => array('###-###-#'),                 # NICARAGUA
        'NE' => array('####'),                      # NIGER
        'NG' => array('######'),                    # NIGERIA
        'NU' => array(),                            # NIUE
        'NF' => array(),                            # NORFOLK ISLAND
        'KP' => array(),                            # NORTH KOREA
        'MP' => array('#####'),                     # NORTHERN MARIANA ISLANDS
        'NO' => array('####'),                      # NORWAY
        'OM' => array('###'),                       # OMAN
        'PK' => array('#####'),                     # PAKISTAN
        'PW' => array('#####'),                     # PALAU
        'PS' => array(),                            # PALESTINIAN TERRITORY
        'PA' => array(),                            # PANAMA
        'PG' => array('###'),                       # PAPUA NEW GUINEA
        'PY' => array('####'),                      # PARAGUAY
        'PE' => array('##'),                        # PERU
        'PH' => array('####'),                      # PHILIPPINES
        'PN' => array(),                            # PITCAIRN
        'PL' => array('##-###'),                    # POLAND
        'PT' => array('####-###', '####'),          # PORTUGAL
        'PR' => array('#####'),                     # PUERTO RICO
        'QA' => array(),                            # QATAR
        'RE' => array('#####'),                     # REUNION
        'RO' => array('######'),                    # ROMANIA
        'RU' => array('######'),                    # RUSSIA
        'RW' => array(),                            # RWANDA
        'KN' => array(),                            # SAINT KITTS AND NEVIS
        'LC' => array(),                            # SAINT LUCIA
        'VC' => array(),                            # SAINT VINCENT AND THE GRENADINES
        'WS' => array('#####'),                     # SAMOA
        'SM' => array('#####'),                     # SAN MARINO
        'ST' => array(),                            # SAO TOME AND PRINCIPE
        'SA' => array('#####'),                     # SAUDI ARABIA
        'SN' => array(),                            # SENEGAL
        'RS' => array('#####'),                     # SERBIA
        'SC' => array(),                            # SEYCHELLES
        'SL' => array(),                            # SIERRA LEONE
        'SG' => array('######'),                    # SINGAPORE
        'SK' => array('### ##'),                    # SLOVAKIA
        'SI' => array('####'),                      # SLOVENIA
        'SB' => array(),                            # SOLOMON ISLANDS
        'SO' => array(),                            # SOMALIA
        'ZA' => array('####'),                      # SOUTH AFRICA
        'GS' => array(),                            # SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS
        'KR' => array('###-###'),                   # SOUTH KOREA
        'ES' => array('#####'),                     # SPAIN
        'LK' => array('#####'),                     # SRI LANKA
        'SH' => array(),                            # ST. HELENA
        'PM' => array('#####'),                     # ST. PIERRE AND MIQUELON
        'SD' => array('#####'),                     # SUDAN
        'SR' => array(),                            # SURINAME
        'SJ' => array('####'),                      # SVALBARD AND JAN MAYEN ISLANDS
        'SZ' => array('@###'),                      # SWAZILAND
        'SE' => array('### ##', '#####'),           # SWEDEN
        'CH' => array('####'),                      # SWITZERLAND
        'SY' => array(),                            # SYRIAN ARAB REPUBLIC
        'TW' => array('###', '#####'),              # TAIWAN
        'TJ' => array('######'),                    # TAJIKISTAN
        'TZ' => array(),                            # TANZANIA
        'TH' => array('#####'),                     # THAILAND
        'TG' => array(),                            # TOGO
        'TK' => array(),                            # TOKELAU
        'TO' => array(),                            # TONGA
        'TT' => array(),                            # TRINIDAD AND TOBAGO
        'TN' => array('####'),                      # TUNISIA
        'TR' => array('#####'),                     # TURKEY
        'TM' => array('######'),                    # TURKMENISTAN
        'TC' => array('TKC@ 1ZZ'),                  # TURKS AND CAICOS ISLANDS
        'TV' => array(),                            # TUVALU
        'UG' => array(),                            # UGANDA
        'GB' => array('@# #@@', '@** #@@', '@@#* #@@'), # UK
        'UA' => array('#####'),                     # UKRAINE
        'AE' => array(),                            # UNITED ARAB EMIRATES
        'UM' => array(),                            # UNITED STATES MINOR OUTLYING ISLANDS
        'UY' => array('#####'),                     # URUGUAY
        'US' => array('#####', '#####-####'),       # USA
        'UZ' => array('######'),                    # USBEKISTAN
        'VU' => array(),                            # VANUATU
        'VA' => array('00120'),                     # VATICAN CITY STATE
        'VE' => array('####'),                      # VENEZUELA
        'VN' => array('######'),                    # VIET NAM
        'VG' => array('VG11#0'),                    # VIRGIN ISLANDS (BRITISH)
        'VI' => array(),                            # VIRGIN ISLANDS (U.S.)
        'WF' => array('#####'),                     # WALLIS AND FUTUNA ISLANDS
        'EH' => array('#####'),                     # WESTERN SAHARA
        'YE' => array(),                            # YEMEN
        'ZM' => array('#####'),                     # ZAMBIA
        'ZW' => array(),                            # ZIMBABWE
        'SS' => array(),                            # Südsudan
        'KO' => array()                             # Kosovo
    );

    public function isValid($countryCode, $postalCode)
    {
        if(!isset($this->formats[$countryCode]))
        {
            throw new ValidationException(sprintf('Invalid country code: "%s"', $countryCode));
        }
        
        foreach($this->formats[$countryCode] as $format)
        {
            #echo $postalCode . ' - ' . $this->getFormatPattern($format)."\n";
            if(preg_match($this->getFormatPattern($format), $postalCode))
            {
                return true;
            }
        }
        
        if(!count($this->formats[$countryCode]))
        {
            return true;
        }
        
        return false;
    }
    
    public function getFormats($countryCode)
    {
        if(!isset($this->formats[$countryCode]))
        {
            throw new ValidationException(sprintf('Invalid country code: "%s"', $countryCode));
        }
        
        return $this->formats[$countryCode];
    }
    
    public function hasCountry($countryCode)
    {
        return (isset($this->formats[$countryCode]));
    }
    
    protected function getFormatPattern($format)
    {
        $pattern = str_replace('#', '\d', $format);
        $pattern = str_replace('@', '[a-zA-Z]', $pattern);
        $pattern = str_replace('*', '[a-zA-Z0-9]', $pattern);
        return '/^' . $pattern . '$/';
    }
}
