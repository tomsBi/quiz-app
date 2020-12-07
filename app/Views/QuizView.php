<?php require "Layouts/Header.php" ?>
    <div class="page-heading">
        <h1><?php echo $quiz->getTitle(); ?></h1>
    </div>
    <form method="post" action="/result" id="<?php echo $quiz->getId(); ?>">
        <?php
        $count = count($questions);
        $i = 1;
        foreach ($questions as $question) { ?>
        <?php if ($i < $count) { ?>
            <div id="question<?php echo $i; ?>" class="cont">
                <h3 class="questions"
                    id="<?php echo $question->getId(); ?>"><?php echo $question->getQuestionContent(); ?></h3>
                <div class="columns">
                    <?php foreach ($question->getAnswers() as $answer) { ?>
                        <div class="form-group">
                            <input class="radio-input" type="radio" id="answer<?php echo $answer->getId(); ?>"
                                   name="<?php echo $i; ?>"
                                   value="<?php echo $answer->getId(); ?>"/>
                            <label for="answer<?php echo $answer->getId(); ?>">
                                <?php echo $answer->getAnswerContent(); ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>

                <?php $percent = (($i-1)/$count) * 100; ?>
                <div style="margin: auto;
                display: flex;
                height: 25px;
                width: 25%;
                border:solid 1px #ffd369;
                border-radius: 4px;">
                    <div style="
                            background-color: #ffd369;
                            height 100%;
                            border: solid 1px #ffd369;
                            width:<?php echo $percent ?>%;
                            border-radius: 4px;">
                        &nbsp;
                    </div>
                </div>

                <div>
                    <button id="<?php echo $i; ?>" class="next" type="button">
                        NEXT
                    </button>
                </div>
            </div>
        <?php }elseif ($i === $count) { ?>
        <div id="question<?php echo $i; ?>" class="cont">
            <div class="questions">
                <h3><?php echo $question->getQuestionContent(); ?></h3>
            </div>
            <div class="columns">
                <?php foreach ($question->getAnswers() as $answer) { ?>
                    <div class="form-group">
                        <input type="radio" id="answer<?php echo $answer->getId(); ?>"
                               name="<?php echo $question->getId(); ?>"
                               value="<?php echo $answer->getId(); ?>">
                        <label for="answer<?php echo $answer->getId(); ?>"><?php echo $answer->getAnswerContent(); ?></label>
                    </div>
                <?php } ?>
            </div>

            <?php $percent = (($i-1)/$count) * 100; ?>
            <div style="margin: auto;
            display: flex;
            height: 25px;
            width: 25%;
            border:solid 1px #ffd369;
            border-radius: 4px;">
                <div style="
                        background-color: #ffd369;
                        height 25px;
                        border: solid 1px #ffd369;
                        width:<?php echo $percent ?>%;
                        border-radius: 4px;">
                    &nbsp;
                </div>
            </div>

            <div>
                <button class="submit" type="submit" form="<?php echo $quiz->getId(); ?>" value="Submit">
                    SUBMIT
                </button>
            </div>
            <?php } ?>
            <?php $i++;
            } ?>
        </div>
    </form>
    <script src="/./resources/js/app.js"></script>
<?php require "Layouts/Footer.php" ?>