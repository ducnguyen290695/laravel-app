<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function all(): Collection
    {
        return $this->userRepo->getAll();
    }

    public function find($id)
    {
        $user = $this->userRepo->getById($id);

         if(!$user) {
             throw new NotFoundHttpException('User not found');
         }

         return $user;
    }

    public function create(array $data)
    {
        return $this->userRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->userRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepo->delete($id);
    }
}
