<?php


namespace App\Models;


class Answer
{
    private int $id;
    private int $questionId;
    private string $answerContent;
    private bool $correct;

    public function __construct(
        int $id,
        int $questionId,
        string $answerContent,
        bool $correct
    )
    {

        $this->id = $id;
        $this->questionId = $questionId;
        $this->answerContent = $answerContent;
        $this->correct = $correct;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuestionId(): int
    {
        return $this->questionId;
    }

    public function getAnswerContent(): string
    {
        return $this->answerContent;
    }

    public function isCorrect(): bool
    {
        return $this->correct;
    }
}