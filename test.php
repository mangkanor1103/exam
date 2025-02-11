<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
if (isset($_GET['q'])) {
    $number = (int) $_GET['q'];
} else {
    header("Location:exam.php");
}

$total = $exm->getTotalRows();
$question = $exm->getQuesByNumber($number);
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $process = $pro->processData($_POST);
}
?>
<div class="main">
    <h1>Question <?php echo $question['quesNo']; ?> of <?php echo $total; ?></h1>

    <!-- Live Camera Feed -->
    <div>
        <h3>Live Camera Feed</h3>
        <video id="liveCamera" width="320" height="240" autoplay></video>
    </div>

    <div class="test">
        <form method="post" action="">
            <table> 
                <tr>
                    <td colspan="2">
                        <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
                    </td>
                </tr>

                <?php 
                $answer = $exm->getAnswer($number);
                if ($answer) {
                    while ($result = $answer->fetch_assoc()) {
                ?>

                <tr>
                    <td>
                        <input type="radio" name="ans" value="<?php echo $result['id']; ?>" /><?php echo $result['ans']; ?>
                    </td>
                </tr>
                <?php }} ?>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Next Question"/>
                        <input type="hidden" name="number" value="<?php echo $number; ?>" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script>
    // Access user's webcam and display the stream in the video element
    async function startCamera() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });
            document.getElementById('liveCamera').srcObject = stream;
        } catch (error) {
            console.error("Error accessing camera: ", error);
        }
    }

    window.onload = startCamera;
</script>

<?php include 'inc/footer.php'; ?>
