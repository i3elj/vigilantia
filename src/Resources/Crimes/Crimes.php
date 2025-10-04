<?php declare(strict_types=1);

namespace Resources\Crimes;

use Agmen\Database;

class Crimes
{
	public static function insert(
		string $title,
		string $description,
		array $coord,
		string $datetime,
	): int {
		$db = Database::connect();
		return (int) $db
			->sql(
				<<<SQL
					INSERT INTO crimes
						(title, latitude, longitude, description, datetime)
					VALUES
						(:title, :lat, :lng, :description, :datetime)
				SQL
				,
				[$title, $coord["lat"], $coord["lng"], $description, $datetime],
			)
			->lastInsertId();
	}

	public static function all(?int $years = null): array
	{
		$db = Database::connect();

		if ($years === null) {
			[$rows, $count] = $db->sqlr(
				"SELECT * FROM crimes
				WHERE datetime >= DATETIME('now', '-1 years')",
			);
			return $rows;
		}

		[$rows, $count] = $db->sqlr(
			<<<SQL
			SELECT * FROM crimes
			WHERE datetime >= DATETIME('now', '-' || :years || ' years')
			ORDER BY datetime DESC
			SQL
			,
			[$years],
		);

		return $rows;
	}
}
