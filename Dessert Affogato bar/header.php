<?php
// header.php
// Reusable header with variant support. Set $header_variant = 'standard'|'compact'|'hero' before including.
if (!isset($header_variant)) {
	$header_variant = 'standard';
}
if (!isset($site_title)) {
	$site_title = 'The Deconstructed Dessert / Affogato Bar';
}

// active link helper
function _is_active($path) {
	$current = basename($_SERVER['SCRIPT_NAME']);
	return $current === $path ? 'active' : '';
}

?>
<a class="skip-link" href="#main-content">Skip to content</a>

<?php if ($header_variant === 'hero'): ?>
	<header class="site-header site-header-hero">
		<div class="site-header-hero-inner">
			<div class="hero-content">
				<h1 class="hero-title"><?php echo htmlspecialchars($site_title); ?></h1>
				<p class="hero-sub">Deconstructed desserts, artisan breads, and specialty coffee.</p>
				<p class="hero-cta">
					<a class="btn" href="index.php">View Menu</a>
					<a class="btn btn-secondary" href="about.php">Our Story</a>
				</p>
			</div>
			<nav class="site-nav">
				<a class="nav-link <?php echo _is_active('index.php'); ?>" href="index.php">Home</a>
				<a class="nav-link <?php echo _is_active('about.php'); ?>" href="about.php">About</a>
				<a class="nav-link <?php echo _is_active('stock.php'); ?>" href="stock.php">Stock</a>
			</nav>
		</div>
	</header>
<?php elseif ($header_variant === 'compact'): ?>
	<header class="site-header site-header-compact">
		<div class="site-header-inner">
			<a class="brand" href="index.php">
				<img src="img/Coffee.avif" alt="Logo" class="brand-logo" width="40" height="40" />
				<span class="site-title-small"><?php echo htmlspecialchars($site_title); ?></span>
			</a>
			<nav class="site-nav">
				<a class="nav-link <?php echo _is_active('index.php'); ?>" href="index.php">Home</a>
				<a class="nav-link <?php echo _is_active('about.php'); ?>" href="about.php">About</a>
				<a class="nav-link <?php echo _is_active('stock.php'); ?>" href="stock.php">Stock</a>
			</nav>
		</div>
	</header>
<?php else: ?>
	<header class="site-header">
		<div class="site-header-inner">
			<a class="brand" href="index.php">
				<img src="img/Coffee.avif" alt="Logo" class="brand-logo" width="48" height="48" />
				<span class="site-title"><?php echo htmlspecialchars($site_title); ?></span>
			</a>
			<nav class="site-nav">
				<a class="nav-link <?php echo _is_active('index.php'); ?>" href="index.php">Home</a>
				<a class="nav-link <?php echo _is_active('about.php'); ?>" href="about.php">About</a>
				<a class="nav-link <?php echo _is_active('stock.php'); ?>" href="stock.php">Stock</a>
			</nav>
		</div>
	</header>
<?php endif; ?>

