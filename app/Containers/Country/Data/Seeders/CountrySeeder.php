<?php

namespace App\Containers\Country\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\HKExpress\Value\HKExpressResponseValue;
use App\Ship\Parents\Seeders\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Country@CreateCountryTask', [
            [
                'name' => 'Hong Kong SAR'
            ]
        ]);

        Apiato::call('Country@CreateCountryTask', [
            [
                'name' => 'Cambodia'
            ]
        ]);

        Apiato::call('Country@CreateCountryTask', [
            [
                'name' => 'Mainland China'
            ]
        ]);

        Apiato::call('Country@CreateCountryTask', [
            [
                'name' => 'Japan'
            ]
        ]);

        Apiato::call('Country@CreateCountryTask', [
            [
                'name' => 'South Korea'
            ]
        ]);

        Apiato::call('Country@CreateCountryTask', [
            [
                'name' => 'Taiwan'
            ]
        ]);

        Apiato::call('Country@CreateCountryTask', [
            [
                'name' => 'Thailand'
            ]
        ]);

        Apiato::call('Country@CreateCountryTask', [
            [
                'name' => 'Northern Mariana Islands'
            ]
        ]);

        Apiato::call('Country@CreateCountryTask', [
            [
                'name' => 'Vietnam'
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'HKG',
                'name' => 'Hong Kong',
                'country_id' => 1
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'REP',
                'name' => 'Siem Reap',
                'country_id' => 2
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'NGB',
                'name' => 'Ningbo',
                'country_id' => 3
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'FUK',
                'name' => 'Fukuoka',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'HIJ',
                'name' => 'Hiroshima',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'ISG',
                'name' => 'Ishigaki',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'KOJ',
                'name' => 'Kagoshima',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'KMJ',
                'name' => 'Kumamoto',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'NGS',
                'name' => 'Nagasaki',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'NGO',
                'name' => 'Nagoya',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'KIX',
                'name' => 'Osaka',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'SHI',
                'name' => 'Miyako',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'TAK',
                'name' => 'Takamatsu',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'TYO',
                'name' => 'Tokyo (All Airports)',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'HND',
                'name' => 'Tokyo (Haneda)',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'NRT',
                'name' => 'Tokyo (Narita)',
                'country_id' => 4
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'PUS',
                'name' => 'Busan',
                'country_id' => 5
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'CJU',
                'name' => 'Jeju',
                'country_id' => 5
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'ICN',
                'name' => 'Seoul (Incheon)',
                'country_id' => 5
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'RMQ',
                'name' => 'Taichung',
                'country_id' => 6
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'BKK',
                'name' => 'BangKok',
                'country_id' => 7
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'CNX',
                'name' => 'Chiang Mai',
                'country_id' => 7
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'CEI',
                'name' => 'Chiang Rai',
                'country_id' => 7
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'HKT',
                'name' => 'Phuket',
                'country_id' => 7
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'SPN',
                'name' => 'Saipan',
                'country_id' => 8
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'DAD',
                'name' => 'Da Nang',
                'country_id' => 9
            ]
        ]);

        Apiato::call('Location@CreateLocationTask', [
            [
                'code' => 'CXR',
                'name' => 'Nha Trang',
                'country_id' => 9
            ]
        ]);

    }
}
