<?php
// index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lodwar County Referral Hospital - Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; }
        .container { padding: 30px; }
        .hero { text-align: center; padding: 50px 0; background: #00695c; color: white; }
        .section { margin-top: 40px; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.05); }
        footer { text-align: center; padding: 20px; margin-top: 40px; background: #222; color: white; }
    </style>
</head>
<body>

    <div class="hero">
        <h1>Welcome to Lodwar County Referral Hospital</h1>
        <p>Providing Quality Healthcare to Turkana County and Beyond</p>
    </div>

    <div class="container">

        <div class="section">
            <h2>Book an Appointment</h2>
            <p>Need to see a doctor? <a href="appointment.php">Click here to book an appointment.</a></p>
        </div>

        <div class="section">
            <h2>Contact Us</h2>
            <p>Have a question or need assistance? <a href="contact.php">Send us a message here.</a></p>
        </div>

        <div class="section">
            <h2>Careers</h2>
            <p>Looking to join our medical team? <a href="apply_job.php">Apply for a position now.</a></p>
        </div>

        <div class="section">
            <h2>Support the Hospital</h2>
            <p>Want to donate or sponsor a hospital bed? <a href="donate.php">Visit our donation page.</a></p>
        </div>

        <div class="section">
            <h2>Newsletter Subscription</h2>
            <p>Stay updated with hospital news and events. <a href="subscribe.php">Subscribe here.</a></p>
        </div>

    </div>

    <footer>
        <p>© <?php echo date("Y"); ?> Lodwar County Referral Hospital | Powered by LoyaraSoft</p>
    </footer>

</body>
</html>
