<?php

require_once '../bootstrap.php';

use Core\Database\DBAL\Database;

require_once __DIR__ . '/../Core/Database/DBAL/Database.php';


class UUID
{
    public static function v4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}


/** @var PDO $db */
$db = Database::Get()->getConnection();

/**
 * Clean Table
 */
$delete_query = 'TRUNCATE TABLE reference_table';
$db->exec($delete_query);

/**
 * Repopulate Table
 */

$known_transfer_lookup = [
    // May 2022
    5881982 => 'May 30 2022',
    5883773 => 'May 31 2022',

    // June 2022
    5890000 => 'June 1 2022',
    5897104 => 'June 2 2022',
    5904381 => 'June 3 2022',
    5908925 => 'June 4 2022',
    5911428 => 'June 5 2022',
    5913691 => 'June 6 2022',
    5918779 => 'June 7 2022',
    5922663 => 'June 8 2022',
    5925474 => 'June 9 2022',
    5928122 => 'June 10 2022',
    5930871 => 'June 11 2022',
    5931719 => 'June 12 2022',
    5932487 => 'June 13 2022',
    5935312 => 'June 14 2022',
    5937255 => 'June 15 2022',
    5938940 => 'June 16 2022',
    5940677 => 'June 17 2022',
    5942340 => 'June 18 2022',
    5943074 => 'June 19 2022',
    5943419 => 'June 20 2022',
    5945166 => 'June 21 2022',
    5947103 => 'June 22 2022',
    5948859 => 'June 23 2022',
    5950781 => 'June 24 2022',
    5952321 => 'June 25 2022',
    5952680 => 'June 26 2022',
    5953005 => 'June 27 2022',
    5954338 => 'June 28 2022',
    5955370 => 'June 29 2022',
    5956546 => 'June 30 2022',

    // July 2022
    5957681 => 'July 1 2022',
    5957841 => 'July 2 2022',
    5958120 => 'July 3 2022',
    5958158 => 'July 4 2022',
    5959279 => 'July 5 2022',
    5960595 => 'July 6 2022',
    5961610 => 'July 7 2022',
    5962889 => 'July 8 2022',
    5963155 => 'July 9 2022',
    5963675 => 'July 10 2022',
    5963748 => 'July 11 2022',
    5965003 => 'July 12 2022',
    5966145 => 'July 13 2022',
    5967008 => 'July 14 2022',
    5967973 => 'July 15 2022',
    5969147 => 'July 16 2022',
    5969444 => 'July 17 2022',
    5969530 => 'July 18 2022',
    5970502 => 'July 19 2022',
];

$db->beginTransaction();
$insert_query = 'INSERT INTO reference_table (reference, date_transfer_requested) VALUES (?, ?)';
$insert_sth = $db->prepare($insert_query);
var_dump("Preparing queries");
foreach(range(5881982, 5971556) as $ref) {

    $last_min_ref = null;
    $last_ref_date = null;

    foreach($known_transfer_lookup as $min_ref => $ref_date){
        if($ref < $min_ref) {
            break;
        }

        $last_min_ref = $min_ref;
        $last_ref_date = $ref_date;
    }


    $insert_sth->execute([
        $ref,
        date('Y-m-d', strtotime($last_ref_date)),
    ]);


}
var_dump("Comitting");
$db->commit();

var_dump("Done");
