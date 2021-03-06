<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Traits\CacheableRepository;
use Prettus\Repository\Contracts\CacheableInterface;

class UserRepository extends BaseRepository implements CacheableInterface
{
    use CacheableRepository;

    protected $fieldSearchable = [
        'name' => 'like',
        'email' => 'like',
        'home_airport_id',
        'curr_airport_id',
    ];

    public function model()
    {
        return User::class;
    }
}
