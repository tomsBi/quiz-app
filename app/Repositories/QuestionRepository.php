<?php

namespace App\Repositories;

use App\Models\Question;

class QuestionRepository
{

    // Gets questions by quiz ID from database.

    public function getQuestionsByQuizId($quizId): array
    {
        $questionQuery = query()
            ->select('*')
            ->from('quiz_questions')
            ->where('quiz_id = :quiz_id')
            ->setParameter('quiz_id', $quizId)
            ->execute()
            ->fetchAllAssociative();

        $questions = [];

        foreach ($questionQuery as $question) {
            $questions[] = new Question(
                (int)$question['id'],
                (int)$question['quiz_id'],
                $question['question_content'],
                (new AnswerRepository())->getAnswersByQuestionId($question['id'])
            );
        }

        return $questions;
    }
}