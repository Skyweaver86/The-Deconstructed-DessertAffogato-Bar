<?php
declare(strict_types=1); // 1. Strict types turned on

// 2. Multidimensional array of products
$yourproduct = [
    "Prod1 - Sourdough Loaf" => ["price" => 420.0, "stock" => 12],
    "Prod2 - Chocolate Lava Cake" => ["price" => 392.0, "stock" => 8],
    "Prod3 - Affogato" => ["price" => 336.0, "stock" => 15],
    "Prod4 - Crème Brûlée Ice Cream" => ["price" => 420.0, "stock" => 5],
    "Prod5 - French Baguette" => ["price" => 280.0, "stock" => 20],
    "Prod6 - Pistachio Gelato Sundae" => ["price" => 364.0, "stock" => 9],
    "Prod7 - Cold Brew Nitro Tap" => ["price" => 252.0, "stock" => 18],
    "Prod8 - Walnut & Raisin Loaf" => ["price" => 392.0, "stock" => 7],
];

// 3. Global variable for tax rate
$tax_rate = 12; // 12% VAT

// 4. Function: get_reorder_message()
function get_reorder_message(int $stock): string {
    // 5. Ternary operator to check stock < 10
    return ($stock < 10) ? "Yes" : "No";
}

// 6. Function: get_total_value()
function get_total_value(float $price, int $quantity): float {
    // 7. Return price * quantity
    return $price * $quantity;
}

// 8. Function: get_tax_due()
function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float {
    // 9. Calculate total tax due
    $total_value = $price * $quantity;
    return $total_value * ($tax_rate / 100);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Stock Control</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdfdfd; /* a. Minimalist background */
            color: #333;
        }
        table {
            width: 80%;
            margin: 2rem auto;
            border-collapse: collapse;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 0.75rem;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<main id="main-content">
    <h1 style="text-align:center;">📦 Product Stock Control</h1>

<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Stock Level</th>
            <th>Reorder?</th>
            <th>Total Value (₱)</th>
            <th>Tax Due (₱)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // 10. Foreach loop through products
        foreach ($yourproduct as $product_name => $data) {
            $price = $data["price"];
            $stock = $data["stock"];
            ?>
            <tr>
                <!-- 11. Product name -->
                <td><?= htmlspecialchars($product_name) ?></td>
                <!-- 12. Stock level -->
                <td><?= $stock ?></td>
                <!-- 13. Reorder message -->
                <td><?= get_reorder_message($stock) ?></td>
                <!-- 14. Total value -->
                <td><?= number_format(get_total_value($price, $stock), 2) ?></td>
                <!-- 15. Tax due -->
                <td><?= number_format(get_tax_due($price, $stock, $tax_rate), 2) ?></td>
            </tr>
        <?php } // 16. End foreach ?>
    </tbody>
</table>

</main>

<?php include 'footer.php'; ?>

</body>
</html>