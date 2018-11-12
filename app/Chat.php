<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $user1
 * @property string $user2
 * @property boolean $user1_is_typing
 * @property boolean $user2_is_typing
 * @property string $created_at
 * @property string $updated_at
 */
class Chat extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user1', 'user2', 'user1_is_typing', 'user2_is_typing', 'created_at', 'updated_at'];

}
