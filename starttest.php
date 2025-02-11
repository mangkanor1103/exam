<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$question = $exm->getQuestion();
$total = $exm->getTotalRows();
?>
<div class="main">
    <h1>Welcome to Online Exam</h1>
    <div class="starttest">
        <h2>Test your knowledge</h2>
        <p>This is a multiple-choice quiz to test your knowledge.</p>

        <ul>
            <li><strong>Number of Questions:</strong> <?php echo $total; ?></li>
            <li><strong>Question Type:</strong> Multiple Choice</li>
        </ul>

        <h3>Live Camera Feed</h3>
        <video id="video" width="320" height="240" autoplay></video>

        <a href="test.php?q=<?php echo $question['quesNo']; ?>">Start Test</a>
    </div>
</div>

<script>
    const video = document.getElementById('video');

    // Access Webcam
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            console.error("Error accessing webcam: ", err);
        });
</script>

<?php include 'inc/footer.php'; ?>
