<?php

// app/Helpers/CustomHelper.php

// if (!function_exists('generateDriverNumber')) {
//     function generateDriverNumber()
//     {
//         $currentYear = date('Y');
//         $latestDriver = \App\Models\User::where('driver_number', 'like', 'DRV' . $currentYear . '%')->orderByDesc('driver_number')->first();

//         if (!$latestDriver) {
//             return 'DRV' . $currentYear . '001';
//         }

//         $latestNumber = (int)substr($latestDriver->driver_number, -3);
//         $newNumber = str_pad($latestNumber + 1, 3, '0', STR_PAD_LEFT);

//         return 'DRV' . $currentYear . $newNumber;
//     }
// }
