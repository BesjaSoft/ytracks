<?php

class Countries extends CComponent {

    private static $_baseFlagsPath = 'images/flags/';

    private static function _getCountries() {
        $country['AFG'] = array('iso2' => 'AF', 'name' => 'Afghanistan, Islamic Republic ');
        $country['ALA'] = array('iso2' => 'AX', 'name' => 'Ã…land Islands');
        $country['ALB'] = array('iso2' => 'AL', 'name' => 'Albania, Republic of');
        $country['DZA'] = array('iso2' => 'DZ', 'name' => 'Algeria, People\'s Democratic R');
        $country['ASM'] = array('iso2' => 'AS', 'name' => 'American Samoa');
        $country['AND'] = array('iso2' => 'AD', 'name' => 'Andorra, Principality of');
        $country['AGO'] = array('iso2' => 'AO', 'name' => 'Angola, Republic of');
        $country['AIA'] = array('iso2' => 'AI', 'name' => 'Anguilla');
        $country['ATA'] = array('iso2' => 'AQ', 'name' => 'Antarctica (the territory South)');
        $country['ATG'] = array('iso2' => 'AG', 'name' => 'Antigua and Barbuda');
        $country['ARG'] = array('iso2' => 'AR', 'name' => 'Argentina, Argentine Republic');
        $country['ARM'] = array('iso2' => 'AM', 'name' => 'Armenia, Republic of');
        $country['ABW'] = array('iso2' => 'AW', 'name' => 'Aruba');
        $country['AUS'] = array('iso2' => 'AU', 'name' => 'Australia, Commonwealth of');
        $country['AUT'] = array('iso2' => 'AT', 'name' => 'Austria, Republic of');
        $country['AZE'] = array('iso2' => 'AZ', 'name' => 'Azerbaijan, Republic of');
        $country['BHS'] = array('iso2' => 'BS', 'name' => 'Bahamas, Commonwealth of the');
        $country['BHR'] = array('iso2' => 'BH', 'name' => 'Bahrain, Kingdom of');
        $country['BGD'] = array('iso2' => 'BD', 'name' => 'Bangladesh, People\'s Republic ');
        $country['BRB'] = array('iso2' => 'BB', 'name' => 'Barbados');
        $country['BLR'] = array('iso2' => 'BY', 'name' => 'Belarus, Republic of');
        $country['BEL'] = array('iso2' => 'BE', 'name' => 'Belgium, Kingdom of');
        $country['BLZ'] = array('iso2' => 'BZ', 'name' => 'Belize');
        $country['BEN'] = array('iso2' => 'BJ', 'name' => 'Benin, Republic of');
        $country['BMU'] = array('iso2' => 'BM', 'name' => 'Bermuda');
        $country['BTN'] = array('iso2' => 'BT', 'name' => 'Bhutan, Kingdom of');
        $country['BOL'] = array('iso2' => 'BO', 'name' => 'Bolivia, Republic of');
        $country['BIH'] = array('iso2' => 'BA', 'name' => 'Bosnia and Herzegovina');
        $country['BWA'] = array('iso2' => 'BW', 'name' => 'Botswana, Republic of');
        $country['BVT'] = array('iso2' => 'BV', 'name' => 'Bouvet Island (Bouvetoya)');
        $country['BRA'] = array('iso2' => 'BR', 'name' => 'Brazil, Federative Republic of');
        $country['IOT'] = array('iso2' => 'IO', 'name' => 'British Indian Ocean Territory');
        $country['VGB'] = array('iso2' => 'VG', 'name' => 'British Virgin Islands');
        $country['BRN'] = array('iso2' => 'BN', 'name' => 'Brunei Darussalam');
        $country['BGR'] = array('iso2' => 'BG', 'name' => 'Bulgaria, Republic of');
        $country['BFA'] = array('iso2' => 'BF', 'name' => 'Burkina Faso');
        $country['BDI'] = array('iso2' => 'BI', 'name' => 'Burundi, Republic of');
        $country['KHM'] = array('iso2' => 'KH', 'name' => 'Cambodia, Kingdom of');
        $country['CMR'] = array('iso2' => 'CM', 'name' => 'Cameroon, Republic of');
        $country['CAN'] = array('iso2' => 'CA', 'name' => 'Canada');
        $country['CPV'] = array('iso2' => 'CV', 'name' => 'Cape Verde, Republic of');
        $country['CYM'] = array('iso2' => 'KY', 'name' => 'Cayman Islands');
        $country['CAF'] = array('iso2' => 'CF', 'name' => 'Central African Republic');
        $country['TCD'] = array('iso2' => 'TD', 'name' => 'Chad, Republic of');
        $country['CHL'] = array('iso2' => 'CL', 'name' => 'Chile, Republic of');
        $country['CHN'] = array('iso2' => 'CN', 'name' => 'China, People\'s Republic of');
        $country['CXR'] = array('iso2' => 'CX', 'name' => 'Christmas Island');
        $country['CCK'] = array('iso2' => 'CC', 'name' => 'Cocos (Keeling) Islands');
        $country['COL'] = array('iso2' => 'CO', 'name' => 'Colombia, Republic of');
        $country['COM'] = array('iso2' => 'KM', 'name' => 'Comoros, Union of the');
        $country['COD'] = array('iso2' => 'CD', 'name' => 'Congo, Democratic Republic of ');
        $country['COG'] = array('iso2' => 'CG', 'name' => 'Congo, Republic of the');
        $country['COK'] = array('iso2' => 'CK', 'name' => 'Cook Islands');
        $country['CRI'] = array('iso2' => 'CR', 'name' => 'Costa Rica, Republic of');
        $country['CIV'] = array('iso2' => 'CI', 'name' => 'Cote d\'Ivoire, Republic of');
        $country['HRV'] = array('iso2' => 'HR', 'name' => 'Croatia, Republic of');
        $country['CUB'] = array('iso2' => 'CU', 'name' => 'Cuba, Republic of');
        $country['CYP'] = array('iso2' => 'CY', 'name' => 'Cyprus, Republic of');
        $country['CZE'] = array('iso2' => 'CZ', 'name' => 'Czech Republic');
        $country['DNK'] = array('iso2' => 'DK', 'name' => 'Denmark, Kingdom of');
        $country['DJI'] = array('iso2' => 'DJ', 'name' => 'Djibouti, Republic of');
        $country['DMA'] = array('iso2' => 'DM', 'name' => 'Dominica, Commonwealth of');
        $country['DOM'] = array('iso2' => 'DO', 'name' => 'Dominican Republic');
        $country['ECU'] = array('iso2' => 'EC', 'name' => 'Ecuador, Republic of');
        $country['EGY'] = array('iso2' => 'EG', 'name' => 'Egypt, Arab Republic of');
        $country['SLV'] = array('iso2' => 'SV', 'name' => 'El Salvador, Republic of');
        $country['GNQ'] = array('iso2' => 'GQ', 'name' => 'Equatorial Guinea, Republic of');
        $country['ERI'] = array('iso2' => 'ER', 'name' => 'Eritrea, State of');
        $country['EST'] = array('iso2' => 'EE', 'name' => 'Estonia, Republic of');
        $country['ETH'] = array('iso2' => 'ET', 'name' => 'Ethiopia, Federal Democratic R');
        $country['EUR'] = array('iso2' => 'EU', 'name' => 'European Union');
        $country['FRO'] = array('iso2' => 'FO', 'name' => 'Faroe Islands');
        $country['FLK'] = array('iso2' => 'FK', 'name' => 'Falkland Islands (Malvinas)');
        $country['FJI'] = array('iso2' => 'FJ', 'name' => 'Fiji, Republic of the Fiji Isl');
        $country['FIN'] = array('iso2' => 'FI', 'name' => 'Finland, Republic of');
        $country['FRA'] = array('iso2' => 'FR', 'name' => 'France, French Republic');
        $country['GUF'] = array('iso2' => 'GF', 'name' => 'French Guiana');
        $country['PYF'] = array('iso2' => 'PF', 'name' => 'French Polynesia');
        $country['ATF'] = array('iso2' => 'TF', 'name' => 'French Southern Territories');
        $country['GAB'] = array('iso2' => 'GA', 'name' => 'Gabon, Gabonese Republic');
        $country['GMB'] = array('iso2' => 'GM', 'name' => 'Gambia, Republic of the');
        $country['GEO'] = array('iso2' => 'GE', 'name' => 'Georgia');
        $country['DEU'] = array('iso2' => 'DE', 'name' => 'Germany, Federal Republic of');
        $country['GHA'] = array('iso2' => 'GH', 'name' => 'Ghana, Republic of');
        $country['GIB'] = array('iso2' => 'GI', 'name' => 'Gibraltar');
        $country['GRC'] = array('iso2' => 'GR', 'name' => 'Greece, Hellenic Republic');
        $country['GRL'] = array('iso2' => 'GL', 'name' => 'Greenland');
        $country['GRD'] = array('iso2' => 'GD', 'name' => 'Grenada');
        $country['GLP'] = array('iso2' => 'GP', 'name' => 'Guadeloupe');
        $country['GUM'] = array('iso2' => 'GU', 'name' => 'Guam');
        $country['GTM'] = array('iso2' => 'GT', 'name' => 'Guatemala, Republic of');
        $country['GGY'] = array('iso2' => 'GG', 'name' => 'Guernsey, Bailiwick of');
        $country['GIN'] = array('iso2' => 'GN', 'name' => 'Guinea, Republic of');
        $country['GNB'] = array('iso2' => 'GW', 'name' => 'Guinea-Bissau, Republic of');
        $country['GUY'] = array('iso2' => 'GY', 'name' => 'Guyana, Co-operative Republic ');
        $country['HTI'] = array('iso2' => 'HT', 'name' => 'Haiti, Republic of');
        $country['HMD'] = array('iso2' => 'HM', 'name' => 'Heard Island and McDonald Isla');
        $country['VAT'] = array('iso2' => 'VA', 'name' => 'Holy See (Vatican City State)');
        $country['HND'] = array('iso2' => 'HN', 'name' => 'Honduras, Republic of');
        $country['HKG'] = array('iso2' => 'HK', 'name' => 'Hong Kong, Special Administrat');
        $country['HUN'] = array('iso2' => 'HU', 'name' => 'Hungary, Republic of');
        $country['ISL'] = array('iso2' => 'IS', 'name' => 'Iceland, Republic of');
        $country['IND'] = array('iso2' => 'IN', 'name' => 'India, Republic of');
        $country['IDN'] = array('iso2' => 'ID', 'name' => 'Indonesia, Republic of');
        $country['IRN'] = array('iso2' => 'IR', 'name' => 'Iran, Islamic Republic of');
        $country['IRQ'] = array('iso2' => 'IQ', 'name' => 'Iraq, Republic of');
        $country['IRL'] = array('iso2' => 'IE', 'name' => 'Ireland');
        $country['IMN'] = array('iso2' => 'IM', 'name' => 'Isle of Man');
        $country['ISR'] = array('iso2' => 'IL', 'name' => 'Israel, State of');
        $country['ITA'] = array('iso2' => 'IT', 'name' => 'Italy, Italian Republic');
        $country['JAM'] = array('iso2' => 'JM', 'name' => 'Jamaica');
        $country['JPN'] = array('iso2' => 'JP', 'name' => 'Japan');
        $country['JEY'] = array('iso2' => 'JE', 'name' => 'Jersey, Bailiwick of');
        $country['JOR'] = array('iso2' => 'JO', 'name' => 'Jordan, Hashemite Kingdom of');
        $country['KAZ'] = array('iso2' => 'KZ', 'name' => 'Kazakhstan, Republic of');
        $country['KEN'] = array('iso2' => 'KE', 'name' => 'Kenya, Republic of');
        $country['KIR'] = array('iso2' => 'KI', 'name' => 'Kiribati, Republic of');
        $country['PRK'] = array('iso2' => 'KP', 'name' => 'Korea, Democratic People\'s Rep');
        $country['KOR'] = array('iso2' => 'KR', 'name' => 'Korea, Republic of');
        $country['KWT'] = array('iso2' => 'KW', 'name' => 'Kuwait, State of');
        $country['KGZ'] = array('iso2' => 'KG', 'name' => 'Kyrgyz Republic');
        $country['LAO'] = array('iso2' => 'LA', 'name' => 'Lao People\'s Democratic Republ');
        $country['LVA'] = array('iso2' => 'LV', 'name' => 'Latvia, Republic of');
        $country['LBN'] = array('iso2' => 'LB', 'name' => 'Lebanon, Lebanese Republic');
        $country['LSO'] = array('iso2' => 'LS', 'name' => 'Lesotho, Kingdom of');
        $country['LBR'] = array('iso2' => 'LR', 'name' => 'Liberia, Republic of');
        $country['LBY'] = array('iso2' => 'LY', 'name' => 'Libyan Arab Jamahiriya');
        $country['LIE'] = array('iso2' => 'LI', 'name' => 'Liechtenstein, Principality of');
        $country['LTU'] = array('iso2' => 'LT', 'name' => 'Lithuania, Republic of');
        $country['LUX'] = array('iso2' => 'LU', 'name' => 'Luxembourg, Grand Duchy of');
        $country['MAC'] = array('iso2' => 'MO', 'name' => 'Macao, Special Administrative ');
        $country['MKD'] = array('iso2' => 'MK', 'name' => 'Macedonia, the former Yugoslav');
        $country['MDG'] = array('iso2' => 'MG', 'name' => 'Madagascar, Republic of');
        $country['MWI'] = array('iso2' => 'MW', 'name' => 'Malawi, Republic of');
        $country['MYS'] = array('iso2' => 'MY', 'name' => 'Malaysia');
        $country['MDV'] = array('iso2' => 'MV', 'name' => 'Maldives, Republic of');
        $country['MLI'] = array('iso2' => 'ML', 'name' => 'Mali, Republic of');
        $country['MLT'] = array('iso2' => 'MT', 'name' => 'Malta, Republic of');
        $country['MHL'] = array('iso2' => 'MH', 'name' => 'Marshall Islands, Republic of ');
        $country['MTQ'] = array('iso2' => 'MQ', 'name' => 'Martinique');
        $country['MRT'] = array('iso2' => 'MR', 'name' => 'Mauritania, Islamic Republic o');
        $country['MUS'] = array('iso2' => 'MU', 'name' => 'Mauritius, Republic of');
        $country['MYT'] = array('iso2' => 'YT', 'name' => 'Mayotte');
        $country['MEX'] = array('iso2' => 'MX', 'name' => 'Mexico, United Mexican States');
        $country['FSM'] = array('iso2' => 'FM', 'name' => 'Micronesia, Federated States o');
        $country['MDA'] = array('iso2' => 'MD', 'name' => 'Moldova, Republic of');
        $country['MCO'] = array('iso2' => 'MC', 'name' => 'Monaco, Principality of');
        $country['MNG'] = array('iso2' => 'MN', 'name' => 'Mongolia');
        $country['MNE'] = array('iso2' => 'ME', 'name' => 'Montenegro, Republic of');
        $country['MSR'] = array('iso2' => 'MS', 'name' => 'Montserrat');
        $country['MAR'] = array('iso2' => 'MA', 'name' => 'Morocco, Kingdom of');
        $country['MOZ'] = array('iso2' => 'MZ', 'name' => 'Mozambique, Republic of');
        $country['MMR'] = array('iso2' => 'MM', 'name' => 'Myanmar, Union of');
        $country['NAM'] = array('iso2' => 'NA', 'name' => 'Namibia, Republic of');
        $country['NRU'] = array('iso2' => 'NR', 'name' => 'Nauru, Republic of');
        $country['NPL'] = array('iso2' => 'NP', 'name' => 'Nepal, State of');
        $country['ANT'] = array('iso2' => 'AN', 'name' => 'Netherlands Antilles');
        $country['NLD'] = array('iso2' => 'NL', 'name' => 'Netherlands, Kingdom of the');
        $country['NCL'] = array('iso2' => 'NC', 'name' => 'New Caledonia');
        $country['NZL'] = array('iso2' => 'NZ', 'name' => 'New Zealand');
        $country['NIC'] = array('iso2' => 'NI', 'name' => 'Nicaragua, Republic of');
        $country['NER'] = array('iso2' => 'NE', 'name' => 'Niger, Republic of');
        $country['NGA'] = array('iso2' => 'NG', 'name' => 'Nigeria, Federal Republic of');
        $country['NIU'] = array('iso2' => 'NU', 'name' => 'Niue');
        $country['NFK'] = array('iso2' => 'NF', 'name' => 'Norfolk Island');
        $country['MNP'] = array('iso2' => 'MP', 'name' => 'Northern Mariana Islands, Comm');
        $country['NOR'] = array('iso2' => 'NO', 'name' => 'Norway, Kingdom of');
        $country['OMN'] = array('iso2' => 'OM', 'name' => 'Oman, Sultanate of');
        $country['PAK'] = array('iso2' => 'PK', 'name' => 'Pakistan, Islamic Republic of');
        $country['PLW'] = array('iso2' => 'PW', 'name' => 'Palau, Republic of');
        $country['PSE'] = array('iso2' => 'PS', 'name' => 'Palestinian Territory, Occupie');
        $country['PAN'] = array('iso2' => 'PA', 'name' => 'Panama, Republic of');
        $country['PNG'] = array('iso2' => 'PG', 'name' => 'Papua New Guinea, Independent ');
        $country['PRY'] = array('iso2' => 'PY', 'name' => 'Paraguay, Republic of');
        $country['PER'] = array('iso2' => 'PE', 'name' => 'Peru, Republic of');
        $country['PHL'] = array('iso2' => 'PH', 'name' => 'Philippines, Republic of the');
        $country['PCN'] = array('iso2' => 'PN', 'name' => 'Pitcairn Islands');
        $country['POL'] = array('iso2' => 'PL', 'name' => 'Poland, Republic of');
        $country['PRT'] = array('iso2' => 'PT', 'name' => 'Portugal, Portuguese Republic');
        $country['PRI'] = array('iso2' => 'PR', 'name' => 'Puerto Rico, Commonwealth of');
        $country['QAT'] = array('iso2' => 'QA', 'name' => 'Qatar, State of');
        $country['REU'] = array('iso2' => 'RE', 'name' => 'Reunion');
        $country['ROU'] = array('iso2' => 'RO', 'name' => 'Romania');
        $country['RUS'] = array('iso2' => 'RU', 'name' => 'Russian Federation');
        $country['RWA'] = array('iso2' => 'RW', 'name' => 'Rwanda, Republic of');
        $country['BLM'] = array('iso2' => 'BL', 'name' => 'Saint Barthelemy');
        $country['SHN'] = array('iso2' => 'SH', 'name' => 'Saint Helena');
        $country['KNA'] = array('iso2' => 'KN', 'name' => 'Saint Kitts and Nevis, Federat');
        $country['LCA'] = array('iso2' => 'LC', 'name' => 'Saint Lucia');
        $country['MAF'] = array('iso2' => 'MF', 'name' => 'Saint Martin');
        $country['SPM'] = array('iso2' => 'PM', 'name' => 'Saint Pierre and Miquelon');
        $country['VCT'] = array('iso2' => 'VC', 'name' => 'Saint Vincent and the Grenadin');
        $country['WSM'] = array('iso2' => 'WS', 'name' => 'Samoa, Independent State of');
        $country['SMR'] = array('iso2' => 'SM', 'name' => 'San Marino, Republic of');
        $country['STP'] = array('iso2' => 'ST', 'name' => 'Sao Tome and Principe, Democra');
        $country['SAU'] = array('iso2' => 'SA', 'name' => 'Saudi Arabia, Kingdom of');
        $country['SCO'] = array('iso2' => 'ST', 'name' => 'Scotland');
        $country['SEN'] = array('iso2' => 'SN', 'name' => 'Senegal, Republic of');
        $country['SRB'] = array('iso2' => 'RS', 'name' => 'Serbia, Republic of');
        $country['SYC'] = array('iso2' => 'SC', 'name' => 'Seychelles, Republic of');
        $country['SLE'] = array('iso2' => 'SL', 'name' => 'Sierra Leone, Republic of');
        $country['SGP'] = array('iso2' => 'SG', 'name' => 'Singapore, Republic of');
        $country['SVK'] = array('iso2' => 'SK', 'name' => 'Slovakia (Slovak Republic)');
        $country['SVN'] = array('iso2' => 'SI', 'name' => 'Slovenia, Republic of');
        $country['SLB'] = array('iso2' => 'SB', 'name' => 'Solomon Islands');
        $country['SOM'] = array('iso2' => 'SO', 'name' => 'Somalia, Somali Republic');
        $country['ZAF'] = array('iso2' => 'ZA', 'name' => 'South Africa, Republic of');
        $country['SGS'] = array('iso2' => 'GS', 'name' => 'South Georgia and the South Sa');
        $country['ESP'] = array('iso2' => 'ES', 'name' => 'Spain, Kingdom of');
        $country['LKA'] = array('iso2' => 'LK', 'name' => 'Sri Lanka, Democratic Socialis');
        $country['SDN'] = array('iso2' => 'SD', 'name' => 'Sudan, Republic of');
        $country['SUR'] = array('iso2' => 'SR', 'name' => 'Suriname, Republic of');
        $country['SJM'] = array('iso2' => 'SJ', 'name' => 'Svalbard & Jan Mayen Islands');
        $country['SWZ'] = array('iso2' => 'SZ', 'name' => 'Swaziland, Kingdom of');
        $country['SWE'] = array('iso2' => 'SE', 'name' => 'Sweden, Kingdom of');
        $country['CHE'] = array('iso2' => 'CH', 'name' => 'Switzerland, Swiss Confederati');
        $country['SYR'] = array('iso2' => 'SY', 'name' => 'Syrian Arab Republic');
        $country['TWN'] = array('iso2' => 'TW', 'name' => 'Taiwan');
        $country['TJK'] = array('iso2' => 'TJ', 'name' => 'Tajikistan, Republic of');
        $country['TZA'] = array('iso2' => 'TZ', 'name' => 'Tanzania, United Republic of');
        $country['THA'] = array('iso2' => 'TH', 'name' => 'Thailand, Kingdom of');
        $country['TLS'] = array('iso2' => 'TL', 'name' => 'Timor-Leste, Democratic Republ');
        $country['TGO'] = array('iso2' => 'TG', 'name' => 'Togo, Togolese Republic');
        $country['TKL'] = array('iso2' => 'TK', 'name' => 'Tokelau');
        $country['TON'] = array('iso2' => 'TO', 'name' => 'Tonga, Kingdom of');
        $country['TTO'] = array('iso2' => 'TT', 'name' => 'Trinidad and Tobago, Republic ');
        $country['TUN'] = array('iso2' => 'TN', 'name' => 'Tunisia, Tunisian Republic');
        $country['TUR'] = array('iso2' => 'TR', 'name' => 'Turkey, Republic of');
        $country['TKM'] = array('iso2' => 'TM', 'name' => 'Turkmenistan');
        $country['TCA'] = array('iso2' => 'TC', 'name' => 'Turks and Caicos Islands');
        $country['TUV'] = array('iso2' => 'TV', 'name' => 'Tuvalu');
        $country['UGA'] = array('iso2' => 'UG', 'name' => 'Uganda, Republic of');
        $country['UKR'] = array('iso2' => 'UA', 'name' => 'Ukraine');
        $country['ARE'] = array('iso2' => 'AE', 'name' => 'United Arab Emirates');
        $country['GBR'] = array('iso2' => 'GB', 'name' => 'United Kingdom of Great Britain');
        $country['USA'] = array('iso2' => 'US', 'name' => 'United States of America');
        $country['UMI'] = array('iso2' => 'UM', 'name' => 'United States Minor Outlying I');
        $country['VIR'] = array('iso2' => 'VI', 'name' => 'United States Virgin Islands');
        $country['URY'] = array('iso2' => 'UY', 'name' => 'Uruguay, Eastern Republic of');
        $country['UZB'] = array('iso2' => 'UZ', 'name' => 'Uzbekistan, Republic of');
        $country['VUT'] = array('iso2' => 'VU', 'name' => 'Vanuatu, Republic of');
        $country['VEN'] = array('iso2' => 'VE', 'name' => 'Venezuela, Bolivarian Republic');
        $country['VNM'] = array('iso2' => 'VN', 'name' => 'Vietnam, Socialist Republic of');
        $country['WLF'] = array('iso2' => 'WF', 'name' => 'Wallis and Futuna');
        $country['ESH'] = array('iso2' => 'EH', 'name' => 'Western Sahara');
        $country['WUN'] = array('iso2' => 'UN', "name" => 'World');
        $country['YEM'] = array('iso2' => 'YE', 'name' => 'Yemen');
        $country['ZMB'] = array('iso2' => 'ZM', 'name' => 'Zambia, Republic of');
        $country['ZWE'] = array('iso2' => 'ZW', 'name' => 'Zimbabwe, Republic of');

        return $country;
    }

