<?php require "Layouts/Header.php" ?>
    <div class="page-heading">
        <h1>Choose Your Quiz!</h1>
    </div>
    <div class="cont">
        <form method="post" action="/register">
            <div>
                <input class="name-input" type="text" name="name" id="name" placeholder="Enter your name" required/>
                <label for="name"></label>
            </div>
            <div>
                <label for="quiz">
                    <select name="quiz" id="quiz" required>
                        <?php foreach ($quizzes as $quiz) { ?>
                            <option value="<?php echo $quiz->getId(); ?>"><?php echo $quiz->getTitle(); ?></option>
                        <?php } ?>
                    </select>
            </div>
            <div>
                <button type="submit">START</button>
            </div>
        </form>
    </div>
<?php require "Layouts/Footer.php" ?>