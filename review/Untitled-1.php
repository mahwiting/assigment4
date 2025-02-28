// add_article.php
<?php
$conn = new mysqli('localhost', 'username', 'password', 'blog_db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php");
}
?>


// add_comment.php
<?php
$conn = new mysqli('localhost', 'username', 'password', 'blog_db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_id = $_POST['article_id'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO comments (article_id, content) VALUES (?, ?)");
    $stmt->bind_param("is", $article_id, $content);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php");
}
?>