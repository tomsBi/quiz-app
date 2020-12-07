<?php require "Layouts/Header.php" ?>
    <div class="page-heading">
        <h1><?php echo 'Thank you, ' . $user->getName() . '!'; ?></h1>
    </div>
    <div class="cont">
        <div>
            <h4><?php echo 'You answered correct ' . $score . ' questions out of ' . $questionCount . '!'; ?></h4>
        </div>
        <div>
            <a href="/">
                <button>START AGAIN</button>
            </a>
        </div>
    </div>
<?php require "Layouts/Footer.php" ?>