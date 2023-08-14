<?php

declare(strict_types=1);

namespace App\Models;

use PDO;

class HikeDatabase extends Database
{
    public function findAll(int $limit = 0): array
    {
        if ($limit === 0) {
            $sql = "SELECT * FROM hikes";
        } else {
            $sql = "SELECT * FROM hikes LIMIT " . $limit;
        }
        $stmt = $this->query($sql);
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $hikes;
    }

    public function find(string $hikeId): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM hikes WHERE ID = ?",
            [$hikeId]
        );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
