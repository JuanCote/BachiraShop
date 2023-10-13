<?php

namespace App\Services\Users\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class EloquentUserRepository
{
    public function updateAddress(User $user, array $data)
    {
        $user->update([
            'name' => $data['firstname'],
            'surname' => $data['surname'],
            'street' => $data['street'],
            'house' => $data['house'],
            'postal' => $data['postal'],
            'city' => $data['city'],
            'phone_number' => $data['phone_number']
        ]);
    }
}