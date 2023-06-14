		</div>
	</div>
	
	<footer>
		<section class="hero is-dark">
			<div class="hero-body">
				<div class="container has-text-centered">
					<p>
						&copy; <a style="border-bottom: 1px solid" href="/">JattLal.com</a> all rights reserved.
					</p>
				</div>
			</div>
		</section>
	</footer>
	
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
			if ($navbarBurgers.length > 0) {
				$navbarBurgers.forEach( el => {
					el.addEventListener('click', () => {
						const target = el.dataset.target;
						const $target = document.getElementById(target);
						el.classList.toggle('is-active');
						$target.classList.toggle('is-active');

					});
				});
			}
		});
	</script>
</body>
</html>