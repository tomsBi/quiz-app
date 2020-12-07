<?php


namespace App\Models;


use App\Repositories\AnswerRepository;

class Question
{
    private int $id;
    private int $quizId;
    private string $questionContent;
    private array $answers;

    public function __construct
    (
        int $id,
        int $quizId,
        string $questionContent,
        array $answers
    )
    {
        $this->id = $id;
        $this->quizId = $quizId;
        $this->questionContent = $questionContent;
        $this->answers = $answers;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuizId(): int
    {
        return $this->quizId;
    }

    public function getQuestionContent(): string
    {
        return $this->questionContent;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }
}