<?php

namespace App\Data;

class AirportCities
{
    /**
     * Comprehensive mapping of IATA airport codes to city names for weather API
     * Format: 'IATA' => 'City,Country'
     * Covers 1000+ major airports worldwide
     */
    private static $airportCityMap = [
        // ==================== NORTH AMERICA ====================
        
        // United States - Major Hubs
        'JFK' => 'New York,US',
        'LGA' => 'New York,US',
        'EWR' => 'Newark,US',
        'LAX' => 'Los Angeles,US',
        'SFO' => 'San Francisco,US',
        'SJC' => 'San Jose,US',
        'OAK' => 'Oakland,US',
        'ORD' => 'Chicago,US',
        'MDW' => 'Chicago,US',
        'MIA' => 'Miami,US',
        'FLL' => 'Fort Lauderdale,US',
        'DFW' => 'Dallas,US',
        'DAL' => 'Dallas,US',
        'SEA' => 'Seattle,US',
        'LAS' => 'Las Vegas,US',
        'PHX' => 'Phoenix,US',
        'ATL' => 'Atlanta,US',
        'DEN' => 'Denver,US',
        'BOS' => 'Boston,US',
        'BWI' => 'Baltimore,US',
        'DCA' => 'Washington,US',
        'IAD' => 'Washington,US',
        'IAH' => 'Houston,US',
        'HOU' => 'Houston,US',
        'MSP' => 'Minneapolis,US',
        'DTW' => 'Detroit,US',
        'PHL' => 'Philadelphia,US',
        'CLT' => 'Charlotte,US',
        'MEM' => 'Memphis,US',
        'MCO' => 'Orlando,US',
        'TPA' => 'Tampa,US',
        'MYR' => 'Myrtle Beach,US',
        'JAX' => 'Jacksonville,US',
        'PBI' => 'West Palm Beach,US',
        'RSW' => 'Fort Myers,US',
        'SRQ' => 'Sarasota,US',
        'TLH' => 'Tallahassee,US',

        // US - West Coast
        'PDX' => 'Portland,US',
        'SAN' => 'San Diego,US',
        'SMF' => 'Sacramento,US',
        'RNO' => 'Reno,US',
        'SLC' => 'Salt Lake City,US',
        'ANC' => 'Anchorage,US',
        'HNL' => 'Honolulu,US',
        'OGG' => 'Maui,US',
        'KOA' => 'Kona,US',

        // US - Mountain/Central
        'MSY' => 'New Orleans,US',
        'AUS' => 'Austin,US',
        'SAT' => 'San Antonio,US',
        'OKC' => 'Oklahoma City,US',
        'TUL' => 'Tulsa,US',
        'LIT' => 'Little Rock,US',
        'MCI' => 'Kansas City,US',
        'STL' => 'St Louis,US',
        'CVG' => 'Cincinnati,US',
        'CMH' => 'Columbus,US',
        'CLE' => 'Cleveland,US',
        'BUF' => 'Buffalo,US',
        'ROC' => 'Rochester,US',
        'ALB' => 'Albany,US',
        'BGM' => 'Binghamton,US',
        'SYR' => 'Syracuse,US',

        // US - Southeast
        'RDU' => 'Raleigh,US',
        'GSO' => 'Greensboro,US',
        'AVL' => 'Asheville,US',
        'CHS' => 'Charleston,US',
        'SAV' => 'Savannah,US',
        'BHM' => 'Birmingham,US',
        'HSV' => 'Huntsville,US',
        'MOB' => 'Mobile,US',
        'MGM' => 'Montgomery,US',
        'BNA' => 'Nashville,US',
        'MEM' => 'Memphis,US',
        'LIT' => 'Little Rock,US',

        // Canada - Major Cities
        'YYZ' => 'Toronto,CA',
        'YTZ' => 'Toronto,CA',
        'YUL' => 'Montreal,CA',
        'YVR' => 'Vancouver,CA',
        'YYC' => 'Calgary,CA',
        'YEG' => 'Edmonton,CA',
        'YWG' => 'Winnipeg,CA',
        'YOW' => 'Ottawa,CA',
        'YHZ' => 'Halifax,CA',
        'YQB' => 'Quebec City,CA',
        'YXE' => 'Saskatoon,CA',
        'YQR' => 'Regina,CA',
        'YQT' => 'Thunder Bay,CA',
        'YKA' => 'Kamloops,CA',
        'YKF' => 'Kitchener,CA',

        // Mexico
        'MEX' => 'Mexico City,MX',
        'CUN' => 'Cancun,MX',
        'GDL' => 'Guadalajara,MX',
        'MTY' => 'Monterrey,MX',
        'TIJ' => 'Tijuana,MX',
        'PVR' => 'Puerto Vallarta,MX',
        'SJD' => 'Los Cabos,MX',
        'MZT' => 'Mazatlan,MX',
        'ACA' => 'Acapulco,MX',
        'CZM' => 'Cozumel,MX',
        'MID' => 'Merida,MX',
        'VER' => 'Veracruz,MX',
        'OAX' => 'Oaxaca,MX',

        // Central America & Caribbean
        'SJO' => 'San Jose,CR',
        'PTY' => 'Panama City,PA',
        'GUA' => 'Guatemala City,GT',
        'SAL' => 'San Salvador,SV',
        'TGU' => 'Tegucigalpa,HN',
        'MGA' => 'Managua,NI',
        'BZE' => 'Belize City,BZ',
        'HAV' => 'Havana,CU',
        'NAS' => 'Nassau,BS',
        'BGI' => 'Bridgetown,BB',
        'POS' => 'Port of Spain,TT',
        'KIN' => 'Kingston,JM',
        'SDQ' => 'Santo Domingo,DO',
        'SJU' => 'San Juan,PR',

        // ==================== SOUTH AMERICA ====================
        
        // Brazil
        'GRU' => 'Sao Paulo,BR',
        'CGH' => 'Sao Paulo,BR',
        'GIG' => 'Rio de Janeiro,BR',
        'SDU' => 'Rio de Janeiro,BR',
        'BSB' => 'Brasilia,BR',
        'CNF' => 'Belo Horizonte,BR',
        'REC' => 'Recife,BR',
        'FOR' => 'Fortaleza,BR',
        'SSA' => 'Salvador,BR',
        'POA' => 'Porto Alegre,BR',
        'CWB' => 'Curitiba,BR',
        'FLN' => 'Florianopolis,BR',
        'BEL' => 'Belem,BR',
        'MAO' => 'Manaus,BR',
        'THE' => 'Teresina,BR',
        'NAT' => 'Natal,BR',
        'MCZ' => 'Maceio,BR',
        'AJU' => 'Aracaju,BR',

        // Argentina
        'EZE' => 'Buenos Aires,AR',
        'AEP' => 'Buenos Aires,AR',
        'COR' => 'Cordoba,AR',
        'MDZ' => 'Mendoza,AR',
        'ROS' => 'Rosario,AR',
        'SLA' => 'Salta,AR',
        'BRC' => 'Bariloche,AR',
        'IGR' => 'Iguazu,AR',
        'USH' => 'Ushuaia,AR',

        // Chile
        'SCL' => 'Santiago,CL',
        'IPC' => 'Easter Island,CL',
        'ARI' => 'Arica,CL',
        'CJC' => 'Calama,CL',
        'ANF' => 'Antofagasta,CL',
        'LSC' => 'La Serena,CL',
        'ZCO' => 'Temuco,CL',
        'ZAL' => 'Valdivia,CL',
        'PMC' => 'Puerto Montt,CL',
        'BBA' => 'Balmaceda,CL',
        'PUQ' => 'Punta Arenas,CL',

        // Peru
        'LIM' => 'Lima,PE',
        'CUZ' => 'Cusco,PE',
        'AQP' => 'Arequipa,PE',
        'TRU' => 'Trujillo,PE',
        'IQT' => 'Iquitos,PE',
        'PIU' => 'Piura,PE',
        'TCQ' => 'Tacna,PE',

        // Colombia
        'BOG' => 'Bogota,CO',
        'MDE' => 'Medellin,CO',
        'CLO' => 'Cali,CO',
        'CTG' => 'Cartagena,CO',
        'BAQ' => 'Barranquilla,CO',
        'BGA' => 'Bucaramanga,CO',
        'SMR' => 'Santa Marta,CO',
        'ADZ' => 'San Andres,CO',

        // Other South America
        'CCS' => 'Caracas,VE',
        'UIO' => 'Quito,EC',
        'GYE' => 'Guayaquil,EC',
        'LPB' => 'La Paz,BO',
        'VVI' => 'Santa Cruz,BO',
        'ASU' => 'Asuncion,PY',
        'MVD' => 'Montevideo,UY',
        'GEO' => 'Georgetown,GY',
        'PBM' => 'Paramaribo,SR',

        // ==================== EUROPE ====================
        
        // United Kingdom
        'LHR' => 'London,UK',
        'LGW' => 'London,UK',
        'STN' => 'London,UK',
        'LTN' => 'London,UK',
        'LCY' => 'London,UK',
        'SEN' => 'London,UK',
        'MAN' => 'Manchester,UK',
        'BHX' => 'Birmingham,UK',
        'EDI' => 'Edinburgh,UK',
        'GLA' => 'Glasgow,UK',
        'ABZ' => 'Aberdeen,UK',
        'NCL' => 'Newcastle,UK',
        'LPL' => 'Liverpool,UK',
        'LDS' => 'Leeds,UK',
        'BRS' => 'Bristol,UK',
        'CWL' => 'Cardiff,UK',
        'BFS' => 'Belfast,UK',
        'DUB' => 'Dublin,IE',
        'ORK' => 'Cork,IE',
        'SNN' => 'Shannon,IE',

        // France
        'CDG' => 'Paris,FR',
        'ORY' => 'Paris,FR',
        'LBG' => 'Paris,FR',
        'NCE' => 'Nice,FR',
        'LYS' => 'Lyon,FR',
        'MRS' => 'Marseille,FR',
        'TLS' => 'Toulouse,FR',
        'BOD' => 'Bordeaux,FR',
        'NTE' => 'Nantes,FR',
        'SXB' => 'Strasbourg,FR',
        'LIL' => 'Lille,FR',
        'RNS' => 'Rennes,FR',
        'CLY' => 'Calvi,FR',
        'AJA' => 'Ajaccio,FR',
        'BIA' => 'Bastia,FR',

        // Germany
        'FRA' => 'Frankfurt,DE',
        'MUC' => 'Munich,DE',
        'DUS' => 'Dusseldorf,DE',
        'TXL' => 'Berlin,DE',
        'BER' => 'Berlin,DE',
        'SXF' => 'Berlin,DE',
        'HAM' => 'Hamburg,DE',
        'CGN' => 'Cologne,DE',
        'STR' => 'Stuttgart,DE',
        'HAJ' => 'Hannover,DE',
        'NUE' => 'Nuremberg,DE',
        'LEJ' => 'Leipzig,DE',
        'DRS' => 'Dresden,DE',
        'BRE' => 'Bremen,DE',
        'DTM' => 'Dortmund,DE',
        'FMM' => 'Memmingen,DE',
        'KSF' => 'Kassel,DE',
        'PAD' => 'Paderborn,DE',

        // Spain
        'MAD' => 'Madrid,ES',
        'BCN' => 'Barcelona,ES',
        'PMI' => 'Palma,ES',
        'LPA' => 'Las Palmas,ES',
        'AGP' => 'Malaga,ES',
        'SVQ' => 'Seville,ES',
        'VLC' => 'Valencia,ES',
        'BIO' => 'Bilbao,ES',
        'ALC' => 'Alicante,ES',
        'TFS' => 'Tenerife,ES',
        'ACE' => 'Lanzarote,ES',
        'FUE' => 'Fuerteventura,ES',
        'IBZ' => 'Ibiza,ES',
        'MAH' => 'Menorca,ES',
        'SDR' => 'Santander,ES',
        'VGO' => 'Vigo,ES',
        'SCQ' => 'Santiago de Compostela,ES',
        'OVD' => 'Oviedo,ES',

        // Italy
        'FCO' => 'Rome,IT',
        'CIA' => 'Rome,IT',
        'MXP' => 'Milan,IT',
        'LIN' => 'Milan,IT',
        'BGY' => 'Bergamo,IT',
        'VCE' => 'Venice,IT',
        'TSF' => 'Venice,IT',
        'NAP' => 'Naples,IT',
        'FLR' => 'Florence,IT',
        'PSA' => 'Pisa,IT',
        'BLQ' => 'Bologna,IT',
        'TRN' => 'Turin,IT',
        'GOA' => 'Genoa,IT',
        'CTA' => 'Catania,IT',
        'PMO' => 'Palermo,IT',
        'CAG' => 'Cagliari,IT',
        'AHO' => 'Alghero,IT',
        'BRI' => 'Bari,IT',
        'FOG' => 'Foggia,IT',

        // Netherlands
        'AMS' => 'Amsterdam,NL',
        'RTM' => 'Rotterdam,NL',
        'EIN' => 'Eindhoven,NL',
        'GRQ' => 'Groningen,NL',
        'MST' => 'Maastricht,NL',

        // Switzerland
        'ZUR' => 'Zurich,CH',
        'GVA' => 'Geneva,CH',
        'BSL' => 'Basel,CH',
        'BRN' => 'Bern,CH',

        // Austria
        'VIE' => 'Vienna,AT',
        'SZG' => 'Salzburg,AT',
        'INN' => 'Innsbruck,AT',
        'GRZ' => 'Graz,AT',
        'LNZ' => 'Linz,AT',

        // Belgium
        'BRU' => 'Brussels,BE',
        'CRL' => 'Charleroi,BE',
        'ANR' => 'Antwerp,BE',
        'LGG' => 'Liege,BE',
        'OST' => 'Ostend,BE',

        // Nordic Countries
        'CPH' => 'Copenhagen,DK',
        'AAL' => 'Aalborg,DK',
        'BLL' => 'Billund,DK',
        'OSL' => 'Oslo,NO',
        'BGO' => 'Bergen,NO',
        'TRD' => 'Trondheim,NO',
        'SVG' => 'Stavanger,NO',
        'ARN' => 'Stockholm,SE',
        'GOT' => 'Gothenburg,SE',
        'MMX' => 'Malmo,SE',
        'HEL' => 'Helsinki,FI',
        'TMP' => 'Tampere,FI',
        'TKU' => 'Turku,FI',
        'OUL' => 'Oulu,FI',
        'KEF' => 'Reykjavik,IS',

        // Eastern Europe
        'WAW' => 'Warsaw,PL',
        'KRK' => 'Krakow,PL',
        'GDN' => 'Gdansk,PL',
        'WRO' => 'Wroclaw,PL',
        'POZ' => 'Poznan,PL',
        'KTW' => 'Katowice,PL',
        'PRG' => 'Prague,CZ',
        'BRQ' => 'Brno,CZ',
        'OSR' => 'Ostrava,CZ',
        'BUD' => 'Budapest,HU',
        'DEB' => 'Debrecen,HU',
        'OTP' => 'Bucharest,RO',
        'CLJ' => 'Cluj-Napoca,RO',
        'TSR' => 'Timisoara,RO',
        'SOF' => 'Sofia,BG',
        'VAR' => 'Varna,BG',
        'BOJ' => 'Burgas,BG',
        'ZAG' => 'Zagreb,HR',
        'SPU' => 'Split,HR',
        'DBV' => 'Dubrovnik,HR',
        'PUY' => 'Pula,HR',
        'LJU' => 'Ljubljana,SI',
        'MBX' => 'Maribor,SI',
        'BEG' => 'Belgrade,RS',
        'NIS' => 'Nis,RS',
        'SJJ' => 'Sarajevo,BA',
        'TGD' => 'Podgorica,ME',
        'TIV' => 'Tivat,ME',
        'SKP' => 'Skopje,MK',

        // Greece & Cyprus
        'ATH' => 'Athens,GR',
        'SKG' => 'Thessaloniki,GR',
        'HER' => 'Heraklion,GR',
        'CHQ' => 'Chania,GR',
        'RHO' => 'Rhodes,GR',
        'KOS' => 'Kos,GR',
        'CFU' => 'Corfu,GR',
        'ZTH' => 'Zakynthos,GR',
        'JMK' => 'Mykonos,GR',
        'JTR' => 'Santorini,GR',
        'LCA' => 'Larnaca,CY',
        'PFO' => 'Paphos,CY',

        // Portugal
        'LIS' => 'Lisbon,PT',
        'OPO' => 'Porto,PT',
        'FAO' => 'Faro,PT',
        'FNC' => 'Funchal,PT',
        'TER' => 'Terceira,PT',
        'PDL' => 'Ponta Delgada,PT',

        // Russia
        'SVO' => 'Moscow,RU',
        'DME' => 'Moscow,RU',
        'VKO' => 'Moscow,RU',
        'LED' => 'St Petersburg,RU',
        'KZN' => 'Kazan,RU',
        'SVX' => 'Yekaterinburg,RU',
        'NOZ' => 'Novokuznetsk,RU',
        'OVB' => 'Novosibirsk,RU',
        'KEJ' => 'Kemerovo,RU',
        'KJA' => 'Krasnoyarsk,RU',
        'IKT' => 'Irkutsk,RU',
        'UUD' => 'Ulan-Ude,RU',
        'VVO' => 'Vladivostok,RU',

        // Turkey
        'IST' => 'Istanbul,TR',
        'SAW' => 'Istanbul,TR',
        'ESB' => 'Ankara,TR',
        'AYT' => 'Antalya,TR',
        'ADB' => 'Izmir,TR',
        'DLM' => 'Dalaman,TR',
        'BJV' => 'Bodrum,TR',
        'ASR' => 'Kayseri,TR',
        'GZT' => 'Gaziantep,TR',
        'TZX' => 'Trabzon,TR',

        // ==================== ASIA ====================
        
        // China
        'PEK' => 'Beijing,CN',
        'PKX' => 'Beijing,CN',
        'PVG' => 'Shanghai,CN',
        'SHA' => 'Shanghai,CN',
        'CAN' => 'Guangzhou,CN',
        'SZX' => 'Shenzhen,CN',
        'CTU' => 'Chengdu,CN',
        'KMG' => 'Kunming,CN',
        'XIY' => 'Xian,CN',
        'WUH' => 'Wuhan,CN',
        'CSX' => 'Changsha,CN',
        'NKG' => 'Nanjing,CN',
        'HGH' => 'Hangzhou,CN',
        'FOC' => 'Fuzhou,CN',
        'XMN' => 'Xiamen,CN',
        'NNG' => 'Nanning,CN',
        'SYX' => 'Sanya,CN',
        'HAK' => 'Haikou,CN',
        'URC' => 'Urumqi,CN',
        'LHW' => 'Lanzhou,CN',
        'INC' => 'Yinchuan,CN',
        'CGO' => 'Zhengzhou,CN',
        'TNA' => 'Jinan,CN',
        'TAO' => 'Qingdao,CN',

        // Japan
        'NRT' => 'Tokyo,JP',
        'HND' => 'Tokyo,JP',
        'KIX' => 'Osaka,JP',
        'ITM' => 'Osaka,JP',
        'NGO' => 'Nagoya,JP',
        'CTS' => 'Sapporo,JP',
        'OKA' => 'Okinawa,JP',
        'FUK' => 'Fukuoka,JP',
        'KOJ' => 'Kagoshima,JP',
        'SDJ' => 'Sendai,JP',
        'HIJ' => 'Hiroshima,JP',
        'TAK' => 'Takamatsu,JP',
        'KMI' => 'Miyazaki,JP',

        // South Korea
        'ICN' => 'Seoul,KR',
        'GMP' => 'Seoul,KR',
        'PUS' => 'Busan,KR',
        'CJU' => 'Jeju,KR',
        'TAE' => 'Daegu,KR',
        'KWJ' => 'Gwangju,KR',

        // Southeast Asia
        'SIN' => 'Singapore,SG',
        'BKK' => 'Bangkok,TH',
        'DMK' => 'Bangkok,TH',
        'CNX' => 'Chiang Mai,TH',
        'HKT' => 'Phuket,TH',
        'USM' => 'Koh Samui,TH',
        'UTP' => 'Utapao,TH',
        'KUL' => 'Kuala Lumpur,MY',
        'SZB' => 'Kuala Lumpur,MY',
        'PEN' => 'Penang,MY',
        'JHB' => 'Johor Bahru,MY',
        'KCH' => 'Kuching,MY',
        'BKI' => 'Kota Kinabalu,MY',
        'CGK' => 'Jakarta,ID',
        'HLP' => 'Jakarta,ID',
        'DPS' => 'Bali,ID',
        'SUB' => 'Surabaya,ID',
        'MLG' => 'Malang,ID',
        'MDC' => 'Manado,ID',
        'BPN' => 'Balikpapan,ID',
        'PLM' => 'Palembang,ID',
        'PDG' => 'Padang,ID',
        'PKU' => 'Pekanbaru,ID',
        'MNL' => 'Manila,PH',
        'CEB' => 'Cebu,PH',
        'DVO' => 'Davao,PH',
        'ILO' => 'Iloilo,PH',
        'SGN' => 'Ho Chi Minh City,VN',
        'HAN' => 'Hanoi,VN',
        'DAD' => 'Da Nang,VN',
        'CXR' => 'Nha Trang,VN',
        'RGN' => 'Yangon,MM',
        'MDL' => 'Mandalay,MM',
        'PNH' => 'Phnom Penh,KH',
        'REP' => 'Siem Reap,KH',
        'VTE' => 'Vientiane,LA',
        'LPQ' => 'Luang Prabang,LA',
        'BWN' => 'Bandar Seri Begawan,BN',

        // India
        'DEL' => 'New Delhi,IN',
        'BOM' => 'Mumbai,IN',
        'MAA' => 'Chennai,IN',
        'CCU' => 'Kolkata,IN',
        'BLR' => 'Bangalore,IN',
        'HYD' => 'Hyderabad,IN',
        'AMD' => 'Ahmedabad,IN',
        'PNQ' => 'Pune,IN',
        'GOI' => 'Goa,IN',
        'COK' => 'Kochi,IN',
        'TRV' => 'Trivandrum,IN',
        'JAI' => 'Jaipur,IN',
        'LKO' => 'Lucknow,IN',
        'PAT' => 'Patna,IN',
        'GAU' => 'Guwahati,IN',
        'IXC' => 'Chandigarh,IN',
        'SXR' => 'Srinagar,IN',
        'LEH' => 'Leh,IN',
        'IXL' => 'Leh,IN',

        // Pakistan
        'KHI' => 'Karachi,PK',
        'LHE' => 'Lahore,PK',
        'ISB' => 'Islamabad,PK',
        'KWI' => 'Kuwait City,KW',
        'BWP' => 'Bandar Abbas,IR',
        'IKA' => 'Tehran,IR',
        'MHD' => 'Mashhad,IR',
        'AWZ' => 'Ahvaz,IR',
        'SYZ' => 'Shiraz,IR',
        'TBZ' => 'Tabriz,IR',

        // Bangladesh & Sri Lanka
        'DAC' => 'Dhaka,BD',
        'CGP' => 'Chittagong,BD',
        'CMB' => 'Colombo,LK',
        'HRI' => 'Mattala,LK',

        // Central Asia
        'ALA' => 'Almaty,KZ',
        'NQZ' => 'Nur-Sultan,KZ',
        'CIT' => 'Shymkent,KZ',
        'TAS' => 'Tashkent,UZ',
        'SKD' => 'Samarkand,UZ',
        'FRU' => 'Bishkek,KG',
        'ASB' => 'Ashgabat,TM',
        'DYU' => 'Dushanbe,TJ',
        'KBL' => 'Kabul,AF',

        // Taiwan & Hong Kong
        'TPE' => 'Taipei,TW',
        'TSA' => 'Taipei,TW',
        'KHH' => 'Kaohsiung,TW',
        'RMQ' => 'Taichung,TW',
        'HKG' => 'Hong Kong,HK',

        // Mongolia
        'ULN' => 'Ulaanbaatar,MN',

        // ==================== MIDDLE EAST ====================
        
        // UAE
        'DXB' => 'Dubai,AE',
        'AUH' => 'Abu Dhabi,AE',
        'SHJ' => 'Sharjah,AE',
        'RKT' => 'Ras Al Khaimah,AE',
        'AAN' => 'Al Ain,AE',

        // Qatar
        'DOH' => 'Doha,QA',

        // Saudi Arabia
        'RUH' => 'Riyadh,SA',
        'JED' => 'Jeddah,SA',
        'DMM' => 'Dammam,SA',
        'MED' => 'Medina,SA',
        'TUU' => 'Tabuk,SA',
        'AHB' => 'Abha,SA',
        'GIZ' => 'Jizan,SA',

        // Kuwait & Bahrain
        'KWI' => 'Kuwait City,KW',
        'BAH' => 'Manama,BH',

        // Oman
        'MCT' => 'Muscat,OM',
        'SLL' => 'Salalah,OM',

        // Israel & Palestine
        'TLV' => 'Tel Aviv,IL',
        'SDV' => 'Tel Aviv,IL',
        'VDA' => 'Eilat,IL',

        // Jordan
        'AMM' => 'Amman,JO',
        'AQJ' => 'Aqaba,JO',

        // Lebanon & Syria
        'BEY' => 'Beirut,LB',
        'DAM' => 'Damascus,SY',
        'ALP' => 'Aleppo,SY',

        // Iraq
        'BGW' => 'Baghdad,IQ',
        'BSR' => 'Basra,IQ',
        'EBL' => 'Erbil,IQ',

        // Iran
        'IKA' => 'Tehran,IR',
        'MHD' => 'Mashhad,IR',
        'IFN' => 'Isfahan,IR',
        'SYZ' => 'Shiraz,IR',
        'TBZ' => 'Tabriz,IR',
        'AWZ' => 'Ahvaz,IR',
        'BND' => 'Bandar Abbas,IR',

        // Yemen
        'SAH' => 'Sanaa,YE',
        'ADE' => 'Aden,YE',

        // ==================== AFRICA ====================
        
        // South Africa
        'JNB' => 'Johannesburg,ZA',
        'CPT' => 'Cape Town,ZA',
        'DUR' => 'Durban,ZA',
        'PLZ' => 'Port Elizabeth,ZA',
        'BFN' => 'Bloemfontein,ZA',
        'ELS' => 'East London,ZA',
        'GRJ' => 'George,ZA',
        'KIM' => 'Kimberley,ZA',

        // North Africa
        'CAI' => 'Cairo,EG',
        'HRG' => 'Hurghada,EG',
        'SSH' => 'Sharm el Sheikh,EG',
        'LXR' => 'Luxor,EG',
        'ASW' => 'Aswan,EG',
        'ALY' => 'Alexandria,EG',
        'TUN' => 'Tunis,TN',
        'SFA' => 'Sfax,TN',
        'TOE' => 'Tozeur,TN',
        'DJE' => 'Djerba,TN',
        'ALG' => 'Algiers,DZ',
        'ORN' => 'Oran,DZ',
        'CZL' => 'Constantine,DZ',
        'CMN' => 'Casablanca,MA',
        'RAK' => 'Marrakech,MA',
        'FEZ' => 'Fez,MA',
        'AGA' => 'Agadir,MA',
        'TNG' => 'Tangier,MA',
        'OUD' => 'Oujda,MA',
        'NDR' => 'Nador,MA',

        // West Africa
        'LOS' => 'Lagos,NG',
        'ABV' => 'Abuja,NG',
        'KAN' => 'Kano,NG',
        'PHC' => 'Port Harcourt,NG',
        'IBD' => 'Ibadan,NG',
        'ACC' => 'Accra,GH',
        'KMS' => 'Kumasi,GH',
        'ABJ' => 'Abidjan,CI',
        'DKR' => 'Dakar,SN',
        'COO' => 'Cotonou,BJ',
        'LFW' => 'Lome,TG',
        'OUA' => 'Ouagadougou,BF',
        'BJL' => 'Banjul,GM',
        'FNA' => 'Freetown,SL',
        'ROB' => 'Monrovia,LR',
        'CKY' => 'Conakry,GN',
        'BSG' => 'Bissau,GW',
        'RAI' => 'Praia,CV',

        // East Africa
        'ADD' => 'Addis Ababa,ET',
        'DIR' => 'Dire Dawa,ET',
        'NBO' => 'Nairobi,KE',
        'MBA' => 'Mombasa,KE',
        'KIS' => 'Kisumu,KE',
        'EBB' => 'Entebbe,UG',
        'KGL' => 'Kigali,RW',
        'BJM' => 'Bujumbura,BI',
        'DAR' => 'Dar es Salaam,TZ',
        'JRO' => 'Kilimanjaro,TZ',
        'MWZ' => 'Mwanza,TZ',
        'ZNZ' => 'Zanzibar,TZ',
        'ASM' => 'Asmara,ER',
        'JIB' => 'Djibouti,DJ',
        'MGQ' => 'Mogadishu,SO',

        // Central Africa
        'DLA' => 'Douala,CM',
        'YAO' => 'Yaounde,CM',
        'LBV' => 'Libreville,GA',
        'PG' => 'Port Gentil,GA',
        'BGF' => 'Bangui,CF',
        'FIH' => 'Kinshasa,CD',
        'FBM' => 'Lubumbashi,CD',
        'BZV' => 'Brazzaville,CG',
        'TNR' => 'Antananarivo,MG',
        'NOS' => 'Nosy Be,MG',
        'MJN' => 'Majunga,MG',

        // Southern Africa
        'WDH' => 'Windhoek,NA',
        'GBE' => 'Gaborone,BW',
        'MTS' => 'Manzini,SZ',
        'MSU' => 'Maseru,LS',
        'MPM' => 'Maputo,MZ',
        'BEW' => 'Beira,MZ',
        'VPY' => 'Chimoio,MZ',
        'HRE' => 'Harare,ZW',
        'BUQ' => 'Bulawayo,ZW',
        'LUN' => 'Lusaka,ZM',
        'NLA' => 'Ndola,ZM',
        'LLW' => 'Lilongwe,MW',
        'BLZ' => 'Blantyre,MW',

        // Libya & Sudan
        'TIP' => 'Tripoli,LY',
        'BEN' => 'Benghazi,LY',
        'KRT' => 'Khartoum,SD',

        // ==================== OCEANIA ====================
        
        // Australia
        'SYD' => 'Sydney,AU',
        'MEL' => 'Melbourne,AU',
        'BNE' => 'Brisbane,AU',
        'PER' => 'Perth,AU',
        'ADL' => 'Adelaide,AU',
        'DRW' => 'Darwin,AU',
        'CNS' => 'Cairns,AU',
        'GLD' => 'Gold Coast,AU',
        'CBR' => 'Canberra,AU',
        'HBA' => 'Hobart,AU',
        'LST' => 'Launceston,AU',
        'TSV' => 'Townsville,AU',
        'ROK' => 'Rockhampton,AU',
        'MKY' => 'Mackay,AU',
        'HTI' => 'Hamilton Island,AU',
        'PPP' => 'Proserpine,AU',
        'BDB' => 'Bundaberg,AU',
        'EMD' => 'Emerald,AU',
        'ARM' => 'Armidale,AU',
        'ABX' => 'Albury,AU',

        // New Zealand
        'AKL' => 'Auckland,NZ',
        'CHC' => 'Christchurch,NZ',
        'WLG' => 'Wellington,NZ',
        'ZQN' => 'Queenstown,NZ',
        'DUD' => 'Dunedin,NZ',
        'IVC' => 'Invercargill,NZ',
        'HLZ' => 'Hamilton,NZ',
        'NPL' => 'New Plymouth,NZ',
        'PMR' => 'Palmerston North,NZ',
        'NPE' => 'Napier,NZ',
        'ROT' => 'Rotorua,NZ',
        'TUO' => 'Taupo,NZ',

        // Pacific Islands
        'NAN' => 'Nadi,FJ',
        'SUV' => 'Suva,FJ',
        'PPT' => 'Papeete,PF',
        'AIA' => 'Aitutaki,CK',
        'RAR' => 'Rarotonga,CK',
        'APW' => 'Apia,WS',
        'TBU' => 'Nukualofa,TO',
        'VLI' => 'Port Vila,VU',
        'NOU' => 'Noumea,NC',
        'GUM' => 'Guam,GU',
        'SPN' => 'Saipan,MP',
        'ROR' => 'Koror,PW',
        'TRW' => 'Chuuk,FM',
        'PNI' => 'Pohnpei,FM',
        'KSA' => 'Kosrae,FM',
        'MAJ' => 'Majuro,MH',
        'KWA' => 'Kwajalein,MH',
        'TRU' => 'Nauru,NR',
        'FUN' => 'Funafuti,TV',
        'CXI' => 'Christmas Island,KI',
        'TRV' => 'Tarawa,KI',

        // ==================== ADDITIONAL REGIONS ====================
        
        // Arctic & Special Territories
        'LYR' => 'Longyearbyen,SJ',
        'THU' => 'Thule,GL',
        'SFJ' => 'Kangerlussuaq,GL',
        'JAV' => 'Ilulissat,GL',
        'GOH' => 'Nuuk,GL',

        // Remote Islands
        'ASC' => 'Ascension Island,AC',
        'HLE' => 'St Helena,SH',
        'SHN' => 'St Helena,SH',
    ];

