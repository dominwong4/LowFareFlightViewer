<?php

return [
    'booking_base_uri' => env('HKEXPRESS_BOOKING_BASE_URI', 'https://booking-api.hkexpress.com/api/v1.0/'),
    'booking_url' => env('HKEXPRESS_BOOKING_URL', 'booking/session'),
    'booking_api_key' => env('HKEXPRESS_BOOKING_API_KEY','1a739d42f96658378a0ac7804fefdb2ebd649182e4971c99a3edd1e949277270'),
    'availability_base_uri' => env('HKEXPRESS_AVAILABLILITY_BASE_URI','https://availability-api.hkexpress.com/api/v1.0/'),
    'availability_url' => env('HKEXPRESS_AVAILABLILITY_URL','availability/lowfareavailability'),
    'availability_api_key' => env('HKEXPRESS_AVAILABLILITY_API_KEY','d9eaa63c9008987381860a36e0d8c2aa2c6a936b41bf35e42bbe11e97bd452ea')
];
