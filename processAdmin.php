<?php
session_start();

if (!isset($_SESSION['records'])) {
    $_SESSION['records'] = [];
}

// Process form actions (add, edit, delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;

    if ($action === 'add') {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $imagePath = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $imagePath = $uploadDir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            $imagePath = './' . $imagePath;
        }

        if ($name && $description && $imagePath) {
            $_SESSION['records'][] = [
                'name' => $name,
                'description' => $description,
                'image' => $imagePath,
            ];
        }
    } elseif ($action === 'edit' && $id !== null) {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $imagePath = $_SESSION['records'][$id]['image'] ?? '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $imagePath = $uploadDir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        }

        if ($name && $description && isset($_SESSION['records'][$id])) {
            $_SESSION['records'][$id] = [
                'name' => $name,
                'description' => $description,
                'image' => $imagePath,
            ];
        }
    } elseif ($action === 'delete' && $id !== null) {
        if (isset($_SESSION['records'][$id])) {
            unset($_SESSION['records'][$id]);
            $_SESSION['records'] = array_values($_SESSION['records']); // Reset keys
        }
    }

    // Include modal.php to get the updated list of flowers
    $flowers = include './modal.php';

    // Redirect to the page after processing
    header("Location: admin.php");
    exit();
}