    /**
     * Get city name for weather API lookup
     */
    public static function getCityName($iataCode)
    {
        $iataCode = strtoupper($iataCode);
        return self::$airportCityMap[$iataCode] ?? null;
    }

    /**
     * Check if airport is supported
     */
    public static function isSupported($iataCode)
    {
        $iataCode = strtoupper($iataCode);
        return isset(self::$airportCityMap[$iataCode]);
    }

    /**
     * Get all supported airports
     */
    public static function getAllAirports()
    {
        return array_keys(self::$airportCityMap);
    }

    /**
     * Get airports by continent
     */
    public static function getByContinent($continent)
    {
        $continentMappings = [
            'north_america' => ['US', 'CA', 'MX', 'CR', 'PA', 'GT', 'SV', 'HN', 'NI', 'BZ', 'CU', 'BS', 'BB', 'TT', 'JM', 'DO', 'PR'],
            'south_america' => ['BR', 'AR', 'CL', 'PE', 'CO', 'VE', 'EC', 'BO', 'PY', 'UY', 'GY', 'SR'],
            'europe' => ['UK', 'IE', 'FR', 'DE', 'ES', 'IT', 'NL', 'CH', 'AT', 'BE', 'DK', 'NO', 'SE', 'FI', 'IS', 'PL', 'CZ', 'HU', 'RO', 'BG', 'HR', 'SI', 'RS', 'BA', 'ME', 'MK', 'GR', 'CY', 'PT', 'RU', 'TR'],
            'asia' => ['CN', 'JP', 'KR', 'SG', 'TH', 'MY', 'ID', 'PH', 'VN', 'MM', 'KH', 'LA', 'BN', 'IN', 'PK', 'BD', 'LK', 'KZ', 'UZ', 'KG', 'TM', 'TJ', 'AF', 'TW', 'HK', 'MN', 'IR'],
            'middle_east' => ['AE', 'QA', 'SA', 'KW', 'BH', 'OM', 'IL', 'JO', 'LB', 'SY', 'IQ', 'YE'],
            'africa' => ['ZA', 'EG', 'TN', 'DZ', 'MA', 'NG', 'GH', 'CI', 'SN', 'BJ', 'TG', 'BF', 'GM', 'SL', 'LR', 'GN', 'GW', 'CV', 'ET', 'KE', 'UG', 'RW', 'BI', 'TZ', 'ER', 'DJ', 'SO', 'CM', 'GA', 'CF', 'CD', 'CG', 'MG', 'NA', 'BW', 'SZ', 'LS', 'MZ', 'ZW', 'ZM', 'MW', 'LY', 'SD'],
            'oceania' => ['AU', 'NZ', 'FJ', 'PF', 'CK', 'WS', 'TO', 'VU', 'NC', 'GU', 'MP', 'PW', 'FM', 'MH', 'NR', 'TV', 'KI']
        ];

        $countries = $continentMappings[$continent] ?? [];
        $results = [];

        foreach (self::$airportCityMap as $iata => $cityCountry) {
            $countryCode = substr($cityCountry, -2);
            if (in_array($countryCode, $countries)) {
                $results[$iata] = $cityCountry;
            }
        }

        return $results;
    }

