<?php include('header.php') ?>
<main class="column is-8">

	<div class="main-padd">
		<div class="content">
			<h1 class="title is-3 has-text-centered">
				<?php echo $company['name'] ?>	
			</h1>
			<p><?php echo "{$company['name']} is a {$company['class']} incorporated that has been registered on ". date("d F Y", $company['reg_date']) ." in {$company['state']}, India. The Corporate Identity Number of this company is {$company['id']}. This company has been categorized as a {$company['category']} by {$company['registrar']}. The authorized share capital of {$company['name']} is {$company['authorized_capital']} INR and the paid-up capital is {$company['paidup_capital']} INR." ?></p>
			<p><?php echo "The registered address of {$company['name']} is {$company['address']} and you can also contract this company by sending email at {$company['email']}." ?></p>
		</div>

		<div class="subtitle is-4">Basic Information</div>
		<table class="table is-fullwidth">
			<tbody>
				<tr>
					<th>Company CIN</th>
					<td><?php echo $company['id'] ?></td>
				</tr>
				<tr>
					<th>Name</th>
					<td><?php echo $company['name'] ?></td>
				</tr>
				<tr>
					<th>Registration Data</th>
					<td><?php echo date('d M Y',  $company['reg_date']) ?> (<?php echo timeago($company['reg_date']) ?>)</td>
				</tr>
				<tr>
					<th>Status</th>
					<td><?php echo $company['status'] ?></td>
				</tr>
				<tr>
					<th>Class</th>
					<td><?php echo $company['class'] ?></td>
				</tr>
				<tr>
					<th>Category</th>
					<td><?php echo $company['category'] ?></td>
				</tr>
				<tr>
					<th>Sub Category</th>
					<td><?php echo $company['sub_category'] ?></td>
				</tr>
			</tbody>
		</table>

		<div class="subtitle is-4">Share Capital Information</div>
		<table class="table is-fullwidth">
			<tbody>
				<tr>
					<th>Authorized Capital</th>
					<td>&#x20B9; <?php echo number_format($company['authorized_capital'], 2) ?> INR</td>
				</tr>
				<tr>
					<th>Paidup Capital</th>
					<td>&#x20B9; <?php echo number_format($company['paidup_capital'], 2) ?> INR</td>
				</tr>
				<tr>
					<th>Paidup Capital Ratio</th>
					<td><?php echo ceil((($company['paidup_capital'] / $company['authorized_capital']) * 100)) ?>%</td>
				</tr>
			</tbody>
		</table>

		<div class="subtitle is-4">Contact Information</div>
		<table class="table is-fullwidth">
			<tbody>
				<tr>
					<th>State</th>
					<td><?php echo $company['state'] ?></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><?php echo ucwords(strtolower($company['address'])) ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $company['email'] ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</main>

<aside class="column">
	<ul class="menu-list">
	<?php foreach ($related as $r): ?>
		<li><?php echo "<a href=\"/company/{$r['id']}\">{$r['name']}</a>" ?></li>
	<?php endforeach ?>
	</ul>


	<ul class="menu-list">
	<?php foreach ($nare as $r): ?>
		<li><?php echo "<a href=\"/company/{$r['id']}\">{$r['name']}</a>" ?></li>
	<?php endforeach ?>
	</ul>
</aside>
<?php include('footer.php') ?>