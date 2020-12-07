<?php

namespace App\Services\QuizServices;

use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\QuizRepository;

class ShowQuizService
{

    private QuizRepository $quizRepository;
    private QuestionRepository $questionRepository;
    private AnswerRepository $answerRepository;

    public function __construct()
    {
        $this->quizRepository = new QuizRepository();
        $this->questionRepository = new QuestionRepository();
        $this->answerRepository = new AnswerRepository();
    }

    // Gets all data to process for quiz showing.

    public function execute($id): ShowQuizServiceResponse
    {
        $quiz = $this->quizRepository->getQuizById($id);
        $questions = $this->questionRepository->getQuestionsByQuizId($quiz->getId());


        return new ShowQuizServiceResponse($quiz, $questions);
    }

}