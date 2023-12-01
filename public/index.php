<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILE_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';
require APP_PATH . 'helpers.php';

$files = getTransactionFiles(FILE_PATH);

$transactions = [];
foreach ($files as $file) {
    $transactions = array_merge($transactions, getTransaction($file, "extractTransaction"));
};

$totals = calculateTotals($transactions);

require VIEW_PATH . 'transactions.php';