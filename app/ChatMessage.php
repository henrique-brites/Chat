<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sender_username
 * @property string $message
 * @property boolean $read
 * @property string $created_at
 * @property string $updated_at
 */
class ChatMessage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sender_username', 'message', 'read', 'created_at', 'updated_at'];

}
