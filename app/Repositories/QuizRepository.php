<?php


namespace App\Repositories;


use App\Models\Quiz;

class QuizRepository
{

    // Gets all quizzes form database for user to choose.

    public function getAllQuizzes(): array
    {
        $quizQuery = query()
            ->select('*')
            ->from('quizzes')
            ->execute()
            ->fetchAllAssociative();

        $quizzes = [];

        foreach ($quizQuery as $quiz) {
            $quizzes[] = new Quiz(
                $quiz['id'],
                $quiz['title']
            );
        }

        return $quizzes;
    }

    // Gets quiz by ID.

    public function getQuizById($id): Quiz
    {
        $quiz = query()
            ->select('*')
            ->from('quizzes')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        return new Quiz(
            (int)$quiz['id'],
            $quiz['title']
        );

    }

}