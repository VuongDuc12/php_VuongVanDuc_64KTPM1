<?php
session_start();
include 'config.php';

$score = 0;
$questions = $_SESSION['questions'];  // Lấy câu hỏi từ session

// Duyệt qua từng câu hỏi và kiểm tra câu trả lời
foreach ($questions as $question) {
    $answer = isset($_POST['question' . $question['id']]) ? $_POST['question' . $question['id']] : '';
    if ($answer === $question['correct_answer']) {
        $score++;
    }
}

// Hiển thị kết quả

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Kết quả bài thi</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Kết quả bài thi</h1>
        <p class="text-center">Bạn đã trả lời đúng <strong><?= $score ?></strong> / <?= count($questions) ?> câu hỏi.</p>
        <a href="index.php" class="btn btn-primary">Làm lại bài thi</a>
    </div>
</body>
</html>

