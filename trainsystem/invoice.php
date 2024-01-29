<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>

<?php if(isset($_SESSION['username'])) {
    if($_POST['cc-number'] && $_POST['cc-exp'] && $_POST['CVV']) {
        echo "Payment Successful";
    } else{
        echo "Payment Not Sucessful";
    }

    } ?>

<script>

    function goBack() {
        window.history.back(); }

</script>

</body>
</html>