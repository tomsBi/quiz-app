<?php


namespace App\Services\QuizServices;


use App\Models\Quiz;

class ShowQuizServiceResponse
{
    private Quiz $quiz;
    private array $questions;

    public function __construct(Quiz $quiz, array $questions)
    {

        $this->quiz = $quiz;
        $this->questions = $questions;
    }

    public function getQuiz(): Quiz
    {
        return $this->quiz;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }
}