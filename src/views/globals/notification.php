<?php
$timer ??= 10_000;
$randId = time();

if (!headers_sent()) {
	header("HX-Reswap: afterbegin");
	header("HX-Retarget: #notification-container");
}
?>

<div id="notify-<?= $randId ?>" class="flex items-center gap-3xs p-xs border-2 rounded
	<?= $success
 	? "border-green-400 bg-green-50 text-green-600"
 	: "border-red-400 bg-red-50 text-red-600" ?>"
>
	<button id="close-<?= $randId ?>" class="cursor-pointer">
		<i class="ph ph-x-circle"></i>
	</button>
	<?= $msg ?>

	<script type="module">
		const notification = document.querySelector("#notify-<?= $randId ?>");
		const id = setTimeout(() => notification.remove(), <?= $timer ?>);

		document
			.querySelector("#close-<?= $randId ?>")
			.addEventListener('click', () => {
				clearTimeout(id);
				notification.remove();
			});
	</script>
</div>
