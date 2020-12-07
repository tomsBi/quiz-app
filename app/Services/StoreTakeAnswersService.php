<?php


namespace App\Services;


use App\Repositories\TakeRepository;

class StoreTakeAnswersService
{

    // To execute answer storing to database.

    public function execute(array $data)
    {
        foreach ($data as $answer){
            (new TakeRepository())->storeAnswers($_SESSION['take_id'], $answer);
        }
    }
}