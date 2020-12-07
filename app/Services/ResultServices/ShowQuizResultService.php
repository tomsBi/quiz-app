<?php


namespace App\Services\ResultServices;


use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\TakeRepository;
use App\Repositories\UserRepository;

class ShowQuizResultService
{

    // Gets all data to process for results showing.

    public function execute($data, $takeId, $quizId, $userId): ShowQuizResultServiceResponse
    {
        $user = (new UserRepository())->getUserById($userId);
        $questionCount = count((new QuestionRepository())->getQuestionsByQuizId($quizId));
        $score = 0;

        foreach ($data as $answerId) {
            $answer = (new AnswerRepository())->getAnswerById($answerId);

            if ($answer->isCorrect() === true) {
                $score++;
            }
        }

        (new TakeRepository())->updateScore($score, $takeId);

        return new ShowQuizResultServiceResponse($score, $questionCount, $user);
    }
}