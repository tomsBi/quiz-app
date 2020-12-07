<?php

namespace App\Services\ResultServices;

use App\Models\User;

class ShowQuizResultServiceResponse
{
    private int $score;
    private int $questionCount;
    private User $user;

    public function __construct(int $score, int $questionCount, User $user)
    {

        $this->score = $score;
        $this->questionCount = $questionCount;
        $this->user = $user;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getQuestionCount(): int
    {
        return $this->questionCount;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}