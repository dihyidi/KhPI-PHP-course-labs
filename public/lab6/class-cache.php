<?php
class ProductCache {
    private static $cachedData = null;

    public static function getProducts() {
        if (self::$cachedData !== null) {
            return self::$cachedData;
        }

        sleep(2);
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = 'Product ' . rand(1, 100);
        }

        self::$cachedData = $data;
        return $data;
    }
}