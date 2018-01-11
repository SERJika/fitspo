<?php include(BASE_DOMAIN . '/views/header-min.php');?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-4 padding-right">

			<?php if (isset($errors)) && is_array($errors)): ?>
				<ul>
				    <?php foreach ($errors as $error): ?>
				    	<li> - <?php echo $error; ?></li>
				    <?php endforeach: ?>
				</ul>
			<?php endif; ?>
				<div class="signup-form">
					<h2>Вход в личный кабинет</h2>
					<form action="">
						<input type="text">
						<input type="text">
						<input type="text">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include(BASE_DOMAIN . '/views/footer-min.php');?>