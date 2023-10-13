<?php

namespace App\Services\Users;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\Users\Repositories\EloquentUserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class UserService
{
    private $userRepository;

    public function __construct(
        EloquentUserRepository $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    public function updateAddress(User $user, array $data)
    {
        $this->userRepository->updateAddress($user, $data);
    }

}