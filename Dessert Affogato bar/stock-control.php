<?php
// --- STOCK CONTROL FUNCTIONS ---

/**
 * Reduce stock for a given item.
 *
 * @param array  &$menu    The full menu array (passed by reference).
 * @param string $category Menu category name.
 * @param string $itemName Item name.
 * @param int    $quantity Quantity to deduct (default 1).
 * @return bool  True if successful, false if not found or insufficient stock.
 */
function reduce_stock(array &$menu, string $category, string $itemName, int $quantity = 1): bool {
    if (!isset($menu[$category])) return false;

    foreach ($menu[$category] as &$item) {
        if ($item['name'] === $itemName) {
            if ($item['stock'] >= $quantity) {
                $item['stock'] -= $quantity;
                return true;
            }
            return false; // Not enough stock
        }
    }
    return false; // Item not found
}

/**
 * Increase stock for a given item.
 *
 * @param array  &$menu    The full menu array (passed by reference).
 * @param string $category Menu category name.
 * @param string $itemName Item name.
 * @param int    $quantity Quantity to add (default 1).
 * @return bool  True if successful, false if not found.
 */
function add_stock(array &$menu, string $category, string $itemName, int $quantity = 1): bool {
    if (!isset($menu[$category])) return false;

    foreach ($menu[$category] as &$item) {
        if ($item['name'] === $itemName) {
            $item['stock'] += $quantity;
            return true;
        }
    }
    return false; // Item not found
}

/**
 * Get current stock for a given item.
 *
 * @param array  $menu     The full menu array.
 * @param string $category Menu category name.
 * @param string $itemName Item name.
 * @return int|null Current stock or null if not found.
 */
function get_stock(array $menu, string $category, string $itemName): ?int {
    if (!isset($menu[$category])) return null;

    foreach ($menu[$category] as $item) {
        if ($item['name'] === $itemName) {
            return $item['stock'];
        }
    }
    return null;
}

/**
 * Reset stock for all items to a given default.
 *
 * @param array &$menu   The full menu array (passed by reference).
 * @param int   $default Default stock value (default 100).
 */
function reset_all_stock(array &$menu, int $default = 100): void {
    foreach ($menu as &$items) {
        foreach ($items as &$item) {
            $item['stock'] = $default;
        }
        unset($item);
    }
    unset($items);
}