<?php

namespace App\Repositories;

use Core\Database\DBAL\Database;
use App\Models\Reference;

require_once __DIR__ . '/../../Core/Database/DBAL/Database.php';
require_once __DIR__ . '/../Models/Reference.php';

class RefRepository
{
    public static function getReference(int $ref_number)
    {
        /** @var PDO $db */
        $db = Database::Get()->getConnection();

        $references = null;

        $query = 'SELECT * FROM reference_table WHERE reference = :number';
        $sth = $db->prepare($query);
        $sth->execute([':number' => $ref_number]);
        $result = $sth->fetchAll();
        foreach($result as $row) {
            $references = new Reference($row);
        }

        return $references;
    }
}
