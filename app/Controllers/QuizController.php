<?php

namespace App\Controllers;

use App\Repositories\QuizRepository;
use App\Repositories\TakeRepository;
use App\Repositories\UserRepository;
use App\Services\ResultServices\ShowQuizResultService;
use App\Services\QuizServices\ShowQuizService;
use App\Services\QuizServices\ShowQuizServiceResponse;
use App\Services\ResultServices\ShowQuizResultServiceResponse;
use App\Services\StoreTakeAnswersService;

class QuizController
{
    public function index()
    {
        $quizzes = (new QuizRepository())->getAllQuizzes();

        return require_once __DIR__ . '/../Views/HomeView.php';
    }

    public function register()
    {
        (new UserRepository())->storeUser();
        (new TakeRepository())->store();

        header('Location: /quiz');
    }

    public function showQuizView()
    {
        $response = (new ShowQuizService())->execute($_SESSION['quiz_id']);

        $quiz = $response->getQuiz();
        $questions = $response->getQuestions();

        return require_once __DIR__ . '/../Views/QuizView.php';
    }

    public function result()
    {
        (new StoreTakeAnswersService())->execute($_POST);

        $response = (new ShowQuizResultService())
            ->execute($_POST, $_SESSION['take_id'], $_SESSION['quiz_id'], $_SESSION['user_id']);

        $score = $response->getScore();
        $questionCount = $response->getQuestionCount();
        $user = $response->getUser();

        return require_once __DIR__ . '/../Views/ResultsView.php';
    }
}