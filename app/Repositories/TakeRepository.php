<?php


namespace App\Repositories;


class TakeRepository
{

    // Stores quiz take to database.

    public function store()
    {
        $takeQuery = query();
        $takeQuery->insert('takes')
            ->values([
                'user_id' => ':user_id',
                'quiz_id' => ':quiz_id',
            ])
            ->setParameter('user_id', $_SESSION['user_id'])
            ->setParameter('quiz_id', $_SESSION['quiz_id'])
            ->execute();

        $_SESSION['take_id'] = (int)$takeQuery->getConnection()->lastInsertId();
    }

    // Stores user chosen answers to database.

    public function storeAnswers($takeId, $answerId)
    {
        $takeQuery = query();
        $takeQuery->insert('take_answers')
            ->values([
                'take_id' => ':take_id',
                'answer_id' => ':answer_id',
            ])
            ->setParameter('take_id', $takeId)
            ->setParameter('answer_id', $answerId)
            ->execute();

    }

    // Updates take score when quiz is finished.

    public function updateScore(int $score, $userId)
    {
        query()
            ->update('takes', 'score')
            ->set('score', ':score')
            ->where('user_id = :user_id')
            ->setParameter('score', $score)
            ->setParameter('user_id', $userId)
            ->execute();
    }
}