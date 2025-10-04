<?php declare(strict_types=1);

namespace Handlers;

use Agmen\Http\Status;
use Agmen\Request;
use DateTime;
use Resources\CrimeImages\CrimeImages;
use Resources\Crimes\Crimes;
use function Agmen\get_upload_dir;
use function Agmen\globals;
use function Agmen\view;

class ReportHandler
{
	public static function get()
	{
		view("report");
	}

	public static function post(Request $req)
	{
		$form = $req->getForm();
		$files = $req->getFiles()["evidences"];
		$filesReady = [];

		foreach ($files as $file) {
			$sanitizedName = str_replace(" ", "-", $file["name"]);
			$uploadDir = get_upload_dir();
			$destination = "$uploadDir$sanitizedName";
			$allowedTypes = ["image/jpeg", "image/png"];

			if (!in_array($file["type"], $allowedTypes)) {
				Status::bad_request(kill: false);
				globals("notification", [
					"msg" => "Incorrect file type of file: \"$sanitizedName\"",
					"success" => false,
				]);
				return;
			}

			$filesReady[] = [
				"tmpPath" => $file["tmp_name"],
				"destination" => $destination,
			];
		}

		$coords = json_decode(
			html_entity_decode($form["coords"], ENT_QUOTES, "UTF-8"),
			true,
		);
		$datetime = DateTime::createFromFormat("Y-m-d\TH:i", $form["datetime"]);

		if (!$datetime) {
			Status::bad_request(kill: false);
			globals("notification", [
				"msg" =>
					"Datetime format is wrong, please use the following format: Y-m-d\TH:i",
				"success" => false,
			]);
			return;
		}

		$sqliteDateTime = $datetime->format("Y-m-d H:i:s");
		$crimeId = Crimes::insert(
			$form["title"],
			$form["description"],
			$coords,
			$sqliteDateTime,
		);

		foreach ($filesReady as $file) {
			if (!move_uploaded_file($file["tmpPath"], $file["destination"])) {
				Status::internal_server_error(kill: false);
				globals("notification", [
					"msg" => "Coudn't upload the file \"$sanitizedName\". If the error persist, please contact me!",
					"success" => false,
				]);
				return;
			}

			CrimeImages::insert($crimeId, $file["destination"]);
		}

		header("HX-Trigger: hx-clearInputs");
		globals("notification", [
			"msg" => "Report saved successfully!",
			"success" => true,
		]);
		return;
	}
}
