<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    // Store user at registration.

    public function storeUser()
    {
        $storeQuery = query();
        $storeQuery->insert('users')
            ->setValue('name', ':name')
            ->setParameter('name', $_POST['name'])
            ->execute();

        $_SESSION['user_id'] = (int)$storeQuery->getConnection()->lastInsertId();
        $_SESSION['quiz_id'] = $_POST['quiz'];
    }

    // Get user by id from database.

    public function getUserById($id)
    {
        $userQuery = query()
            ->select('*')
            ->from('users')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        return new User(
            $userQuery['name'],
            (int)$userQuery['id']
        );
    }
}