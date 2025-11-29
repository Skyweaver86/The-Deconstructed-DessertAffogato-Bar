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

// Add default stock availability to each menu item (100 by default) if not already set
foreach ($menu as $cat => &$items) {
    foreach ($items as &$it) {
        if (!isset($it['stock'])) {
            $it['stock'] = 100; // default availability
        }
    }
    unset($it);
}
unset($items);

/**
 
 * It compares two menu items (arrays) based on their best_seller_rank (integer).
 * * @param array $itemA The first product array.
 * @param array $itemB The second product array.
 * @return int Returns -1 if A comes before B, 1 if B comes before A, or 0 if equal.
 */
function compare_by_rank($itemA, $itemB) {
    // Variable assignment: extract the ranks from the item arrays using the assignment operator (=).
    $rankA = $itemA['best_seller_rank'];
    $rankB = $itemB['best_seller_rank'];
    
  
    if ($rankA < $rankB) {
       
        return -1; 
    } 
    
    elseif ($rankA > $rankB) {
       
        return 1; 
    } 
    
    else {
        
        return 0; 
    }
}

// Iterate through each category array using a foreach loop and a reference (&items).
foreach ($menu as $category => &$items) {
    // Call the PHP usort function to sort the inner array using our custom comparison function.
    usort($items, 'compare_by_rank');
}
// Crucial: break the reference with the last element to prevent unintended side effects.
unset($items); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Deconstructed Dessert/Affogato Bar Menu</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Google Fonts import */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
    </style>
</head>
<body class="p-4 sm:p-8">

    <header class="text-center mb-10 p-6 bg-white shadow-xl rounded-xl">
        <h1 class="text-4xl font-extrabold text-[#4a2e1f] sm:text-5xl tracking-tight">The Artisan Trifecta</h1>
        <h2 class="text-xl font-semibold text-[#8b5a3e] mt-2">Deconstructed Desserts, Artisan Breads & Specialty Coffee</h2>
        <p class="mt-3 text-sm text-gray-500 italic">Sorted by Popularity: Top sellers listed first!</p>
    </header>

    <div class="max-w-6xl mx-auto space-y-12">
        <?php foreach ($menu as $category => $items): ?>
            <section class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg border-t-4 border-[#8b5a3e]">
                <h3 class="text-3xl font-bold text-[#4a2e1f] mb-6 border-b-2 border-[#f7e4c9] pb-3"><?= htmlspecialchars($category) ?></h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <?php foreach ($items as $index => $item): ?>
                        <?php
                            // Determine special styling for the absolute best seller (rank 1)
                            $is_best_seller = $item['best_seller_rank'] === 1; // Strict comparison operator (===)
                            $bg_color = $is_best_seller ? 'bg-amber-50 border-amber-500' : 'bg-white hover:shadow-md';
                            $text_color = $is_best_seller ? 'text-amber-700' : 'text-[#4a2e1f]';
                            $icon = $is_best_seller ? '✨' : '•';
                        ?>

                        <div class="flex justify-between items-start p-4 rounded-lg transition duration-300 <?= $bg_color ?> border-l-4 border-l-2">
                            <div class="flex-1 pr-4">
                                <p class="text-lg font-semibold <?= $text_color ?>">
                                    <?= htmlspecialchars($icon . ' ' . $item['name']) ?>
                                </p>
                                <?php if ($is_best_seller): // Conditional expression in HTML ?>
                                    <span class="text-xs font-bold text-amber-600 uppercase mt-1 inline-block py-0.5 px-2 rounded-full bg-amber-100">
                                        Top Seller
                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php if ($item['stock'] > 0): ?>
                                <div class="text-right min-w-[70px]">
                                    <div class="text-xl font-bold text-[#8b5a3e]">₱<?= number_format($item['price'], 0) ?></div>
                                    <div class="text-xs text-gray-500">Stock: <?= (int)$item['stock'] ?></div>
                                </div>
                            <?php else: ?>
                                <div class="text-right min-w-[70px]">
                                    <span class="text-sm font-bold text-red-600">Out of stock</span>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>

    <footer class="text-center mt-12 pt-6 border-t border-gray-300">
        <p class="text-sm text-gray-500">Prices subject to change. Ask your barista about seasonal specials!</p>
    </footer>

</body>
</html>