    public static function findList() {
        $countries = Countries::_getCountries();
        $list[] = array('id' => '', 'name' => '- Select a Country -');
        foreach ($countries as $key => $country) {
            $list[] = array('id' => $key, 'name' => $country['name']);
        }
        return CHtml::listData($list, 'id', 'name');
    }

    private static function convertIso2to3($iso_code_2) {
        $convert2to3['EU'] = 'EUR';
        $convert2to3['AF'] = 'AFG';
        $convert2to3['AX'] = 'ALA';
        $convert2to3['AL'] = 'ALB';
        $convert2to3['DZ'] = 'DZA';
        $convert2to3['AS'] = 'ASM';
        $convert2to3['AD'] = 'AND';
        $convert2to3['AO'] = 'AGO';
        $convert2to3['AI'] = 'AIA';
        $convert2to3['AQ'] = 'ATA';
        $convert2to3['AG'] = 'ATG';
        $convert2to3['AR'] = 'ARG';
        $convert2to3['AM'] = 'ARM';
        $convert2to3['AW'] = 'ABW';
        $convert2to3['AU'] = 'AUS';
        $convert2to3['AT'] = 'AUT';
        $convert2to3['AZ'] = 'AZE';
        $convert2to3['BS'] = 'BHS';
        $convert2to3['BH'] = 'BHR';
        $convert2to3['BD'] = 'BGD';
        $convert2to3['BB'] = 'BRB';
        $convert2to3['BY'] = 'BLR';
        $convert2to3['BE'] = 'BEL';
        $convert2to3['BZ'] = 'BLZ';
        $convert2to3['BJ'] = 'BEN';
        $convert2to3['BM'] = 'BMU';
        $convert2to3['BT'] = 'BTN';
        $convert2to3['BO'] = 'BOL';
        $convert2to3['BA'] = 'BIH';
        $convert2to3['BW'] = 'BWA';
        $convert2to3['BV'] = 'BVT';
        $convert2to3['BR'] = 'BRA';
        $convert2to3['IO'] = 'IOT';
        $convert2to3['BN'] = 'BRN';
        $convert2to3['BG'] = 'BGR';
        $convert2to3['BF'] = 'BFA';
        $convert2to3['BI'] = 'BDI';
        $convert2to3['KH'] = 'KHM';
        $convert2to3['CM'] = 'CMR';
        $convert2to3['CA'] = 'CAN';
        $convert2to3['CV'] = 'CPV';
        $convert2to3['KY'] = 'CYM';
        $convert2to3['CF'] = 'CAF';
        $convert2to3['TD'] = 'TCD';
        $convert2to3['CL'] = 'CHL';
        $convert2to3['CN'] = 'CHN';
        $convert2to3['CX'] = 'CXR';
        $convert2to3['CC'] = 'CCK';
        $convert2to3['CO'] = 'COL';
        $convert2to3['KM'] = 'COM';
        $convert2to3['CG'] = 'COG';
        $convert2to3['CD'] = 'COD';
        $convert2to3['CK'] = 'COK';
        $convert2to3['CR'] = 'CRI';
        $convert2to3['CI'] = 'CIV';
        $convert2to3['HR'] = 'HRV';
        $convert2to3['CU'] = 'CUB';
        $convert2to3['CY'] = 'CYP';
        $convert2to3['CZ'] = 'CZE';
        $convert2to3['DK'] = 'DNK';
        $convert2to3['DJ'] = 'DJI';
        $convert2to3['DM'] = 'DMA';
        $convert2to3['DO'] = 'DOM';
        $convert2to3['EC'] = 'ECU';
        $convert2to3['EG'] = 'EGY';
        $convert2to3['SV'] = 'SLV';
        $convert2to3['GQ'] = 'GNQ';
        $convert2to3['ER'] = 'ERI';
        $convert2to3['EE'] = 'EST';
        $convert2to3['ET'] = 'ETH';
        $convert2to3['FK'] = 'FLK';
        $convert2to3['FO'] = 'FRO';
        $convert2to3['FJ'] = 'FJI';
        $convert2to3['FI'] = 'FIN';
        $convert2to3['FR'] = 'FRA';
        $convert2to3['GF'] = 'GUF';
        $convert2to3['PF'] = 'PYF';
        $convert2to3['TF'] = 'ATF';
        $convert2to3['GA'] = 'GAB';
        $convert2to3['GM'] = 'GMB';
        $convert2to3['GE'] = 'GEO';
        $convert2to3['DE'] = 'DEU';
        $convert2to3['GH'] = 'GHA';
        $convert2to3['GI'] = 'GIB';
        $convert2to3['GR'] = 'GRC';
        $convert2to3['GL'] = 'GRL';
        $convert2to3['GD'] = 'GRD';
        $convert2to3['GP'] = 'GLP';
        $convert2to3['GU'] = 'GUM';
        $convert2to3['GT'] = 'GTM';
        $convert2to3['GG'] = 'GGY';
        $convert2to3['GN'] = 'GIN';
        $convert2to3['GW'] = 'GNB';
        $convert2to3['GY'] = 'GUY';
        $convert2to3['HT'] = 'HTI';
        $convert2to3['HM'] = 'HMD';
        $convert2to3['VA'] = 'VAT';
        $convert2to3['HN'] = 'HND';
        $convert2to3['HK'] = 'HKG';
        $convert2to3['HU'] = 'HUN';
        $convert2to3['IS'] = 'ISL';
        $convert2to3['IN'] = 'IND';
        $convert2to3['ID'] = 'IDN';
        $convert2to3['IR'] = 'IRN';
        $convert2to3['IQ'] = 'IRQ';
        $convert2to3['IE'] = 'IRL';
        $convert2to3['IM'] = 'IMM';
        $convert2to3['IL'] = 'ISR';
        $convert2to3['IT'] = 'ITA';
        $convert2to3['JM'] = 'JAM';
        $convert2to3['JP'] = 'JPN';
        $convert2to3['JE'] = 'JEY';
        $convert2to3['JO'] = 'JOR';
        $convert2to3['KZ'] = 'KAZ';
        $convert2to3['KE'] = 'KEN';
        $convert2to3['KI'] = 'KIR';
        $convert2to3['KP'] = 'PRK';
        $convert2to3['KR'] = 'KOR';
        $convert2to3['KW'] = 'KWT';
        $convert2to3['KG'] = 'KGZ';
        $convert2to3['LA'] = 'LAO';
        $convert2to3['LV'] = 'LVA';
        $convert2to3['LB'] = 'LBN';
        $convert2to3['LS'] = 'LSO';
        $convert2to3['LR'] = 'LBR';
        $convert2to3['LY'] = 'LBY';
        $convert2to3['LI'] = 'LIE';
        $convert2to3['LT'] = 'LTU';
        $convert2to3['LU'] = 'LUX';
        $convert2to3['MO'] = 'MAC';
        $convert2to3['MK'] = 'MKD';
        $convert2to3['MG'] = 'MDG';
        $convert2to3['MW'] = 'MWI';
        $convert2to3['MY'] = 'MYS';
        $convert2to3['MV'] = 'MDV';
        $convert2to3['ML'] = 'MLI';
        $convert2to3['MT'] = 'MLT';
        $convert2to3['MH'] = 'MHL';
        $convert2to3['MQ'] = 'MTQ';
        $convert2to3['MR'] = 'MRT';
        $convert2to3['MU'] = 'MUS';
        $convert2to3['YT'] = 'MYT';
        $convert2to3['MX'] = 'MEX';
        $convert2to3['FM'] = 'FSM';
        $convert2to3['MD'] = 'MDA';
        $convert2to3['MC'] = 'MCO';
        $convert2to3['MN'] = 'MNG';
        $convert2to3['ME'] = 'MNE';
        $convert2to3['MS'] = 'MSR';
        $convert2to3['MA'] = 'MAR';
        $convert2to3['MZ'] = 'MOZ';
        $convert2to3['MM'] = 'MMR';
        $convert2to3['NA'] = 'NAM';
        $convert2to3['NR'] = 'NRU';
        $convert2to3['NP'] = 'NPL';
        $convert2to3['NL'] = 'NLD';
        $convert2to3['AN'] = 'ANT';
        $convert2to3['NC'] = 'NCL';
        $convert2to3['NZ'] = 'NZL';
        $convert2to3['NI'] = 'NIC';
        $convert2to3['NE'] = 'NER';
        $convert2to3['NG'] = 'NGA';
        $convert2to3['NU'] = 'NIU';
        $convert2to3['NF'] = 'NFK';
        $convert2to3['MP'] = 'MNP';
        $convert2to3['NO'] = 'NOR';
        $convert2to3['OM'] = 'OMN';
        $convert2to3['PK'] = 'PAK';
        $convert2to3['PW'] = 'PLW';
        $convert2to3['PS'] = 'PSE';
        $convert2to3['PA'] = 'PAN';
        $convert2to3['PG'] = 'PNG';
        $convert2to3['PY'] = 'PRY';
        $convert2to3['PE'] = 'PER';
        $convert2to3['PH'] = 'PHL';
        $convert2to3['PN'] = 'PCN';
        $convert2to3['PL'] = 'POL';
        $convert2to3['PT'] = 'PRT';
        $convert2to3['PR'] = 'PRI';
        $convert2to3['QA'] = 'QAT';
        $convert2to3['RW'] = 'RWA';
        $convert2to3['BL'] = 'BLM';
        $convert2to3['SH'] = 'SHN';
        $convert2to3['KN'] = 'KNA';
        $convert2to3['LC'] = 'LCA';
        $convert2to3['MT'] = 'MAF';
        $convert2to3['PM'] = 'SPM';
        $convert2to3['VC'] = 'VCT';
        $convert2to3['WS'] = 'WSM';
        // R
        $convert2to3['RE'] = 'REU';
        $convert2to3['RO'] = 'ROU';
        $convert2to3['RU'] = 'RUS';
        $convert2to3['RS'] = 'SRB';
        // S
        $convert2to3['SA'] = 'SAU';
        $convert2to3['SB'] = 'SLB';
        $convert2to3['SC'] = 'SYC';
        $convert2to3['SD'] = 'SDN';
        $convert2to3['SE'] = 'SWE';
        $convert2to3['SG'] = 'SGP';
        $convert2to3['SI'] = 'SVN';
        $convert2to3['SJ'] = 'SJM';
        $convert2to3['SK'] = 'SVK';
        $convert2to3['SL'] = 'SLE';
        $convert2to3['SM'] = 'SMR';
        $convert2to3['SN'] = 'SEN';
        $convert2to3['SO'] = 'SOM';
        $convert2to3['SR'] = 'SUR';
        $convert2to3['SS'] = 'SCO';
        $convert2to3['ST'] = 'STP';
        $convert2to3['SZ'] = 'SWZ';
        // T
        $convert2to3['ZA'] = 'ZAF';
        $convert2to3['GS'] = 'SGS';
        $convert2to3['ES'] = 'ESP';
        $convert2to3['LK'] = 'LKA';
        $convert2to3['CH'] = 'CHE';
        $convert2to3['SY'] = 'SYR';
        $convert2to3['TW'] = 'TWN';
        $convert2to3['TJ'] = 'TJK';
        $convert2to3['TZ'] = 'TZA';
        $convert2to3['TH'] = 'THA';
        $convert2to3['TL'] = 'TLS';
        $convert2to3['TG'] = 'TGO';
        $convert2to3['TK'] = 'TKL';
        $convert2to3['TO'] = 'TON';
        $convert2to3['TT'] = 'TTO';
        $convert2to3['TN'] = 'TUN';
        $convert2to3['TR'] = 'TUR';
        $convert2to3['TM'] = 'TKM';
        $convert2to3['TC'] = 'TCA';
        $convert2to3['TV'] = 'TUV';
        $convert2to3['UG'] = 'UGA';
        $convert2to3['UA'] = 'UKR';
        $convert2to3['AE'] = 'ARE';
        $convert2to3['GB'] = 'GBR';
        $convert2to3['US'] = 'USA';
        $convert2to3['UM'] = 'UMI';
        $convert2to3['UN'] = 'WUN';
        $convert2to3['UY'] = 'URY';
        $convert2to3['UZ'] = 'UZB';
        $convert2to3['VU'] = 'VUT';
        $convert2to3['VA'] = 'VAT';
        $convert2to3['VE'] = 'VEN';
        $convert2to3['VN'] = 'VNM';
        $convert2to3['VG'] = 'VGB';
        $convert2to3['VI'] = 'VIR';
        $convert2to3['WF'] = 'WLF';
        $convert2to3['EH'] = 'ESH';
        $convert2to3['YE'] = 'YEM';
        $convert2to3['YU'] = 'YUG';
        $convert2to3['ZM'] = 'ZMB';
        $convert2to3['ZW'] = 'ZWE';
        if (isset($convert2to3[$iso_code_2])) {
            return $convert2to3[$iso_code_2];
        }
        else
            return null;
    }

