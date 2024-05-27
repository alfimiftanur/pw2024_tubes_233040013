<?php include 'layout/header.php';?>
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
        <title>Contact</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/contact.css">
    </head>
<body>
    <!-- navbar -->

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
</body>
</html>