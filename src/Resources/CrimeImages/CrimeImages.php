<?php declare(strict_types=1);

namespace Resources\CrimeImages;

use Agmen\Database;

class CrimeImages
{
	public static function insert(int $crimeId, string $path): int
	{
		$db = Database::connect();
		return (int) $db
			->sql(
				"INSERT INTO crime_images (crimeId, imagePath)
				VALUES (:id, :path)",
				[$crimeId, $path],
			)
			->lastInsertId();
	}
}
