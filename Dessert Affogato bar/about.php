<?php
$site_title = 'About — The Deconstructed Dessert / Affogato Bar';
$header_variant = 'standard';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($site_title) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<main id="main-content" class="about-main">
    <div class="menu-container">
        <section class="about-content">
            <h2 class="menu-heading">Our Story</h2>
            <p class="about-lead">We combine the precision of pastry with the warmth of a neighborhood cafe.</p>
            
            <div class="about-section-content">
                <h3>Welcome to The Artisan Trifecta</h3>
                <p>
                    Welcome to <strong>The Artisan Trifecta</strong> — a unique bar bringing together
                    <em>Deconstructed Desserts</em>, <em>Artisan Breads</em>, and <em>Specialty Coffee</em>.
                </p>
                <p>
                    Our philosophy is simple: celebrate craftsmanship, creativity, and flavor.
                    Every loaf, cake, and cup is made with passion and precision.
                </p>
                <p>
                    Whether you're here for a quick espresso, a decadent dessert, or a rustic bread,
                    we promise an experience that delights all senses.
                </p>
            </div>
        </section>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
