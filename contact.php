<?php
session_start(); 

$favorites = isset($_COOKIE['favorites']) ? json_decode($_COOKIE['favorites'], true) : [];

if (isset($_GET['favorite'])) {
    $member_name = htmlspecialchars($_GET['favorite']);
    if (!in_array($member_name, $favorites)) {
        $favorites[] = $member_name;
        setcookie('favorites', json_encode($favorites), time() + (86400 * 7), "/"); 

        $_SESSION['recent_favorite'] = $member_name;
    }
}

$show_favorites_only = isset($_GET['favorites']) && $_GET['favorites'] == 1;

$team_members = [
    [
        'name' => 'John Mark Binaday',
        'position' => 'Developer',
        'bio' => 'John is an IT student with a keen interest in PHP development. He likes hands-on experience through real-world coding projects.',
        'img' => 'profiles/binaday.jpg',
    ],
    [
        'name' => 'Camila Jadlocon',
        'position' => 'Developer',
        'bio' => 'Camila is a dedicated IT student specializing in PHP development. She is passionate about coding and is eager to apply her skills in real-world projects.',
        'img' => 'profiles/camila.jpg',
    ],  
    [
        'name' => 'Flora Mae Panis',
        'position' => 'Developer',
        'bio' => 'Flora is an enthusiastic IT student specializing in both frontend and backend development for web applications using PHP. She is eager to enhance her skills and contribute to innovative projects.',
        'img' => 'profiles/flora.jpeg',
    ],  
    [
        'name' => 'Jules Zulueta',
        'position' => 'Designer',
        'bio' => 'Innovative designer focused on creating captivating visuals and strategic branding, dedicated to turning concepts into impactful, user-centric designs.',
        'img' => 'profiles/jules.jpg',
    ],  
    [
        'name' => 'Rose Marie Ulnagan',
        'position' => 'Tester',
        'bio' => 'Detail-oriented software tester dedicated to ensuring quality and functionality. Skilled in identifying bugs and optimizing user experience',
        'img' => 'profiles/rose.jpg',
    ],  
];

if ($show_favorites_only) {
    $filtered_members = array_filter($team_members, function($member) use ($favorites) {
        return in_array($member['name'], $favorites);
    });
} else {
    $filtered_members = $team_members;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEAM PROFILE G5</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

<?php require('header.php'); ?>


    <header>
        <h1>Developer Team</h1>
        <p>Recently favorited member: <?php echo isset($_SESSION['recent_favorite']) ? $_SESSION['recent_favorite'] : 'None'; ?></p>
    </header>

    <form method="GET">
        <button type="submit" name="favorites" value="1">Show Favorites</button>
        <a href="?">Show All</a> 
    </form>

    <main>
        <?php if (empty($filtered_members)): ?>
            <p>No favorite team members found.</p>
        <?php else: ?>
            <?php foreach ($filtered_members as $member): ?>
                <section class="team-member">
                    <a href="?member=<?php echo urlencode($member['name']); ?>">
                        <img src="<?php echo $member['img']; ?>" alt="<?php echo $member['name']; ?>">
                        <h2><?php echo $member['name']; ?></h2>
                        <p><?php echo $member['position']; ?></p>
                        <p><?php echo $member['bio']; ?></p>
                    </a>
                    <a href="?favorite=<?php echo urlencode($member['name']); ?>">Add to Favorites</a>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>

    <?php require('footer.php'); ?>

</body>
</html>
