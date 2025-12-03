<?php
// --- MENU DATA STRUCTURE (ARRAY) ---
$menu = [
    'Artisan Breads & Savory Pastries' => [
        ['name' => 'Sourdough Loaf (Whole)', 'price' => 420, 'best_seller_rank' => 3],
        ['name' => 'Rosemary Sea Salt Focaccia Slice', 'price' => 224, 'best_seller_rank' => 5],
        ['name' => 'Classic French Baguette', 'price' => 280, 'best_seller_rank' => 7],
        ['name' => 'Spiced Cardamom Milk Bread', 'price' => 364, 'best_seller_rank' => 1],
        ['name' => 'Prosciutto & Gruyere Croissant', 'price' => 322, 'best_seller_rank' => 2],
        ['name' => 'Everything Bagel & Chive Cream Cheese', 'price' => 252, 'best_seller_rank' => 4],
        ['name' => 'Gluten-Free Seeded Loaf', 'price' => 448, 'best_seller_rank' => 6],
        ['name' => 'Ciabatta with Sun-Dried Tomatoes', 'price' => 298, 'best_seller_rank' => 8],
        ['name' => 'Walnut & Raisin Whole Wheat Loaf', 'price' => 392, 'best_seller_rank' => 9],
        ['name' => 'Spinach & Feta Cheese Danish', 'price' => 280, 'best_seller_rank' => 10],
        ['name' => 'Multigrain Seed Crackers', 'price' => 168, 'best_seller_rank' => 11],
    ],
    'Signature Cakes & Confections' => [
        ['name' => 'Hazelnut Dacquoise Layer Cake', 'price' => 476, 'best_seller_rank' => 3],
        ['name' => 'Mini Valrhona Chocolate Lava Cake', 'price' => 392, 'best_seller_rank' => 1],
        ['name' => 'Pistachio Madeleines (3-pack)', 'price' => 294, 'best_seller_rank' => 5],
        ['name' => 'Lemon Blueberry Pound Cake Slice', 'price' => 336, 'best_seller_rank' => 2],
        ['name' => 'Salted Caramel Tartlet', 'price' => 406, 'best_seller_rank' => 4],
        ['name' => 'Triple Chocolate Brownie', 'price' => 280, 'best_seller_rank' => 6],
        ['name' => 'Raspberry Cheesecake Slice', 'price' => 420, 'best_seller_rank' => 7],
        ['name' => 'Vanilla Bean Macaron Pack (6)', 'price' => 336, 'best_seller_rank' => 8],
        ['name' => 'Dark Chocolate Tart with Gold Leaf', 'price' => 504, 'best_seller_rank' => 9],
    ],
    'Specialty Coffee & Espresso' => [
        ['name' => 'Signature House Blend Drip Coffee', 'price' => 168, 'best_seller_rank' => 5],
        ['name' => 'Single Origin Pour-Over', 'price' => 266, 'best_seller_rank' => 4],
        ['name' => 'Classic Affogato (Espresso + Vanilla Ice Cream)', 'price' => 336, 'best_seller_rank' => 1],
        ['name' => 'Lavender Honey Latte', 'price' => 308, 'best_seller_rank' => 2],
        ['name' => 'Cold Brew Nitro Tap', 'price' => 252, 'best_seller_rank' => 3],
        ['name' => 'Double Espresso Shot', 'price' => 112, 'best_seller_rank' => 6],
        ['name' => 'Cappuccino with Oat Milk', 'price' => 224, 'best_seller_rank' => 7],
        ['name' => 'Macchiato (Espresso & Foam)', 'price' => 196, 'best_seller_rank' => 8],
        ['name' => 'Cortado (Equal Espresso & Milk)', 'price' => 140, 'best_seller_rank' => 9],
        ['name' => 'Affogato with Hazelnut Ice Cream', 'price' => 378, 'best_seller_rank' => 10],
    ],
    'Deconstructed Desserts & Ice Cream' => [
        ['name' => 'Brown Butter Pecan Ice Cream', 'price' => 308, 'best_seller_rank' => 3],
        ['name' => 'Matcha & White Chocolate Gelato', 'price' => 336, 'best_seller_rank' => 5],
        ['name' => '"PB&J" Deconstructed Sandwich Kit', 'price' => 448, 'best_seller_rank' => 2],
        ['name' => 'Midnight Dark Chocolate Sorbet', 'price' => 280, 'best_seller_rank' => 4],
        ['name' => 'Crème Brûlée Ice Cream Crumble', 'price' => 420, 'best_seller_rank' => 1],
        ['name' => 'Pistachio Gelato Sundae', 'price' => 364, 'best_seller_rank' => 6],
        ['name' => 'Strawberry Shortcake Deconstructed', 'price' => 392, 'best_seller_rank' => 7],
        ['name' => 'Mango Passion Fruit Sorbet', 'price' => 308, 'best_seller_rank' => 8],
        ['name' => 'Salted Caramel Swirl Soft Serve', 'price' => 196, 'best_seller_rank' => 9],
    ],
];

// Add default stock availability and sort
foreach ($menu as $cat => &$items) {
    foreach ($items as &$it) {
        if (!isset($it['stock'])) {
            $it['stock'] = 100;
        }
    }
    unset($it);
}
unset($items);

// Sort by best_seller_rank
function compare_by_rank($itemA, $itemB) {
    return $itemA['best_seller_rank'] <=> $itemB['best_seller_rank'];
}
foreach ($menu as $category => &$items) {
    usort($items, 'compare_by_rank');
}
unset($items);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Deconstructed Dessert/Affogato Bar — Menu</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

    <main id="main-content">
        <div class="menu-container">
            <?php foreach ($menu as $category => $items): ?>
                <section class="menu-section">
                    <h3 class="menu-heading"><?= htmlspecialchars($category) ?></h3>
                    <div class="menu-grid">
                        <?php foreach ($items as $item): ?>
                            <?php
                                $is_best_seller = ($item['best_seller_rank'] ?? 0) === 1;
                                $best_seller_class = $is_best_seller ? 'best-seller-item' : '';
                            ?>
                            <div class="menu-item <?= $best_seller_class ?>">
                                <div class="item-details">
                                    <p class="item-name">
                                        <?= htmlspecialchars(($is_best_seller ? '⭐ ' : '• ') . $item['name']) ?>
                                    </p>
                                    <?php if ($is_best_seller): ?>
                                        <span class="best-seller-badge">Best Seller</span>
                                    <?php endif; ?>
                                </div>
                                <div class="item-price">
                                    <div class="price">₱<?= number_format($item['price'], 0) ?></div>
                                    <div class="stock">
                                        <?php if (!empty($item['stock'])): ?>
                                            Stock: <?= (int)$item['stock'] ?>
                                        <?php else: ?>
                                            <span class="out-of-stock">Out of stock</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>

</body>
</html>