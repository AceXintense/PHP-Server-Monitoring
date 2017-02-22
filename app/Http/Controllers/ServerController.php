<?php

namespace App\Http\Controllers;


use App\CPU;
use App\Server;
use Carbon\Carbon;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class ServerController extends Controller {

    /**
     *
     */
    public function getServerList() {
        return Server::all()->toArray();
    }

    public function getCPU(Request $request) {
        $serverUId = $request->get('serverId');

        $cpuStats = [
            '5 Minutes' => CPU::all()->where('server_uid', '=', $serverUId)->where('created_at', '<=', Carbon::now()->minute(5)),
//            '10 Minutes' => CPU::all()->where('server_uid', '=', $serverUId)->where('created_at', '<=', Carbon::now()->minute(10)),
//            '15 Minutes' => CPU::all()->where('server_uid', '=', $serverUId)->where('created_at', '<=', Carbon::now()->minute(15)),
//            '20 Minutes' => CPU::all()->where('server_uid', '=', $serverUId)->where('created_at', '<=', Carbon::now()->minute(20)),
//            '25 Minutes' => CPU::all()->where('server_uid', '=', $serverUId)->where('created_at', '<=', Carbon::now()->minute(25)),
//            '30 Minutes' => CPU::all()->where('server_uid', '=', $serverUId)->where('created_at', '<=', Carbon::now()->minute(30)),
        ];

        return $cpuStats;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function initializeServer(Request $request) {

        $serverId = $request->get('serverId');
        $serverName = $request->get('serverName');

        if (empty($serverId)) {
            return $this->emptyError('serverId is not specified!');
        }

        if (empty($serverName)) {
            return $this->emptyError('serverName is not specified!');
        }

        try {
            /** @var Server $server */
            $server = new Server();
            $server->server_uid = $serverId;
            $server->server_name = $serverName;
            $server->save();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

        return $this->successfulRequest();
    }

    public function uploadCPU(Request $request) {
        $uid = $request->get('serverId');
        $cpuCores = $request->get('cpuCores');
        $cpuTemperature = $request->get('cpuTemperature');
        $cpuFrequency = $request->get('cpuFrequency');
        $cpuLoad = $request->get('cpuLoad');

        try{
            /** @var CPU $cpu */
            $cpu = new CPU();
            $cpu->server_uid = $uid;
            $cpu->cpu_cores = $cpuCores;
            $cpu->cpu_temperature = $cpuTemperature;
            $cpu->cpu_frequency = $cpuFrequency;
            $cpu->cpu_load = $cpuLoad;
            $cpu->save();
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }

        return $this->successfulRequest();
    }

    private function successfulRequest() {
        return [
            'status' => '200',
            'content' => 'Success'
        ];
    }

    /**
     * Return a emptyError for the api.
     * @param $string
     * @return array
     */
    private function emptyError($string) {
        return [
            'status' => 403,
            'error' => $string
        ];
    }

}