    private static function convertIso3to2($iso_code_3) {
        $convert3to2['EUR'] = 'EU';
        $convert3to2['AFG'] = 'AF';
        $convert3to2['ALA'] = 'AX';
        $convert3to2['ALB'] = 'AL';
        $convert3to2['DZA'] = 'DZ';
        $convert3to2['ASM'] = 'AS';
        $convert3to2['AND'] = 'AD';
        $convert3to2['AGO'] = 'AO';
        $convert3to2['AIA'] = 'AI';
        $convert3to2['ATA'] = 'AQ';
        $convert3to2['ATG'] = 'AG';
        $convert3to2['ARG'] = 'AR';
        $convert3to2['ARM'] = 'AM';
        $convert3to2['ABW'] = 'AW';
        $convert3to2['AUS'] = 'AU';
        $convert3to2['AUT'] = 'AT';
        $convert3to2['AZE'] = 'AZ';
        $convert3to2['BHS'] = 'BS';
        $convert3to2['BHR'] = 'BH';
        $convert3to2['BGD'] = 'BD';
        $convert3to2['BRB'] = 'BB';
        $convert3to2['BLR'] = 'BY';
        $convert3to2['BEL'] = 'BE';
        $convert3to2['BLZ'] = 'BZ';
        $convert3to2['BEN'] = 'BJ';
        $convert3to2['BMU'] = 'BM';
        $convert3to2['BTN'] = 'BT';
        $convert3to2['BOL'] = 'BO';
        $convert3to2['BIH'] = 'BA';
        $convert3to2['BWA'] = 'BW';
        $convert3to2['BVT'] = 'BV';
        $convert3to2['BRA'] = 'BR';
        $convert3to2['IOT'] = 'IO';
        $convert3to2['BRN'] = 'BN';
        $convert3to2['BGR'] = 'BG';
        $convert3to2['BFA'] = 'BF';
        $convert3to2['BDI'] = 'BI';
        $convert3to2['KHM'] = 'KH';
        $convert3to2['CMR'] = 'CM';
        $convert3to2['CAN'] = 'CA';
        $convert3to2['CPV'] = 'CV';
        $convert3to2['CYM'] = 'KY';
        $convert3to2['CAF'] = 'CF';
        $convert3to2['TCD'] = 'TD';
        $convert3to2['CHL'] = 'CL';
        $convert3to2['CHN'] = 'CN';
        $convert3to2['CXR'] = 'CX';
        $convert3to2['CCK'] = 'CC';
        $convert3to2['COL'] = 'CO';
        $convert3to2['COM'] = 'KM';
        $convert3to2['COG'] = 'CG';
        $convert3to2['COD'] = 'CD';
        $convert3to2['COK'] = 'CK';
        $convert3to2['CRI'] = 'CR';
        $convert3to2['CIV'] = 'CI';
        $convert3to2['HRV'] = 'HR';
        $convert3to2['CUB'] = 'CU';
        $convert3to2['CYP'] = 'CY';
        $convert3to2['CZE'] = 'CZ';
        $convert3to2['DNK'] = 'DK';
        $convert3to2['DJI'] = 'DJ';
        $convert3to2['DMA'] = 'DM';
        $convert3to2['DOM'] = 'DO';
        $convert3to2['ECU'] = 'EC';
        $convert3to2['EGY'] = 'EG';
        $convert3to2['SLV'] = 'SV';
        $convert3to2['GNQ'] = 'GQ';
        $convert3to2['ERI'] = 'ER';
        $convert3to2['EST'] = 'EE';
        $convert3to2['ETH'] = 'ET';
        $convert3to2['FLK'] = 'FK';
        $convert3to2['FRO'] = 'FO';
        $convert3to2['FJI'] = 'FJ';
        $convert3to2['FIN'] = 'FI';
        $convert3to2['FRA'] = 'FR';
        $convert3to2['GUF'] = 'GF';
        $convert3to2['PYF'] = 'PF';
        $convert3to2['ATF'] = 'TF';
        $convert3to2['GAB'] = 'GA';
        $convert3to2['GMB'] = 'GM';
        $convert3to2['GEO'] = 'GE';
        $convert3to2['DEU'] = 'DE';
        $convert3to2['GHA'] = 'GH';
        $convert3to2['GIB'] = 'GI';
        $convert3to2['GRC'] = 'GR';
        $convert3to2['GRL'] = 'GL';
        $convert3to2['GRD'] = 'GD';
        $convert3to2['GLP'] = 'GP';
        $convert3to2['GUM'] = 'GU';
        $convert3to2['GTM'] = 'GT';
        $convert3to2['GGY'] = 'GG';
        $convert3to2['GIN'] = 'GN';
        $convert3to2['GNB'] = 'GW';
        $convert3to2['GUY'] = 'GY';
        $convert3to2['HTI'] = 'HT';
        $convert3to2['HMD'] = 'HM';
        $convert3to2['VAT'] = 'VA';
        $convert3to2['HND'] = 'HN';
        $convert3to2['HKG'] = 'HK';
        $convert3to2['HUN'] = 'HU';
        $convert3to2['ISL'] = 'IS';
        $convert3to2['IND'] = 'IN';
        $convert3to2['IDN'] = 'ID';
        $convert3to2['IRN'] = 'IR';
        $convert3to2['IRQ'] = 'IQ';
        $convert3to2['IRL'] = 'IE';
        $convert3to2['IMM'] = 'IM';
        $convert3to2['ISR'] = 'IL';
        $convert3to2['ITA'] = 'IT';
        $convert3to2['JAM'] = 'JM';
        $convert3to2['JPN'] = 'JP';
        $convert3to2['JEY'] = 'JE';
        $convert3to2['JOR'] = 'JO';
        $convert3to2['KAZ'] = 'KZ';
        $convert3to2['KEN'] = 'KE';
        $convert3to2['KIR'] = 'KI';
        $convert3to2['PRK'] = 'KP';
        $convert3to2['KOR'] = 'KR';
        $convert3to2['KWT'] = 'KW';
        $convert3to2['KGZ'] = 'KG';
        $convert3to2['LAO'] = 'LA';
        $convert3to2['LVA'] = 'LV';
        $convert3to2['LBN'] = 'LB';
        $convert3to2['LSO'] = 'LS';
        $convert3to2['LBR'] = 'LR';
        $convert3to2['LBY'] = 'LY';
        $convert3to2['LIE'] = 'LI';
        $convert3to2['LTU'] = 'LT';
        $convert3to2['LUX'] = 'LU';
        $convert3to2['MAC'] = 'MO';
        $convert3to2['MKD'] = 'MK';
        $convert3to2['MDG'] = 'MG';
        $convert3to2['MWI'] = 'MW';
        $convert3to2['MYS'] = 'MY';
        $convert3to2['MDV'] = 'MV';
        $convert3to2['MLI'] = 'ML';
        $convert3to2['MLT'] = 'MT';
        $convert3to2['MHL'] = 'MH';
        $convert3to2['MTQ'] = 'MQ';
        $convert3to2['MRT'] = 'MR';
        $convert3to2['MUS'] = 'MU';
        $convert3to2['MYT'] = 'YT';
        $convert3to2['MEX'] = 'MX';
        $convert3to2['FSM'] = 'FM';
        $convert3to2['MDA'] = 'MD';
        $convert3to2['MCO'] = 'MC';
        $convert3to2['MNG'] = 'MN';
        $convert3to2['MNE'] = 'ME';
        $convert3to2['MSR'] = 'MS';
        $convert3to2['MAR'] = 'MA';
        $convert3to2['MOZ'] = 'MZ';
        $convert3to2['MMR'] = 'MM';
        $convert3to2['NAM'] = 'NA';
        $convert3to2['NRU'] = 'NR';
        $convert3to2['NPL'] = 'NP';
        $convert3to2['NLD'] = 'NL';
        $convert3to2['ANT'] = 'AN';
        $convert3to2['NCL'] = 'NC';
        $convert3to2['NZL'] = 'NZ';
        $convert3to2['NIC'] = 'NI';
        $convert3to2['NER'] = 'NE';
        $convert3to2['NGA'] = 'NG';
        $convert3to2['NIU'] = 'NU';
        $convert3to2['NFK'] = 'NF';
        $convert3to2['MNP'] = 'MP';
        $convert3to2['NOR'] = 'NO';
        $convert3to2['OMN'] = 'OM';
        $convert3to2['PAK'] = 'PK';
        $convert3to2['PLW'] = 'PW';
        $convert3to2['PSE'] = 'PS';
        $convert3to2['PAN'] = 'PA';
        $convert3to2['PNG'] = 'PG';
        $convert3to2['PRY'] = 'PY';
        $convert3to2['PER'] = 'PE';
        $convert3to2['PHL'] = 'PH';
        $convert3to2['PCN'] = 'PN';
        $convert3to2['POL'] = 'PL';
        $convert3to2['PRT'] = 'PT';
        $convert3to2['PRI'] = 'PR';
        $convert3to2['QAT'] = 'QA';
        $convert3to2['REU'] = 'RE';
        $convert3to2['ROU'] = 'RO';
        $convert3to2['RUS'] = 'RU';
        $convert3to2['RWA'] = 'RW';
        $convert3to2['BLM'] = 'BL';
        $convert3to2['SHN'] = 'SH';
        $convert3to2['KNA'] = 'KN';
        $convert3to2['LCA'] = 'LC';
        $convert3to2['MAF'] = 'MT';
        $convert3to2['SPM'] = 'PM';
        $convert3to2['VCT'] = 'VC';
        $convert3to2['WSM'] = 'WS';
        $convert3to2['SMR'] = 'SM';
        $convert3to2['STP'] = 'ST';
        $convert3to2['SAU'] = 'SA';
        $convert3to2['SEN'] = 'SN';
        $convert3to2['SRB'] = 'RS';
        $convert3to2['SYC'] = 'SC';
        $convert3to2['SLE'] = 'SL';
        $convert3to2['SGP'] = 'SG';
        $convert3to2['SVK'] = 'SK';
        $convert3to2['SVN'] = 'SI';
        $convert3to2['SLB'] = 'SB';
        $convert3to2['SOM'] = 'SO';
        $convert3to2['ZAF'] = 'ZA';
        $convert3to2['SGS'] = 'GS';
        $convert3to2['ESP'] = 'ES';
        $convert3to2['LKA'] = 'LK';
        $convert3to2['SCO'] = 'SS';
        $convert3to2['SDN'] = 'SD';
        $convert3to2['SUR'] = 'SR';
        $convert3to2['SJM'] = 'SJ';
        $convert3to2['SWZ'] = 'SZ';
        $convert3to2['SWE'] = 'SE';
        $convert3to2['CHE'] = 'CH';
        $convert3to2['SYR'] = 'SY';
        $convert3to2['TWN'] = 'TW';
        $convert3to2['TJK'] = 'TJ';
        $convert3to2['TZA'] = 'TZ';
        $convert3to2['THA'] = 'TH';
        $convert3to2['TLS'] = 'TL';
        $convert3to2['TGO'] = 'TG';
        $convert3to2['TKL'] = 'TK';
        $convert3to2['TON'] = 'TO';
        $convert3to2['TTO'] = 'TT';
        $convert3to2['TUN'] = 'TN';
        $convert3to2['TUR'] = 'TR';
        $convert3to2['TKM'] = 'TM';
        $convert3to2['TCA'] = 'TC';
        $convert3to2['TUV'] = 'TV';
        $convert3to2['UGA'] = 'UG';
        $convert3to2['UKR'] = 'UA';
        $convert3to2['ARE'] = 'AE';
        $convert3to2['GBR'] = 'GB';
        $convert3to2['USA'] = 'US';
        $convert3to2['UMI'] = 'UM';
        $convert3to2['URY'] = 'UY';
        $convert3to2['UZB'] = 'UZ';
        $convert3to2['VUT'] = 'VU';
        $convert3to2['VAT'] = 'VA';
        $convert3to2['VEN'] = 'VE';
        $convert3to2['VNM'] = 'VN';
        $convert3to2['VGB'] = 'VG';
        $convert3to2['VIR'] = 'VI';
        $convert3to2['WLF'] = 'WF';
        $convert3to2['WUN'] = 'UN';
        $convert3to2['ESH'] = 'EH';
        $convert3to2['YEM'] = 'YE';
        $convert3to2['YUG'] = 'YU';
        $convert3to2['ZMB'] = 'ZM';
        $convert3to2['ZWE'] = 'ZW';

        if (isset($convert3to2[$iso_code_3])) {
            return $convert3to2[$iso_code_3];
        } else {
            return null;
        }
    }

