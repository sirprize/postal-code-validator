<?php

/*
 * This file is part of the postal-code-validator package
 *
 * (c) Christian Hoegl <chrigu@sirprize.me>
 */

namespace Sirprize\PostalCodeValidator;

/**
 * Validator
 *
 * @author Christian Hoegl <chrigu@sirprize.me>
 */
class Validator
{
    /**
     * country code: ISO 3166 2-letter code
     * format:
     *     # - numberic 0-9
     *     @ - alpha a-zA-Z
     *
     * @var array
     */
    protected $formats = [
        'AC' => [],                            # ASCENSION
        'AD' => ['AD###', '#####'],            # ANDORRA
        'AE' => [],                            # UNITED ARAB EMIRATES
        'AF' => ['####'],                      # AFGHANISTAN
        'AG' => [],                            # ANTIGUA AND BARBUDA
        'AI' => ['AI-2640'],                   # ANGUILLA
        'AL' => ['####'],                      # ALBANIA
        'AM' => ['####'],                      # ARMENIA
        'AN' => [],                            # NETHERLANDS ANTILLES
        'AO' => [],                            # ANGOLA
        'AQ' => ['BIQQ 1ZZ'],                  # ANTARCTICA
        'AR' => ['####', '@####@@@'],          # ARGENTINA
        'AS' => ['#####', '#####-####'],       # AMERICAN SAMOA
        'AT' => ['####'],                      # AUSTRIA
        'AU' => ['####'],                      # AUSTRALIA
        'AW' => [],                            # ARUBA
        'AX' => ['#####', 'AX-#####'],         # ÅLAND
        'AZ' => ['AZ ####'],                   # AZERBAIJAN

        'BA' => ['#####'],                     # BOSNIA AND HERZEGOWINA
        'BB' => ['BB#####'],                   # BARBADOS
        'BD' => ['####'],                      # BANGLADESH
        'BE' => ['####'],                      # BELGIUM
        'BF' => [],                            # BURKINA FASO
        'BG' => ['####'],                      # BULGARIA
        'BH' => ['###', '####'],               # BAHRAIN
        'BI' => [],                            # BURUNDI
        'BJ' => [],                            # BENIN
        'BL' => ['#####'],                     # SANKT BARTHOLOMÄUS
        'BM' => ['@@ ##', '@@ @@'],            # BERMUDA
        'BN' => ['@@####'],                    # BRUNEI DARUSSALAM
        'BO' => [],                            # BOLIVIA
        'BQ' => [],                            # BONAIRE, SAINT EUSTATIUS, SABA
        'BR' => ['#####-###', '#####'],        # BRAZIL
        'BS' => [],                            # BAHAMAS
        'BT' => ['#####'],                     # BHUTAN
        'BV' => [],                            # BOUVET ISLAND
        'BW' => [],                            # BOTSWANA
        'BY' => ['######'],                    # BELARUS
        'BZ' => [],                            # BELIZE

        'CA' => ['@#@ #@#'],                   # CANADA
        'CC' => ['####'],                      # COCOS (KEELING) ISLANDS
        'CD' => [],                            # CONGO, Democratic Republic of (was Zaire)
        'CF' => [],                            # CENTRAL AFRICAN REPUBLIC
        'CG' => [],                            # CONGO, People's Republic of
        'CH' => ['####'],                      # SWITZERLAND
        'CI' => [],                            # COTE D'IVOIRE
        'CK' => [],                            # COOK ISLANDS
        'CL' => ['#######', '###-####'],       # CHILE
        'CM' => [],                            # CAMEROON
        'CN' => ['######'],                    # CHINA
        'CO' => ['######'],                    # COLOMBIA
        'CR' => ['#####', '#####-####'],       # COSTA RICA
        'CU' => ['#####'],                     # CUBA
        'CV' => ['####'],                      # CAPE VERDE
        'CW' => [],                            # CURACAO
        'CX' => ['####'],                      # CHRISTMAS ISLAND
        'CY' => ['####'],                      # CYPRUS
        'CZ' => ['### ##'],                    # CZECH REPUBLICS

        'DE' => ['#####'],                     # GERMANY
        'DJ' => [],                            # DJIBOUTI
        'DK' => ['####'],                      # DENMARK
        'DM' => [],                            # DOMINICA
        'DO' => ['#####'],                     # DOMINICAN REPUBLIC
        'DZ' => ['#####'],                     # ALGERIA

        'EC' => ['######'],                    # ECUADOR
        'EE' => ['#####'],                     # ESTONIA
        'EG' => ['#####'],                     # EGYPT
        'EH' => [],                            # WESTERN SAHARA
        'ER' => [],                            # ERITREA
        'ES' => ['#####'],                     # SPAIN
        'ET' => ['####'],                      # ETHIOPIA

        'FI' => ['#####'],                     # FINLAND
        'FJ' => [],                            # FIJI
        'FK' => ['FIQQ 1ZZ'],                  # FALKLAND ISLANDS (MALVINAS)
        'FM' => ['#####', '#####-####'],       # MICRONESIA
        'FO' => ['###', 'FO-###'],             # FAROE ISLANDS
        'FR' => ['#####'],                     # FRANCE
        'FX' => [],                            # FRANCE, METROPOLITAN

        'GA' => [],                            # GABON
        'GB' => ['@@## #@@', '@#@ #@@', '@@# #@@', '@@#@ #@@', '@## #@@', '@# #@@'], # GREAT BRITAIN
        'GD' => [],                            # GRENADA
        'GE' => ['####'],                      # GEORGIA
        'GF' => ['973##'],                     # FRENCH GUIANA
        'GG' => ['GY# #@@', 'GY## #@@'],       # Guernsey
        'GH' => [],                            # GHANA
        'GI' => ['GX11 1AA'],                  # GIBRALTAR
        'GL' => ['####'],                      # GREENLAND
        'GM' => [],                            # GAMBIA
        'GN' => ['###'],                       # GUINEA
        'GP' => ['971##'],                     # GUADELOUPE
        'GQ' => [],                            # EQUATORIAL GUINEA
        'GR' => ['### ##'],                    # GREECE
        'GS' => ['SIQQ 1ZZ'],                  # SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS
        'GT' => ['#####'],                     # GUATEMALA
        'GU' => ['#####', '#####-####'],       # GUAM
        'GW' => ['####'],                      # GUINEA-BISSAU
        'GY' => [],                            # GUYANA

        'HK' => [],                            # HONG KONG
        'HM' => [],                            # HEARD AND MC DONALD ISLANDS
        'HN' => ['@@####', '#####'],           # HONDURAS
        'HR' => ['#####'],                     # CROATIA
        'HT' => ['####'],                      # HAITI
        'HU' => ['####'],                      # HUNGARY

        'IC' => ['#####'],                     # THE CANARY ISLANDS
        'ID' => ['#####'],                     # INDONESIA
        'IE' => ['@#* ****'],                  # IRELAND
        'IL' => ['#######'],                   # ISRAEL
        'IM' => ['IM# #@@', 'IM## #@@'],       # Isle of Man
        'IN' => ['######', '### ###'],         # INDIA
        'IO' => ['BBND 1ZZ'],                  # BRITISH INDIAN OCEAN TERRITORY
        'IQ' => ['#####'],                     # IRAQ
        'IR' => ['##########', '#####-#####'], # IRAN
        'IS' => ['###'],                       # ICELAND
        'IT' => ['#####'],                     # ITALY

        'JE' => ['JE# #@@', 'JE## #@@'],       # Jersey
        'JM' => ['##'],                        # JAMAICA
        'JO' => ['#####'],                     # JORDAN
        'JP' => ['###-####', '###'],           # JAPAN

        'KE' => ['#####'],                     # KENYA
        'KG' => ['######'],                    # KYRGYZSTAN
        'KH' => ['#####', '######'],           # CAMBODIA
        'KI' => [],                            # KIRIBATI
        'KM' => [],                            # COMOROS
        'KN' => [],                            # SAINT KITTS AND NEVIS
        'KO' => [],                            # KOSOVO
        'KP' => [],                            # NORTH KOREA
        'KR' => ['###-###', '#####'],          # SOUTH KOREA
        'KW' => ['#####'],                     # KUWAIT
        'KY' => ['KY#-####'],                  # CAYMAN ISLANDS
        'KZ' => ['######'],                    # KAZAKHSTAN

        'LA' => ['#####'],                     # LAO PEOPLE'S DEMOCRATIC REPUBLIC
        'LB' => ['#####', '#### ####'],        # LEBANON
        'LC' => ['LC## ###'],                  # SAINT LUCIA
        'LI' => ['####'],                      # LIECHTENSTEIN
        'LK' => ['#####'],                     # SRI LANKA
        'LR' => ['####'],                      # LIBERIA
        'LS' => ['###'],                       # LESOTHO
        'LT' => ['LT-#####', '#####'],         # LITHUANIA
        'LU' => ['L-####', '####'],            # LUXEMBOURG
        'LV' => ['LV-####'],                   # LATVIA
        'LY' => [],                            # LIBYAN ARAB JAMAHIRIYA

        'MA' => ['#####'],                     # MOROCCO
        'MC' => ['980##'],                     # MONACO
        'MD' => ['MD####', 'MD-####'],         # MOLDOVA
        'ME' => ['#####'],                     # MONTENEGRO
        'MF' => ['97150'],                     # SAINT-MARTIN
        'MG' => ['###'],                       # MADAGASCAR
        'MH' => ['#####', '#####-####'],       # MARSHALL ISLANDS
        'MK' => ['####'],                      # MACEDONIA
        'ML' => [],                            # MALI
        'MM' => ['#####'],                     # MYANMAR
        'MN' => ['#####'],                     # MONGOLIA
        'MO' => [],                            # MACAU
        'MP' => ['#####', '#####-####'],       # SAIPAN, NORTHERN MARIANA ISLANDS
        'MQ' => ['972##'],                     # MARTINIQUE
        'MR' => [],                            # MAURITANIA
        'MS' => [],                            # MONTSERRAT
        'MT' => ['@@@ ####'],                  # MALTA
        'MU' => ['#####'],                     # MAURITIUS
        'MV' => ['#####'],                     # MALDIVES
        'MW' => [],                            # MALAWI
        'MX' => ['#####'],                     # MEXICO
        'MY' => ['#####'],                     # MALAYSIA
        'MZ' => ['####'],                      # MOZAMBIQUE

        'NA' => [],                            # NAMIBIA
        'NC' => ['988##'],                     # NEW CALEDONIA
        'NE' => ['####'],                      # NIGER
        'NF' => ['####'],                      # NORFOLK ISLAND
        'NG' => ['######'],                    # NIGERIA
        'NI' => ['#####'],                     # NICARAGUA
        'NL' => ['####@@', '#### @@'],         # NETHERLANDS
        'NO' => ['####'],                      # NORWAY
        'NP' => ['#####'],                     # NEPAL
        'NR' => [],                            # NAURU
        'NU' => [],                            # NIUE
        'NZ' => ['####'],                      # NEW ZEALAND

        'OM' => ['###'],                       # OMAN

        'PA' => ['####'],                      # PANAMA
        'PE' => ['#####', 'PE #####'],         # PERU
        'PF' => ['987##'],                     # FRENCH POLYNESIA
        'PG' => ['###'],                       # PAPUA NEW GUINEA
        'PH' => ['####'],                      # PHILIPPINES
        'PK' => ['#####'],                     # PAKISTAN
        'PL' => ['##-###'],                    # POLAND
        'PM' => ['97500'],                     # ST. PIERRE AND MIQUELON
        'PN' => ['PCRN 1ZZ'],                  # PITCAIRN
        'PR' => ['#####', '#####-####'],       # PUERTO RICO
        'PS' => ['###'],                       # PALESTINIAN TERRITORY
        'PT' => ['####-###'],                  # PORTUGAL
        'PW' => ['#####', '#####-####'],       # PALAU
        'PY' => ['####'],                      # PARAGUAY

        'QA' => [],                            # QATAR

        'RE' => ['974##'],                     # REUNION
        'RO' => ['######'],                    # ROMANIA
        'RS' => ['#####'],                     # SERBIA
        'RU' => ['######'],                    # RUSSIA
        'RW' => [],                            # RWANDA

        'SA' => ['#####', '#####-####'],       # SAUDI ARABIA
        'SB' => [],                            # SOLOMON ISLANDS
        'SC' => [],                            # SEYCHELLES
        'SD' => ['#####'],                     # SUDAN
        'SE' => ['### ##'],                    # SWEDEN
        'SG' => ['######'],                    # SINGAPORE
        'SH' => ['@@@@ 1ZZ'],                  # ST. HELENA
        'SI' => ['####', 'SI-####'],           # SLOVENIA
        'SJ' => ['####'],                      # SVALBARD AND JAN MAYEN ISLANDS
        'SK' => ['### ##'],                    # SLOVAKIA
        'SL' => [],                            # SIERRA LEONE
        'SM' => ['4789#'],                     # SAN MARINO
        'SN' => ['#####'],                     # SENEGAL
        'SO' => ['@@ #####'],                  # SOMALIA
        'SR' => [],                            # SURINAME
        'SS' => ['#####'],                     # SOUTH SUDAN
        'ST' => [],                            # SAO TOME AND PRINCIPE
        'SV' => ['####'],                      # EL SALVADOR
        'SX' => [],                            # SINT MAARTEN
        'SY' => [],                            # SYRIAN ARAB REPUBLIC
        'SZ' => ['@###'],                      # SWAZILAND

        'TA' => [],                            # TRISTAN DA CUNHA
        'TC' => ['TKCA 1ZZ'],                  # TURKS AND CAICOS ISLANDS
        'TD' => [],                            # CHAD
        'TF' => [],                            # FRENCH SOUTHERN TERRITORIES
        'TG' => [],                            # TOGO
        'TH' => ['#####'],                     # THAILAND
        'TJ' => ['######'],                    # TAJIKISTAN
        'TK' => [],                            # TOKELAU
        'TL' => [],                            # EAST TIMOR
        'TM' => ['######'],                    # TURKMENISTAN
        'TN' => ['####'],                      # TUNISIA
        'TO' => [],                            # TONGA
        'TR' => ['#####'],                     # TURKEY
        'TT' => ['######'],                    # TRINIDAD AND TOBAGO
        'TV' => [],                            # TUVALU
        'TW' => ['###', '###-##'],             # TAIWAN
        'TZ' => ['#####'],                     # TANZANIA

        'UA' => ['#####'],                     # UKRAINE
        'UG' => [],                            # UGANDA
        'UM' => [],                            # UNITED STATES MINOR OUTLYING ISLANDS
        'US' => ['#####', '#####-####'],       # USA
        'UY' => ['#####'],                     # URUGUAY
        'UZ' => ['######'],                    # USBEKISTAN

        'VA' => ['00120'],                     # VATICAN CITY STATE
        'VC' => ['VC####'],                    # SAINT VINCENT AND THE GRENADINES
        'VE' => ['####', '####-@'],            # VENEZUELA
        'VG' => ['VG####'],                    # VIRGIN ISLANDS (BRITISH)
        'VI' => ['#####', '#####-####'],       # VIRGIN ISLANDS (U.S.)
        'VN' => ['######'],                    # VIETNAM
        'VU' => [],                            # VANUATU

        'WF' => ['986##'],                     # WALLIS AND FUTUNA ISLANDS
        'WS' => ['WS####'],                    # SAMOA

        'XK' => ['#####'],                     # KOSOVO

        'YE' => [],                            # YEMEN
        'YT' => ['976##'],                     # MAYOTTE

        'ZA' => ['####'],                      # SOUTH AFRICA
        'ZM' => ['#####'],                     # ZAMBIA
        'ZW' => [],                            # ZIMBABWE
    ];

