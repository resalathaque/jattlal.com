<?php include(app_path .'views/info/header.php') ?>
<main class="column is-9">

	<?php foreach ($companies as $company): ?>
		<article class="media">
			<figure class="media-left">
				<p class="image is-64x64">
					<img src="/industrialicondarkblue.png">
				</p>
			</figure>
			<div class="media-content">
				<div class="content">
					<p>
						<strong><?php echo "<a href=\"/company/{$company['id']}\">{$company['name']}</a>" ?></strong>
						<br>
						<small>Registed at <?php echo timeago(strtotime($company['reg_date'])) ?> ago</small>
						<br>

						<?php printf("%s is a %s incorporated that has been registered on %s in %s, India. The Corporate Identity Number of this company is %s.",
							str::title($company['name']), $company['class'], date("d F Y", strtotime($company['reg_date'])), $company['state'], $company['id']) ?>
					</p>
				</div>
			</div>
		</article>
	<?php endforeach ?>

</main>

<aside class="column">

</aside>
<?php include(app_path .'views/info/footer.php') ?>