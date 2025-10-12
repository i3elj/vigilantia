<?php
use function Agmen\globals;
use function Agmen\snip;
?>

<?= globals("head", [
	"title" => "Test",
	"scripts" => ["/js/main.js", "/js/crimes.js"],
]) ?>

<div id="controls" class="absolute flex items-center w-full bottom-lg z-1">
	<div class="flex items-center justify-end flex-1 px-sm gap-sm"></div>

	<div>
		<a class="btn btn-xl btn-error border border-error-content shadow-lg"
			href="<?= r->getPath("report") ?>"
		>
			<i class="ph ph-warning"></i>
			<p class="w-fit"><?= trans('report') ?></p>
		</a>
	</div>

	<div class="flex items-center justify-start flex-1 px-sm gap-sm">
		<?= snip("getCurrentLocationBtn") ?>
	</div>
</div>

<div id="map" class="w-screen h-screen bg-red-100 z-0"></div>


<?= globals("footer") ?>
