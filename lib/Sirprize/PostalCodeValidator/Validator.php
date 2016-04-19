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
     */
    protected $formats = array(
        'AC' => array(),                            # Ascension
        'AD' => array(),                            # ANDORRA
        'AE' => array(),                            # UNITED ARAB EMIRATES
        'AF' => array(),                            # AFGHANISTAN
        'AG' => array(),                            # ANTIGUA AND BARBUDA
        'AI' => array(),                            # ANGUILLA
        'AL' => array(),                            # ALBANIA
        'AM' => array('######'),                    # ARMENIA
        'AN' => array(),                            # NETHERLANDS ANTILLES
        'AO' => array(),                            # ANGOLA
        'AR' => array('####'),                      # ARGENTINA
        'AS' => array('#####'),                     # AMERICAN SAMOA
        'AT' => array('####'),                      # AUSTRIA
        'AU' => array('####'),                      # AUSTRALIA
        'AQ' => array(),                            # ANTARCTICA
        'AW' => array(),                            # ARUBA
        'AX' => array(),                            # Åland
        'AZ' => array('######', '####'),            # AZERBAIJAN

        'BA' => array('#####'),                     # BOSNIA AND HERZEGOWINA
        'BB' => array(),                            # BARBADOS
        'BD' => array('####'),                      # BANGLADESH
        'BE' => array('####'),                      # BELGIUM
        'BF' => array(),                            # BURKINA FASO
        'BG' => array('####'),                      # BULGARIA
        'BH' => array(),                            # BAHRAIN
        'BI' => array(),                            # BURUNDI
        'BJ' => array(),                            # BENIN
        'BL' => array('#####'),                     # Sankt Bartholomäus
        'BM' => array(),                            # BERMUDA
        'BN' => array('@@####'),                    # BRUNEI DARUSSALAM
        'BO' => array(),                            # BOLIVIA
        'BQ' => array(),                            # Karibische Niederlande
        'BR' => array('#####-###', '#####'),        # BRAZIL
        'BS' => array(),                            # BAHAMAS
        'BT' => array(),                            # BHUTAN
        'BV' => array(),                            # BOUVET ISLAND
        'BW' => array(),                            # BOTSWANA
        'BY' => array('######'),                    # BELARUS
        'BZ' => array(),                            # BELIZE

        'CA' => array('@#@ #@#'),                   # CANADA
        'CC' => array(),                            # COCOS (KEELING) ISLANDS
        'CD' => array(),                            # CONGO, Democratic Republic of (was Zaire)
        'CF' => array(),                            # CENTRAL AFRICAN REPUBLIC
        'CG' => array(),                            # CONGO, People's Republic of
        'CH' => array('####'),                      # SWITZERLAND
        'CI' => array(),                            # COTE D'IVOIRE
        'CK' => array(),                            # COOK ISLANDS
        'CL' => array(),                            # CHILE
        'CM' => array(),                            # CAMEROON
        'CN' => array('######'),                    # CHINA
        'CO' => array(),                            # COLOMBIA
        'CR' => array(),                            # COSTA RICA
        'CU' => array('#####'),                     # CUBA
        'CV' => array(),                            # CAPE VERDE
        'CW' => array(),                            # Curaçao
        'CX' => array(),                            # CHRISTMAS ISLAND
        'CY' => array('####'),                      # Cyprus
        'CZ' => array('### ##'),                    # Czech Republic

        'DE' => array('#####'),                     # GERMANY
        'DJ' => array(),                            # DJIBOUTI
        'DK' => array('####'),                      # DENMARK
        'DM' => array(),                            # DOMINICA
        'DO' => array(),                            # DOMINICAN REPUBLIC
        'DZ' => array('#####'),                     # ALGERIA

        'EC' => array(),                            # ECUADOR
        'EE' => array('#####'),                     # ESTONIA
        'EG' => array(),                            # EGYPT
        'EH' => array(),                            # WESTERN SAHARA
        'ER' => array(),                            # ERITREA
        'ES' => array('#####'),                     # SPAIN
        'ET' => array(),                            # ETHIOPIA

        'FI' => array('#####'),                     # FINLAND
        'FJ' => array(),                            # FIJI
        'FK' => array(),                            # FALKLAND ISLANDS (MALVINAS)
        'FM' => array(),                            # MICRONESIA
        'FO' => array(),                            # FAROE ISLANDS
        'FR' => array('#####'),                     # FRANCE
        'FX' => array(),                            # FRANCE, METROPOLITAN

        'GA' => array(),                            # GABON
        'GB' => array('@@## #@@', '@#@ #@@', '@@# #@@', '@@#@ #@@', '@## #@@', '@# #@@'), # UK
        'GD' => array(),                            # GRENADA
        'GE' => array('####'),                      # GEORGIA
        'GF' => array('#####'),                     # FRENCH GUIANA
        'GG' => array('@@# #@@'),                            # Guernsey
        'GH' => array(),                            # GHANA
        'GI' => array(),                            # GIBRALTAR
        'GL' => array('####'),                      # GREENLAND
        'GM' => array(),                            # GAMBIA
        'GN' => array(),                            # GUINEA
        'GP' => array('#####'),                     # GUADELOUPE
        'GQ' => array(),                            # EQUATORIAL GUINEA
        'GS' => array(),                            # SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS
        'GR' => array('### ##'),                    # GREECE
        'GT' => array(),                            # GUATEMALA
        'GU' => array('#####'),                     # GUAM
        'GW' => array(),                            # GUINEA-BISSAU
        'GY' => array(),                            # GUYANA

        'HK' => array(),                            # HONG KONG
        'HM' => array(),                            # HEARD AND MC DONALD ISLANDS
        'HN' => array(),                            # HONDURAS
        'HR' => array('#####'),                     # CROATIA
        'HT' => array(),                            # HAITI
        'HU' => array('####'),                      # HUNGARY

        'IC' => array('#####'),                     # THE CANARY ISLANDS
        'ID' => array('#####'),                     # INDONESIA
        'IE' => array(),                            # IRELAND
        'IL' => array('#####'),                     # ISRAEL
        'IM' => array(),                            # Isle of Man
        'IN' => array('######'),                    # INDIA
        'IO' => array(),                            # BRITISH INDIAN OCEAN TERRITORY
        'IQ' => array(),                            # IRAQ
        'IR' => array(),                            # IRAN
        'IS' => array('###'),                       # ICELAND
        'IT' => array('#####'),                     # ITALY

        'JE' => array('@@# #@@'),                   # Jersey
        'JM' => array(),                            # JAMAICA
        'JO' => array(),                            # JORDAN
        'JP' => array('###-####', '#######', '###'),# JAPAN

        'KE' => array('#####'),                     # KENYA
        'KG' => array('######'),                    # KYRGYZSTAN
        'KH' => array(),                            # CAMBODIA
        'KI' => array(),                            # KIRIBATI
        'KM' => array(),                            # COMOROS
        'KN' => array(),                            # SAINT KITTS AND NEVIS
        'KO' => array(),                            # Kosovo
        'KP' => array(),                            # NORTH KOREA
        'KR' => array('###-###'),                   # SOUTH KOREA
        'KW' => array(),                            # KUWAIT
        'KY' => array(),                            # CAYMAN ISLANDS
        'KZ' => array('######'),                    # KAZAKHSTAN

        'LA' => array(),                            # LAO PEOPLE'S DEMOCRATIC REPUBLIC
        'LB' => array(),                            # LEBANON
        'LC' => array(),                            # SAINT LUCIA
        'LI' => array('####'),                      # LIECHTENSTEIN
        'LK' => array(),                            # SRI LANKA
        'LR' => array(),                            # LIBERIA
        'LS' => array(),                            # LESOTHO
        'LT' => array('#####'),                     # LITHUANIA
        'LU' => array('####'),                      # LUXEMBOURG
        'LV' => array('####'),                      # LATVIA
        'LY' => array(),                            # LIBYAN ARAB JAMAHIRIYA

        'MA' => array('#####'),                     # MOROCCO
        'MC' => array('#####'),                     # MONACO
        'MD' => array('####'),                      # MOLDOVA
        'ME' => array('#####'),                     # MONTENEGRO
        'MF' => array(),                            # Saint-Martin
        'MG' => array('###'),                       # MADAGASCAR
        'MH' => array('#####'),                     # MARSHALL ISLANDS
        'MK' => array('####'),                      # MACEDONIA
        'ML' => array(),                            # MALI
        'MM' => array(),                            # MYANMAR
        'MN' => array('######'),                    # MONGOLIA
        'MO' => array(),                            # MACAU
        'MP' => array('#####'),                     # SAIPAN, NORTHERN MARIANA ISLANDS
        'MQ' => array('#####'),                     # MARTINIQUE
        'MR' => array(),                            # MAURITANIA
        'MS' => array(),                            # MONTSERRAT
        'MT' => array('@@ ###', '@@ ##'),           # MALTA
        'MU' => array(),                            # MAURITIUS
        'MV' => array('####', '#####'),             # MALDIVES
        'MW' => array(),                            # MALAWI
        'MX' => array('#####'),                     # MEXICO
        'MY' => array('#####'),                     # MALAYSIA
        'MZ' => array(),                            # MOZAMBIQUE

        'NA' => array(),                            # NAMIBIA
        'NC' => array(),                            # NEW CALEDONIA
        'NE' => array(),                            # NIGER
        'NF' => array(),                            # NORFOLK ISLAND
        'NG' => array(),                            # NIGERIA
        'NI' => array(),                            # NICARAGUA
        'NL' => array('#### @@'),                   # NETHERLANDS
        'NO' => array('####'),                      # NORWAY
        'NP' => array(),                            # NEPAL
        'NR' => array(),                            # NAURU
        'NU' => array(),                            # NIUE
        'NZ' => array(),                            # NEW ZEALAND

        'OM' => array(),                            # OMAN

        'PA' => array(),                            # PANAMA
        'PE' => array(),                            # PERU
        'PF' => array(),                            # FRENCH POLYNESIA
        'PG' => array(),                            # PAPUA NEW GUINEA
        'PH' => array('####'),                      # PHILIPPINES
        'PK' => array('#####'),                     # PAKISTAN
        'PL' => array('##-###'),                    # POLAND
        'PM' => array(),                            # ST. PIERRE AND MIQUELON
        'PN' => array(),                            # PITCAIRN
        'PR' => array('#####'),                     # PUERTO RICO
        'PS' => array(),                            # PALESTINIAN TERRITORY
        'PT' => array('####-###', '####'),          # PORTUGAL
        'PW' => array(),                            # PALAU
        'PY' => array(),                            # PARAGUAY

        'QA' => array(),                            # QATAR

        'RE' => array('#####'),                     # REUNION
        'RO' => array('######'),                    # ROMANIA
        'RS' => array('#####'),                     # SERBIA
        'RU' => array('######'),                    # RUSSIA
        'RW' => array(),                            # RWANDA

        'SA' => array(),                            # SAUDI ARABIA
        'SB' => array(),                            # SOLOMON ISLANDS
        'SC' => array(),                            # SEYCHELLES
        'SD' => array(),                            # SUDAN
        'SE' => array('### ##'),                    # SWEDEN
        'SG' => array('######'),                    # SINGAPORE
        'SH' => array(),                            # ST. HELENA
        'SI' => array('####'),                      # SLOVENIA
        'SJ' => array(),                            # SVALBARD AND JAN MAYEN ISLANDS
        'SK' => array('### ##'),                    # SLOVAKIA
        'SL' => array(),                            # SIERRA LEONE
        'SM' => array(),                            # SAN MARINO
        'SN' => array(),                            # SENEGAL
        'SO' => array(),                            # SOMALIA
        'SR' => array(),                            # SURINAME
        'SS' => array(),                            # Südsudan
        'ST' => array(),                            # SAO TOME AND PRINCIPE
        'SV' => array(),                            # EL SALVADOR
        'SX' => array(),                            # Sint Maarten
        'SY' => array(),                            # SYRIAN ARAB REPUBLIC
        'SZ' => array('@###'),                      # SWAZILAND

        'TA' => array(),                            # Tristan da Cunha
        'TC' => array(),                            # TURKS AND CAICOS ISLANDS
        'TD' => array(),                            # CHAD
        'TF' => array(),                            # FRENCH SOUTHERN TERRITORIES
        'TG' => array(),                            # TOGO
        'TH' => array('#####'),                     # THAILAND
        'TJ' => array('######'),                    # TAJIKISTAN
        'TK' => array(),                            # TOKELAU
        'TL' => array(),                            # EAST TIMOR
        'TM' => array('######'),                    # TURKMENISTAN
        'TN' => array(),                            # TUNISIA
        'TO' => array(),                            # TONGA
        'TR' => array('#####'),                     # TURKEY
        'TT' => array(),                            # TRINIDAD AND TOBAGO
        'TV' => array(),                            # TUVALU
        'TW' => array('###', '#####'),              # TAIWAN
        'TZ' => array(),                            # TANZANIA

        'UA' => array('#####'),                     # UKRAINE
        'UG' => array(),                            # UGANDA
        'UM' => array(),                            # UNITED STATES MINOR OUTLYING ISLANDS
        'US' => array('#####', '#####-####'),       # USA
        'UY' => array('#####'),                     # URUGUAY
        'UZ' => array('######'),                    # USBEKISTAN

        'VA' => array(),                            # VATICAN CITY STATE
        'VC' => array(),                            # SAINT VINCENT AND THE GRENADINES
        'VE' => array(),                            # VENEZUELA
        'VG' => array(),                            # VIRGIN ISLANDS (BRITISH)
        'VI' => array('#####'),                     # VIRGIN ISLANDS (U.S.)
        'VN' => array(),                            # VIETNAM
        'VU' => array(),                            # VANUATU

        'WF' => array(),                            # WALLIS AND FUTUNA ISLANDS
        'WS' => array(),                            # SAMOA

        'YE' => array(),                            # YEMEN
        'YT' => array(),                            # MAYOTTE

        'ZA' => array('####'),                      # SOUTH AFRICA
        'ZM' => array(),                            # ZAMBIA
        'ZW' => array(),                            # ZIMBABWE
    );

    public function isValid($countryCode, $postalCode, $ignoreSpaces = false)
    {
        if(!isset($this->formats[$countryCode]))
        {
            throw new ValidationException(sprintf('Invalid country code: "%s"', $countryCode));
        }
        
        foreach($this->formats[$countryCode] as $format)
        {
            #echo $postalCode . ' - ' . $this->getFormatPattern($format)."\n";
            if(preg_match($this->getFormatPattern($format, $ignoreSpaces), $postalCode))
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
    
    protected function getFormatPattern($format, $ignoreSpaces = false)
    {
        $pattern = str_replace('#', '\d', $format);
        $pattern = str_replace('@', '[a-zA-Z]', $pattern);

        if ($ignoreSpaces)
        {
            $pattern = str_replace(' ', ' ?', $pattern);
        }

        return '/^' . $pattern . '$/';
    }
}