    public static function convertToIso3($country) {
        $result = '';
        $length = strlen($country);
        switch ($length) {
            case 3:
                // @TODO: length is ok, check the value:
                $result = $country;
                break;
            case 2:
                $result = self::convertInternationalCarCodes(trim($country));
                break;
            case 1:
                $result = self::convertInternationalCarCodes(trim($country));
                break;
        }
        return $result;
    }

    public static function getFlag($iso_code_3, $attributes = null) {
        $iso2 = Countries::convertIso3to2($iso_code_3);
        $path = null;

        if (!empty($iso2)) {
            if (empty($attributes)) {
                $path = Countries::$_baseFlagsPath . strtolower($iso2) . '.png';
            } else {
                if (!empty($attributes["size"])) {
                    $path = Countries::$_baseFlagsPath . '/' . $attributes["size"] . '/' . strtolower($iso2) . '.png';
                }
            }
        }

        return $path;
    }

    public static function getFlagImage($countrycode, $attributes = null) {
        $src = Countries::getFlag($countrycode);
        if (!isset($countrycode) || ($countrycode == '')) {
            return '';
        }
        //$html = '<img src="'.$src.'" alt="'.Countries::getCountryName($countrycode).'" title="'.Countries::getCountryName($countrycode).'" '.$attributes.'/>';
        return CHtml::image($src);
    }