    /**
     * @param string $countryCode
     * @param string $postalCode
     * @param bool $ignoreSpaces
     *
     * @return bool
     * @throws \Sirprize\PostalCodeValidator\ValidationException
     */
    public function isValid(string $countryCode, string $postalCode, bool $ignoreSpaces = false): bool
    {
        if (!isset($this->formats[$countryCode])) {
            throw new ValidationException(sprintf('Invalid country code: "%s"', $countryCode));
        }

        foreach($this->formats[$countryCode] as $format) {
            if (preg_match($this->getFormatPattern($format, $ignoreSpaces), $postalCode)) {
                return true;
            }
        }

        if (!count($this->formats[$countryCode])) {
            return true;
        }

        return false;
    }

    /**
     * @param string $countryCode
     *
     * @return array
     * @throws \Sirprize\PostalCodeValidator\ValidationException
     */
    public function getFormats(string $countryCode): array
    {
        if (!isset($this->formats[$countryCode])) {
            throw new ValidationException(sprintf('Invalid country code: "%s"', $countryCode));
        }

        return $this->formats[$countryCode];
    }

    /**
     * @param string $countryCode
     *
     * @return bool
     */
    public function hasCountry(string $countryCode): bool
    {
        return isset($this->formats[$countryCode]);
    }

    /**
     * @param string $format
     * @param bool $ignoreSpaces
     *
     * @return string
     */
    protected function getFormatPattern(string $format, bool $ignoreSpaces = false): string
    {
        $pattern = str_replace('#', '\d', $format);
        $pattern = str_replace('@', '[a-zA-Z]', $pattern);
        $pattern = str_replace('*', '[a-zA-Z0-9]', $pattern);

        if ($ignoreSpaces === true) {
            $pattern = str_replace(' ', ' ?', $pattern);
        }

        return '/^' . $pattern . '$/';
    }
}
