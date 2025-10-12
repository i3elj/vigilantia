<?php
use function Agmen\globals;
use function Agmen\snip;
?>

<?= globals("head", [
	"title" => "Report Incident",
	"scripts" => ["/js/report.js"],
]) ?>

<main class="p-xs">
	<a href="<?= r->getPath("home") ?>">
		<i class="ph ph-arrow-left mr-3xs"></i><?= trans('goBack') ?>
	</a>

	<h2 class="text-center mb-sm"><?= trans("report") ?></h2>

	<form class="card card-body gap-md w-[620px] h-fit rounded bg-base-100 shadow"
		hx-post="<?= r->getPath("report") ?>"
		hx-trigger="submit"
		hx-encoding="multipart/form-data" >
		<div class="flex flex-wrap gap-md w-full">
			<div class="w-full">
				<h3 class="mb-xs">Info</h3>

				<fieldset class="fieldset">
					<legend class="fieldset-legend relative">
						<?= trans("crimeType") ?>
						<span class="absolute text-red-400 -right-4">*</span>
					</legend>
					<input class="input w-full"
						type="text"
						name="title"
						placeholder="<?= trans("crimeTypePlaceholder") ?>"
						data-select="input"
						required />
				</fieldset>

				<fieldset class="fieldset">
					<legend class="fieldset-legend">
						<?= trans("descriptionTitle") ?>
					</legend>
					<textarea class="textarea font-mono w-full"
						name="description"
						placeholder="<?= trans("descriptionPlaceholder") ?>"
						data-select="input" ></textarea>
					<p class="label"><?= trans("optional") ?></p>
				</fieldset>

				<fieldset class="fieldset flex">
					<legend class="fieldset-legend relative">
						<?= trans("datetime") ?>
						<span class="absolute text-red-400 -right-4">*</span>
					</legend>
					<input class="input w-full"
						type="datetime-local"
						name="datetime"
						data-select="input"
						required />
					<button id="justNowBtn" type="button" class="btn btn-accent">
						<?= trans("justnow") ?>
					</button>
				</fieldset>
			</div>

			<div class="w-full">
				<div class="flex items-center justify-between mb-xs">
					<h3 class="relative">
						<?= trans("evidences") ?>
						<span class="absolute text-red-400 -right-4">*</span>
					</h3>

					<label class="btn btn-info">
						<i class="ph ph-upload-simple"></i>
						<?= trans("choosePhotos") ?>
						<input id="file-input" class="hidden"
							name="evidences"
							type="file"
							multiple
							accept="image/*"
							data-select="input"
							required />
					</label>
				</div>

				<label id="mural" class="flex flex-wrap items-center justify-center gap-sm min-h-68 max-h-68 p-sm w-full border-4 border-primary border-dashed overflow-y-scroll">
					<img id="imagePlaceholder" class="hidden w-40 h-40 object-cover border border-neutral rounded shadow" />
				</label>
			</div>
		</div>

		<div class="relative flex flex-col gap-3xs">
			<h3 class="relative w-fit">
				<?= trans("where") ?>
				<span class="absolute text-red-400 -right-4">*</span>
			</h3>

			<fieldset class="fieldset relative w-full">
				<legend class="fieldset-legend">
					<?= trans("chooseLocation") ?>
				</legend>

				<div class="relative has-[input[name='coord'][value]:not([value=''])]:outline-secondary outline-transparent outline-2 rounded">
					<input
						class="absolute top-[45%] right-[50%] translate-x-[50%] opacity-0 -z-1"
						type="hidden"
						name="coords"
						data-select="input"
						required />
					<div id="map" class="w-full h-100 border border-primary rounded shadow z-0"></div>

					<span class="absolute bottom-2xs left-2xs z-1">
						<?= snip("getCurrentLocationBtn") ?>
					</span>
				</div>
			</fieldset>
		</div>

		<div class="card-actions mt-sm">
			<button class="btn btn-xl btn-success w-full" type="submit">
				<?= trans("sendReport") ?>
			</button>
		</div>
	</form>
</main>

<?= globals("footer") ?>
