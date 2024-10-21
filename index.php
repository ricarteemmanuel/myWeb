<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSphere</title>
    <link rel="stylesheet" href="index.css">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }


        .content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
            top: 30%;
            transform: translateY(-50%);
        }
    </style>
</head>

<body>

    <?php include('header.php'); ?>

    <video autoplay muted loop class="video-background">
        <source src="background/bg.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="content">
        <h1>Welcome to EventSphere</h1>
        <p>Creating unforgettable experiences</p>
        <br>
        <a href="formRegister.php" class="button">Register an Event</a>

    </div>



</body>



</html>

