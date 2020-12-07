<?php


namespace App\Repositories;


use App\Models\Answer;

class AnswerRepository
{

    // Gets answers by question ID from database.

    public function getAnswersByQuestionId($questionId): array
    {
        $answerQuery = query()
            ->select('*')
            ->from('quiz_answers')
            ->where('question_id = :question_id')
            ->setParameter('question_id', $questionId)
            ->execute()
            ->fetchAllAssociative();

        $answers = [];

        foreach ($answerQuery as $answer) {
            $answers[] = new Answer(
                (int)$answer['id'],
                (int)$answer['question_id'],
                $answer['answer_content'],
                (boolean)$answer['correct']
            );
        }

        return $answers;
    }

    // Gets answer by ID from database.

    public function getAnswerById($id): Answer
    {
        $answerQuery = query()
            ->select('*')
            ->from('quiz_answers')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        return new Answer(
            (int)$answerQuery['id'],
            (int)$answerQuery['question_id'],
            $answerQuery['answer_content'],
            (boolean)$answerQuery['correct']);
    }
}