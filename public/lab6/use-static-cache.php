<?php
require 'class-cache.php';

$products = ProductCache::getProducts();

echo '<ul>';
foreach ($products as $p) {
    echo '<li>$p</li>';
}
echo '</ul>';