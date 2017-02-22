<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string server_name
 * @property string server_uid
 */

class Server extends Model
{
    protected $table = 'server';
    protected $primaryKey = 'server_uid';
}
