<?php
session_start();

if (!isset($_SESSION['records'])) {
    $_SESSION['records'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;

    if ($action === 'add') {
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '');

        if ($name && $price) {
            $_SESSION['records'][] = ['name' => $name, 'price' => $price];
        }
    } elseif ($action === 'edit' && $id !== null) {
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '');

        if ($name && $price && isset($_SESSION['records'][$id])) {
            $_SESSION['records'][$id] = ['name' => $name, 'price' => $price];
        }
    } elseif ($action === 'delete' && $id !== null) {
        if (isset($_SESSION['records'][$id])) {
            unset($_SESSION['records'][$id]);
            $_SESSION['records'] = array_values($_SESSION['records']); // Reset keys
        }
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