    public static function getCountryName($iso3) {
        $countries = Countries::_getCountries();
        return $countries[$iso3]['name'];
    }

    // -- private functions:
    private static function convertInternationalCarCodes($country) {
        // Code    Country From    Before  Notes --carcode => iso3

        $list['A'] = 'AUT'; //  Austria
        $list['AFG'] = 'AFG'; //  Afghanistan    1971
        $list['AG'] = ''; //* Antigua and Barbuda
        $list['AL'] = ''; //  Albania    1934
        $list['AM'] = ''; //  Armenia    1992    SU  Formerly part of the Soviet Union
        $list['AND'] = ''; //  Andorra    1957
        $list['ANG'] = ''; //* Angola 1975    PAN: 1932–1957, P: 1957–1975    Formerly a territory of Portugal
        $list['ARK'] = ''; //* Antarctica
        $list['AUA'] = ''; //*, ARU*   Aruba      NA  Formerly part of the Netherlands Antilles
        $list['AUS'] = ''; //  Australia  1954
        $list['AX'] = ''; //* Åland Islands  2002    SF  Territory of Finland. FIN is the official code.
        $list['AXA'] = ''; //* Anguilla
        $list['AZ'] = ''; //  Azerbaijan 1993    SU  Formerly part of the Soviet Union
        $list['B'] = 'BEL'; //  Belgium    1910
        $list['BD'] = ''; //  Bangladesh 1978    PAK Formerly East Pakistan
        $list['BDS'] = ''; //  Barbados   1956
        $list['BF'] = ''; //  Burkina Faso   1990    RHV / HV    until August 2003, 1984; (République (de)) Haute Volta (Upper Volta)
        $list['BG'] = ''; //  Bulgaria   1910
        $list['BH'] = ''; //  Belize 1938        former British Honduras. Uses BZ unofficially since 1980, although still officially registered as BH as of 2007.
        $list['BHT'] = ''; //* Bhutan
        $list['BIH'] = ''; //  Bosnia and Herzegovina 1993    YU  Bosna i Hercegovina (Bosnian)
        $list['BOL'] = ''; //  Bolivia    1967
        $list['BR'] = 'BRA'; //  Brazil 1930
        $list['BRN'] = ''; //  Bahrain    1954
        $list['BRU'] = ''; //  Brunei 1956
        $list['BS'] = ''; //  Bahamas    1950
        $list['BUR'] = ''; //  Myanmar    1956    BA  Also known as Burma.
        $list['BVI'] = ''; //  British Virgin Islands
        $list['BW'] = ''; //  Botswana   2003    BP  unofficially for Botswana. Officially RB for Republic of Botswana. Formerly Bechuanaland Protectorate
        $list['BY'] = ''; //  Belarus    1992 (2004) SU  Byelorussia; formerly part of the Soviet Union. The UN was officially notified of the change from SU to BY only in 2004.[3]
        $list['BZ'] = ''; //* Belize 1980        former British Honduras. Still officially registered as BH (as of 2007).
        $list['C'] = ''; //  Cuba   1930
        $list['CAM'] = ''; //  Cameroon   1952    F & WAN Formerly a territory of France
        $list['CDN'] = ''; //  Canada 1956    CA  Canadian Dominion
        $list['CH'] = 'CHE'; //  Switzerland    1911        Confœderatio Helvetica (Latin)
        $list['CI'] = ''; //  Côte d'Ivoire (Ivory Coast)    1961    F   Formerly a territory of France
        $list['CL'] = ''; //  Sri Lanka  1961        Formerly Ceylon
        $list['CN'] = ''; //* People's Republic of China
        $list['CO'] = 'COL'; //   Colombia   1952
        $list['COM'] = ''; //* Comoros        F   Formerly a territory of France
        $list['CR'] = ''; //  Costa Rica 1956
        $list['CV'] = ''; //* Cape Verde 1975    P   Formerly a territory of Portugal
        $list['CY'] = ''; //  Cyprus 1932
        $list['CYM'] = ''; //* Wales          Part of the United Kingdom, CYM from Cymru (Welsh)
        $list['CZ'] = 'CZE'; //  Czech Republic 1993    CS  Formerly Československo (Czechoslovakia)
        $list['D'] = 'DEU'; //  Germany    1910        Deutschland (German); also used until 1974 by  East Germany, which then used DDR until German reunification in 1990
        $list['DJI'] = ''; //* Djibouti       F   Formerly a territory of France
        $list['DK'] = ''; //  Denmark    1914
        $list['DOM'] = ''; //  Dominican Republic 1952
        $list['DY'] = ''; //  Benin  1910    Part of AOF (Afrique occidentale française) − 1960  Dahomey (name until 1975)
        $list['DZ'] = ''; //  Algeria    1962    F − 1911    Dzayer (Algerian Arabic); Formerly part of France
        $list['E'] = 'ESP'; //  Spain  1910        España (Spanish)
        $list['EAK'] = ''; //  Kenya  1938        East Africa Kenya
        $list['EAT'] = ''; //  Tanzania   1938    EAT & EAZ   East Africa Tanzania; formerly East Africa Tanganyika and East Africa Zanzibar
        $list['EAU'] = ''; //  Uganda 1938        East Africa Uganda
        $list['EAZ'] = ''; //  Zanzibar           East Africa Zanzibar
        $list['EC'] = ''; //  Ecuador    1962
        $list['ENG'] = ''; //* England            Part of the United Kingdom
        $list['ER'] = ''; //  Eritrea    1993    AOI − 1941, ETH 1964–1993   Africa Orientale Italiana (Italian), Ethiopia
        $list['ES'] = ''; //  El Salvador    1978
        $list['ES'] = ''; //  Estonia    1993    EW 1919–1940 & 1991–1993; SU 1940–1991  Formerly part of the Soviet Union
        $list['ET'] = ''; //  Egypt  1927
        $list['ETH'] = ''; //  Ethiopia   1964    AOI − 1941  Africa Orientale Italiana (Italian)
        $list['F'] = 'FRA'; //  France 1910
        $list['FIN'] = 'FIN'; //  Finland    1993    SF  Suomi Finland (Finnish/Swedish)
        $list['FJI'] = ''; //  Fiji   1971
        $list['FL'] = ''; //  Liechtenstein  1923        Fürstentum Liechtenstein (German)
        $list['FO'] = ''; //  Faroe Islands  1996        Sometimes FØ or Fø
        $list['FSM'] = ''; //* Federated States of Micronesia
        $list['G'] = ''; //  Gabon  1974    ALEF − 1960 Afrique Équatoriale Française
        $list['GB'] = 'GBR'; //  United Kingdom (of Great Britain and Northern Ireland) 1910        Before 1922 it was used for the United Kingdom of Great Britain and Ireland
        $list['GBA'] = ''; //  Alderney   1924        Great Britain – Alderney
        $list['GBG'] = ''; //  Guernsey   1924        Great Britain – Guernsey
        $list['GBJ'] = ''; //  Jersey 1924        Great Britain – Jersey
        $list['GBM'] = ''; //  Isle of Man    1932        Great Britain – Isle of Man
        $list['GBZ'] = ''; //  Gibraltar  1924        Great Britain – Gibraltar [Z was assigned because G was already used for Guernsey]
        $list['GCA'] = ''; //  Guatemala  1956        Guatemala, Central America
        $list['GE'] = ''; //  Georgia    1992    SU  Formerly part of the Soviet Union
        $list['GH'] = ''; //  Ghana  1959    WAC − 1957  West Africa Gold Coast − 1957
        $list['GQ'] = ''; //* Equatorial Guinea      E   Formerly a territory of Spain – Spanish Guinea − 1968
        $list['GR'] = 'GRE'; //  Greece 1913
        $list['GUY'] = ''; //  Guyana 1972    BRG Formerly British Guiana − 1966
        $list['GW'] = ''; //*, RGB*    Guinea-Bissau  1974    P   Portuguese Guinea – 1974. República da Guiné-Bissau
        $list['H'] = 'HUN'; //  Hungary    1910
        $list['HK'] = ''; //* Hong Kong  1932
        $list['HKJ'] = ''; //  Jordan     JOR Hashemite Kingdom of Jordan
        $list['HN'] = ''; //*  Honduras
        $list['HR'] = ''; //   Croatia    1992    SHS 1919–29, Y 1929–53, YU 1953–92  Hrvatska (Croatian). Formerly part of the Kingdom of Serbs, Croats and Slovenes (Kraljevina Srba, Hrvata i Slovenaca – Croatian), then part of Yugoslavia. In the period immediately following Croatia's declaration of independence from Yugoslavia in 1991, it was common to see unofficial oval stickers with the letters "CRO" sold across Croatia. Despite the initial anticipation that Croatia's international vehicle registration code would be "CRO", Croatia officially opted for the 2-letter "HR" (Hrvatska) code instead.
        $list['I'] = 'ITA'; //    Italy  1910
        $list['IL'] = ''; //   Israel 1952
        $list['IND'] = 'IND'; //  India  1947
        $list['IR'] = ''; //   Iran   1936
        $list['IRL'] = 'IRL'; //  Ireland    1962    GB − 1910, SE − 1924, EIR − 1938    Great Britain, Saorstát Éireann, Éire. Currently there is a campaign underway by Irish Language activists to have the name of the country in the native language represented by changing the code back to EIR or ÉIR. This is unnecessary, as Statutory Instrument No. 269 of 1961 provides: " ... the letters EIR are used to indicate the name of the State but the letters IRL may be substituted therefor."
        $list['IRQ'] = ''; //  Iraq   1930
        $list['IS'] = ''; //   Iceland    1936        Ísland (Icelandic)
        $list['J'] = 'JPN'; //  Japan  1964
        $list['JA'] = ''; //  Jamaica    1932
        $list['K'] = ''; //  Cambodia   1956    F − 1949    Known as Kampuchea 1976–89. Formerly a territory of France.
        $list['KAN'] = ''; //* Saint Kitts and Nevis
        $list['KIR'] = ''; //* Kiribati
        $list['KN'] = ''; //* Greenland      GRO Kalaallit Nunaat
        $list['KP'] = ''; //* Democratic People's Republic of Korea
        $list['KS'] = ''; //  Kyrgyzstan 1992    SU − 1991   Formerly part of the Soviet Union
        $list['KWT'] = ''; //  Kuwait 1954
        $list['KZ'] = ''; //  Kazakhstan 1992    SU − 1991   Formerly part of the Soviet Union
        $list['L'] = 'LUX'; //  Luxembourg 1911
        $list['LAO'] = ''; //  Laos   1959    F – 1949    Formerly a territory of France (French Indochina)
        $list['LAR'] = ''; //  Libya  1972    I − 1949, LT    Libyan Arab Republic; Formerly a territory of Italy
        $list['LB'] = ''; //  Liberia    1967
        $list['LS'] = ''; //  Lesotho    1967    BL  Basutoland − 1966
        $list['LT'] = ''; //  Lithuania  1992    SU 1940–1991    Formerly part of the Soviet Union
        $list['LV'] = ''; //  Latvia 1992    LR 1927–1940, SU 1940–1991  Latvijas Republika (Latvian); Formerly part of the Soviet Union
        $list['M'] = ''; //  Malta  1966    GBY 1924–66
        $list['MA'] = ''; //  Morocco    1924        Maroc (French)
        $list['MAL'] = ''; //  Malaysia   1967    FM – 1957, PTM 1957–67  formerly Federated Malay States, then Perseketuan Tanah Malayu (Malay)
        $list['MC'] = ''; //  Monaco 1910
        $list['MD'] = ''; //  Moldova    1992    SU − 1991   Formerly part of the Soviet Union
        $list['MEX'] = ''; //  Mexico 1952
        $list['MGL'] = ''; //  Mongolia
        $list['MH'] = ''; //* Marshall Islands
        $list['MK'] = ''; //  Macedonia  1992    YU − 1992   Formerly part of Yugoslavia
        $list['MNE'] = ''; //  Montenegro 2006    MN – 1913–1919, SHS 1919–29, Y 1929–53, YU 1953–2003, SCG 2003–2006 Formerly part of the Kingdom of Serbs, Croats and Slovenes (Srba, Hrvata i Slovenaca – Serbo-Croatian), then part of Yugoslavia and then Serbia and Montenegro (Srbija i Crna Gora – Serbian)
        $list['MO'] = ''; //* Macau  1930s?      former Portuguese overseas province
        $list['MOC'] = ''; //  Mozambique 1975    MOC: 1932–56, P: 1957–75    Formerly part of Portugal. Moçambique (Portuguese)
        $list['MS'] = ''; //  Mauritius  1938
        $list['MV'] = ''; //* Maldives
        $list['MW'] = ''; //  Malawi 1965    EA 1932–38, NP – 1938–70, RNY option 1960–65    Formerly the Nyasaland Protectorate
        $list['N'] = 'NOR'; //  Norway 1922
        $list['NA'] = 'NLD'; //  Netherlands Antilles   1957
        $list['NAM'] = ''; //  Namibia    1990    SWA Formerly South West Africa
        $list['NAU'] = ''; //  Nauru  1968
        $list['NC'] = ''; //* New Caledonia
        $list['NEP'] = ''; //  Nepal  1970
        $list['NI'] = ''; //* Northern Ireland            Part of the United Kingdom
        $list['NIC'] = ''; //  Nicaragua  1952
        $list['NL'] = 'NLD'; //  Netherlands    1910
        $list['NZ'] = 'NZL'; //  New Zealand    1958
        $list['OM'] = ''; //* Oman
        $list['P'] = 'PRT'; //  Portugal   1910
        $list['PA'] = ''; //  Panama 1952
        $list['PAL'] = ''; //* Palau
        $list['PE'] = ''; //  Peru   1937
        $list['PK'] = ''; //  Pakistan   1947?
        $list['PL'] = 'POL'; //  Poland 1921
        $list['PMR'] = ''; //* Transnistria   1990    SU − 1991, MD 1991  Pridnestrovian Moldavian Republic – officially part of  Moldova. Formerly part of the Soviet Union.
        $list['PNG'] = ''; //  Papua New Guinea   1978
        $list['PR'] = ''; //* Puerto Rico
        $list['PS'] = ''; //* Palestinian territories
        $list['PY'] = ''; //  Paraguay   1952
        $list['Q'] = ''; //   Qatar  1972
        $list['RA'] = 'ARG'; //  Argentina  1927        República Argentina (Spanish)
        $list['RB'] = ''; //  Botswana   1966    BP  Republic of Botswana. Unofficially uses BW. Formerly Bechuanaland Protectorate
        $list['RC'] = ''; //   Republic of China (Taiwan) 1932
        $list['RCA'] = ''; //  Central African Republic   1962        République Centrafricaine (French)
        $list['RCB'] = ''; //  Republic of the Congo  1962        République du Congo Brazzaville (French)
        $list['RCH'] = ''; //  Chile  1930        República de Chile (Spanish)
        $list['RG'] = ''; //   Guinea 1972        République de Guinée (French)
        $list['RH'] = ''; //   Haiti  1952        République d'Haïti (French)
        $list['RI'] = ''; //   Indonesia  1955        Republik Indonesia (Indonesian)
        $list['RIM'] = ''; //  Mauritania 1964        République islamique de Mauritanie (French)
        $list['RKS'] = ''; //*     Kosovo 2010    SRB; KS 1999–2010; RKS 2010 Serbia claims Kosovo as part of its territory.
        $list['RL'] = ''; //   Lebanon    1952        République Libanaise (French)
        $list['RM'] = ''; //   Madagascar 1962        République de Madagascar (French)
        $list['RMM'] = ''; //  Mali   1962    AOF − 1960  République du Mali (French). Formerly part of French West Africa (Afrique Occidentale Française)
        $list['RN'] = ''; //   Niger  1977    AOF − 1960  République du Niger (French). Formerly part of French West Africa (Afrique Occidentale Française)
        $list['RO'] = ''; //   Romania    1981    R
        $list['ROK'] = ''; //  Republic of Korea  1971
        $list['ROU'] = ''; //  Uruguay    1979        República Oriental del Uruguay (Spanish)
        $list['RP'] = ''; //   Philippines    1975        Republic of the Philippines
        $list['RSM'] = ''; //  San Marino 1932        Repubblica di San Marino (Italian)
        $list['RU'] = ''; //   Burundi    1962?       Belgian territory of Ruanda-Urundi
        $list['RUS'] = ''; //  Russia 1992    SU  Formerly part of the Soviet Union
        $list['RWA'] = ''; //  Rwanda 1964    RU − 1962   Formerly part of Ruanda-Urundi − 1962
        $list['S'] = 'SWE'; //    Sweden 1911
        $list['SA'] = ''; // Saudi Arabia   1973
        $list['SCO'] = ''; //*     Scotland           Part of the United Kingdom
        $list['SD'] = ''; //   Swaziland  1935
        $list['SF'] = 'FIN'; //  Finland 1993    FIN SF from "Suomi – Finland" (the names of the country in its official languages, Finnish and Swedish)
        $list['SGP'] = ''; //  Singapore  1952
        $list['SK'] = ''; //   Slovakia   1993    CS 1919–39,1945–92, SQ 1939–45  Formerly Československo (Czechoslovakia)
        $list['SLE'] = ''; //*     Sierra Leone   2002        officially WAL; SLE is only used on local licence plates, written below the national flag
        $list['SLO'] = ''; //  Slovenia   1992    SHS 1919–29, Y 1929–53, YU 1953–92  Formerly part of the Kingdom of Serbs, Croats and Slovenes, then part of Yugoslavia
        $list['SME'] = ''; //  Suriname   1936
        //$list['SMOM'] = '' ; //*    Sovereign Military Order of Malta
        $list['SN'] = ''; //  Senegal    1962
        $list['SO'] = ''; //   Somalia    1974
        $list['SOL'] = ''; //*     Solomon Islands
        $list['SRB'] = ''; //  Serbia 2006    SB – 1919, SHS 1919–29, Y 1929–53, YU 1953–2003, SCG 2003–2006  Formerly part of the Kingdom of Serbs, Croats and Slovenes (Srba, Hrvata i Slovenaca – Serbo-Croatian), then part of Yugoslavia and then Serbia and Montenegro (Srbija i Crna Gora – Serbian)
        $list['STP'] = ''; //*     São Tomé and Príncipe  1975    P   Formerly a territory of Portugal
        $list['SUD'] = ''; //  Sudan  1963
        $list['SY'] = ''; //   Seychelles 1938
        $list['SYR'] = ''; //  Syria  1952
        $list['T'] = ''; //    Thailand   1955
        $list['TCH'] = ''; // Chad   1973        Tchad (French)
        $list['TD'] = ''; // Chad   1973        Tchad (French)
        $list['TG'] = ''; //   Togo   1973
        $list['TJ'] = ''; //   Tajikistan 1992    SU − 1991   Formerly part of the Soviet Union
        $list['TL'] = ''; //*  Timor-Leste        P, RI   Formerly a territory of Portugal, then part of Indonesia
        $list['TM'] = ''; //   Turkmenistan   1992    SU − 1991   Formerly part of the Soviet Union
        $list['TN'] = ''; //   Tunisia    1957    F − 1956    Formerly a territory of France
        $list['TO'] = ''; //*  Tonga
        $list['TR'] = ''; //   Turkey 1935
        $list['TT'] = ''; //   Trinidad and Tobago    1964
        $list['TUV'] = ''; //*     Tuvalu
        $list['UA'] = ''; //   Ukraine    1992    SU  Formerly part of the Soviet Union
        $list['UAE'] = 'UAE'; //  United Arab Emirates
        $list['USA'] = 'USA'; //  United States  1952        Correctly used by U.S.-registered vehicles abroad. Today, U.S.-owned vehicles registered in Europe use the licence plate code of the country in which they are located.
        $list['UZ'] = ''; //   Uzbekistan 1992    SU  Formerly part of the Soviet Union
        $list['V'] = ''; //    Vatican City   1931
        $list['VN'] = ''; //  Vietnam    1953
        $list['VU'] = ''; //*  Vanuatu
        $list['WAG'] = ''; //  Gambia 1932        West Africa Gambia
        $list['WAL'] = ''; //  Sierra Leone   1937        West Africa Sierra Leone; on local licence plates SLE is used
        $list['WAN'] = ''; //  Nigeria    1937        West Africa Nigeria
        $list['WD'] = ''; //   Dominica   1954        Windward Islands Dominica
        $list['WG'] = ''; //   Grenada    1932        Windward Islands Grenada
        $list['WL'] = ''; //   Saint Lucia    1932        Windward Islands Saint Lucia
        $list['WS'] = ''; //   Samoa  1962        formerly Western Samoa
        $list['WSA'] = ''; //*    Western Sahara  1932    SE − 1976   formerly Sahara Español (Spanish); now mostly occupied by Morocco, with some territory administered by the Sahrawi Arab Democratic Republic
        $list['WV'] = ''; //   Saint Vincent and the Grenadines   1932        Windward Islands Saint Vincent
        $list['YAR'] = ''; //  Yemen          North Yemen formerly known as the Yemen Arab Republic
        $list['YV'] = 'VEN'; //   Venezuela          the same code is used for aircraft
        $list['Z'] = ''; //    Zambia 1964    NR  formerly Northern Rhodesia
        $list['ZA'] = 'ZAF'; //   South Africa   1936        Zuid-Afrika (from Dutch; in Afrikaans it is Suid-Afrika[4])
        $list['ZRE'] = ''; //  Democratic Republic of the Congo   1971?   CB, RCL, CGO, ZR    Congo Belge (French), République de Congo Léopoldville (French), Congo (Kinshasa), Zaïre
        $list['ZW'] = ''; //   Zimbabwe   1980    SR, RSR formerly Southern Rhodesia until 1965, Rhodesia unrecognised until 1980
        $list['ADN'] = ''; // Aden    1980    Y   From 1938. a.k.a. South Yemen, People's Democratic Republic of Yemen (1967)
        $list['BA'] = ''; //   Myanmar    1956    BUR From 1937.
        $list['BP'] = ''; //  Bechuanaland Protectorate   1966        Now Botswana
        $list['CS'] = ''; //  Czechoslovakia  1992    CZ / SK
        $list['DA'] = ''; //  Free City of Danzig (Gdańsk)    1939    D (1939-1945)
        $list['PL'] = ''; // (since 1945) Danzig (German for Gdańsk)
        $list['DDR'] = 'DDR'; // German Democratic Republic  1990    D   Deutsche Demokratische Republik
        $list['EW'] = ''; //  Estonia 1993    EST Eesti Vabariik (Estonian)
        $list['FR'] = ''; //  Faroe Islands   1996    FO  Føroyar (Faroese)
        $list['GRO'] = ''; // Greenland       KN
        $list['HV'] = ''; //  Haute Volta, now Burkina Faso   1984    BF  Upper Volta
        $list['LR'] = ''; //  Latvia  1927–1940   SU, LV  Latvijas Republika (Latvian)
        $list['R'] = ''; //   Romania 1981    RO
        $list['RNY'] = ''; // Rhodesia-Nyasaland Fed. 1953 - 1963 NP, NR, SR  Now Malawi, Zambia and Zimbabwe
        $list['RSR'] = ''; // Southern Rhodesia   1965–1979   SR  Now Zimbabwe
        $list['RT'] = ''; //   Togo   1973    TG  République togolaise (French). Formerly French Togoland − 1960
        $list['SA'] = ''; //  Saarland    1956    D   also D between 1935 and 1945; SA is now Saudi Arabia
        $list['SB'] = ''; //  Serbia  1919    SHS Serbia became part of Kingdom of Serbs, Croats and Slovenes
        $list['SCG'] = ''; // Serbia and Montenegro   2006    MNE, SRB    From Serbian name "Srbija i Crna Gora". Now Montenegro, Serbia
        $list['SHS'] = ''; // Kingdom of Serbs, Croats and Slovenes   1929    Y   Srba, Hrvata i Slovenaca – Serbo-Croatian. Kingdom changed its name to Yugoslavia
        $list['SU'] = ''; //  Soviet Union    1991    EST, LT, LV, BY, MD, UA, TJ, TUR, GE, KZ, UZ, KS, AZ, ARM, RUS
        $list['SWA'] = ''; // South West Africa   1990        now Namibia
        $list['TS'] = ''; //  Free Territory of Trieste   1947–1954   I, YU, SLO
        $list['Y'] = ''; //   Yugoslavia  1953    YU  Yemen started using Y afterwards
        $list['YU'] = ''; //  Yugoslavia  2003    BIH, HR, KOS, MK, MNE, SRB, SLO Now Bosnia-Herzegovina, Croatia, Kosovo, Macedonia, Montenegro, Serbia, and Slovenia
        // end of the list: now the conversion:
        $result = $country;
        if (isset($list[$country])) {
            $result = $list[$country];
        }

        return $result;
    }

}

?>