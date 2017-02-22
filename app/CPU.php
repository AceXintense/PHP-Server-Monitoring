<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string server_uid
 * @property integer cpu_cores
 * @property integer cpu_frequency
 * @property mixed cpu_temperature
 * @property mixed cpu_load
 */

class CPU extends Model
{
    protected $table = 'cpu';
    protected $primaryKey = 'server_uid';

    public function save(array $options = []) {
        $server = Server::find($this->server_uid);
        $server->updateTimestamps();
        $server->save();

        return parent::save($options);
    }
}
