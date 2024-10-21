<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert List</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php require('header.php'); ?>

    <main>
        <div class="concert-card">
            <h2>Band A</h2>
            <p><strong>Date:</strong> 2024-11-10</p>
            <p><strong>Venue:</strong> Venue 1</p>
            <p>A great concert by Band A.</p>
            <div class="buttons">
            <a href="formBuy.php" class="btn">Buy Tickets</a>
            <a href="#" class="btn secondary">More Info</a>
            </div>
        </div>
        
        <div class="concert-card">
            <h2>Band B</h2>
            <p><strong>Date:</strong> 2024-12-01</p>
            <p><strong>Venue:</strong> Venue 2</p>
            <p>Join us for an exciting evening with Band B.</p>
            <div class="buttons">
                <a href="formBuy.php" class="btn">Buy Tickets</a>
                <a href="#" class="btn secondary">More Info</a>
            </div>
        </div>

        <div class="concert-card">
            <h2>Band C</h2>
            <p><strong>Date:</strong> 2024-12-15</p>
            <p><strong>Venue:</strong> Venue 3</p>
            <p>Don’t miss Band C performing live!</p>
            <div class="buttons">
            <a href="formBuy.php" class="btn">Buy Tickets</a>
            <a href="#" class="btn secondary">More Info</a>
            </div>
        </div>
    </main>
    <?php require('footer.php'); ?>

</body>
</html>
