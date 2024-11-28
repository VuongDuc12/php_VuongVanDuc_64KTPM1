<?php
session_start();
include 'config.php';

// Kiểm tra nếu dữ liệu câu hỏi đã được lưu trong session
if (!isset($_SESSION['questions'])) {
    // Lấy dữ liệu từ MySQL
    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);

    // Nếu có dữ liệu, lưu vào session
    if ($result->num_rows > 0) {
        $questions = [];
        while ($row = $result->fetch_assoc()) {
            $questions[] = [
                'id' => $row['id'],
                'question' => $row['question'],
                'options' => [
                    'A' => $row['option_A'],
                    'B' => $row['option_B'],
                    'C' => $row['option_C'],
                    'D' => $row['option_D']
                ],
                'correct_answer' => $row['correct_answer']
            ];
        }
        $_SESSION['questions'] = $questions;
    } else {
        echo "Không có câu hỏi nào trong cơ sở dữ liệu.";
    }
}

$questions = $_SESSION['questions'];  // Lấy câu hỏi từ session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Bài Thi Trắc Nghiệm</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Bài Thi Trắc Nghiệm</h2>
        <form id="quizForm" method="POST" action="submit.php">
            <?php $index = 1; // Biến để đếm số thứ tự câu hỏi ?>
            <?php foreach ($questions as $question): ?>
                <div class="form-group">
                    <h4><?php echo "Câu $index: " . htmlspecialchars($question['question']); ?></h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $question['id']; ?>" value="A" required>
                        <label class="form-check-label"><?php echo htmlspecialchars($question['options']['A']); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $question['id']; ?>" value="B" required>
                        <label class="form-check-label"><?php echo htmlspecialchars($question['options']['B']); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $question['id']; ?>" value="C" required>
                        <label class="form-check-label"><?php echo htmlspecialchars($question['options']['C']); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $question['id']; ?>" value="D" required>
                        <label class="form-check-label"><?php echo htmlspecialchars($question['options']['D']); ?></label>
                    </div>
                </div>
                <?php $index++; // Tăng số thứ tự câu hỏi ?>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-success mt-3">Nộp bài</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