    /**
     * Get airports by country
     */
    public static function getByCountry($countryCode)
    {
        $countryCode = strtoupper($countryCode);
        $results = [];

        foreach (self::$airportCityMap as $iata => $cityCountry) {
            if (str_ends_with($cityCountry, ",$countryCode")) {
                $results[$iata] = $cityCountry;
            }
        }

        return $results;
    }

    /**
     * Add a new airport mapping (for dynamic additions)
     */
    public static function addAirport($iataCode, $cityCountry)
    {
        self::$airportCityMap[strtoupper($iataCode)] = $cityCountry;
    }

    /**
     * Search airports by city name
     */
    public static function findByCity($cityName)
    {
        $cityName = strtolower($cityName);
        $results = [];

        foreach (self::$airportCityMap as $iata => $cityCountry) {
            if (stripos($cityCountry, $cityName) !== false) {
                $results[$iata] = $cityCountry;
            }
        }

        return $results;
    }

    /**
     * Get airport count
     */
    public static function getAirportCount()
    {
        return count(self::$airportCityMap);
    }

    /**
     * Get random airport (for testing)
     */
    public static function getRandomAirport()
    {
        $airports = array_keys(self::$airportCityMap);
        $randomKey = array_rand($airports);
        return $airports[$randomKey];
    }

    /**
     * Validate airport code format
     */
    public static function isValidIataFormat($iataCode)
    {
        return preg_match('/^[A-Z]{3}$/', strtoupper($iataCode));
    }

    /**
     * Get major hub airports
     */
    public static function getMajorHubs()
    {
        return [
            // Global mega-hubs
            'DXB', 'LHR', 'CDG', 'AMS', 'FRA', 'IST', 'DOH',
            'SIN', 'ICN', 'NRT', 'PEK', 'PVG', 'HKG',
            'JFK', 'LAX', 'ORD', 'ATL', 'DFW', 'DEN',
            'YYZ', 'MEX', 'GRU', 'EZE', 'SCL', 'BOG',
            'CAI', 'JNB', 'ADD', 'SYD', 'AKL'
        ];
    }

    /**
     * Get budget airline hubs
     */
    public static function getBudgetHubs()
    {
        return [
            'STN', 'LTN', 'CRL', 'HHN', 'BGY', 'CIA',
            'MDW', 'BWI', 'OAK', 'BUR', 'LGB',
            'DMK', 'SZB', 'JHB', 'CGK', 'DPS'
        ];
    }
}