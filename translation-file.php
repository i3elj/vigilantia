<?php declare(strict_types=1);

$locale = explode(",", $_SERVER["HTTP_ACCEPT_LANGUAGE"])[0];
$translations = match ($locale) {
	"pt-BR" => [
		"report" => "Relatar Crime",
		"crimeType" => "Tipo de crime/violência",
		"crimeTypePlaceholder" => "Latrocínio/furto/vandalismo...",
		"descriptionTitle" => "Descrição Breve",
		"descriptionPlaceholder" => "Um cara alto me roubou...",
		"optional" => "Opcional",
		"datetime" => "Data e Hora",
		"justnow" => "Foi Agora!",
		"evidences" => "Evidências",
		"choosePhotos" => "Escolher Fotos",
		"where" => "Onde?",
		"chooseLocation" => "Escolha um local no mapa...",
		"sendReport" => "Enviar Relatório",
		"goBack" => "Voltar",
	],
	default => [
		"report" => "Report Incident",
		"crimeType" => "Crime/violence type",
		"crimeTypePlaceholder" => "Armed robbery/theft/vandalism...",
		"descriptionTitle" => "Brief Description",
		"descriptionPlaceholder" => "Tall guy robbed me in...",
		"optional" => "Optional",
		"datetime" => "Date and Time",
		"justnow" => "Just Now!",
		"evidences" => "Evidences",
		"choosePhotos" => "Choose Photos",
		"where" => "Where?",
		"chooseLocation" => "Choose a location on the map...",
		"sendReport" => "Send Report",
		"goBack" => "Go Back",
	],
};

function trans($textName)
{
	global $translations;
	return $translations[$textName];
}
