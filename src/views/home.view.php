<?php use function Agmen\globals; ?>

<?= globals("head", ["title" => "Test"]) ?>

<main class="p-md">
	<div class="card card-border border-base-300 bg-base-100 w-fit shadow">
		<div class="card-body">
			<h4 class="card-title text-primary">Hello world</h4>
			<p class="text-primary-content">testing 123</p>
		</div>
	</div>
</main>

<?= globals("footer") ?>
