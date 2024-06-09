
<?php
    require_once'functions.php';
    
if (isset($_POST['submit'])) {
    if(isset($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        if (contact($name, $email, $message)) {
            echo "<script>alert('Data has been added');</script>";
        } else {
            echo "<script>alert('Error occurred while processing your request. Please try again later.');</script>";
        }
    } else {
        echo "<script>alert('Message is required. Please fill out the message field.');</script>";
    }
}
    
    ?>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/contact.css">
        <link rel="stylesheet" href="assets/css/footer.css">
    </head>
<body>
    <!-- navbar -->
    <?php include 'layout/header.php';?>

    <div class="contact-section">
        <div class="contact-form">
            <h4>Write to us</h4>
            <form role="form" method="post">
                <div class="form-group">    
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required >
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" >
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Message" rows="4" required></textarea>
                </div>  
                <button class="btn" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
    <!-- footer -->
    <?php include 'layout/footer.php';?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>