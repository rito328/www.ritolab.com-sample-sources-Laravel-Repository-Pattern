<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\User\UserDataAccessRepositoryInterface AS UserDataAccess;

class SampleController extends Controller
{
    protected $User;

    public function __construct(UserDataAccess $UserDataAccess)
    {
        $this->User = $UserDataAccess;
    }

    public function index()
    {
        $start = microtime(true);
        $memory = memory_get_usage();

        // ここでデータ取得を行う
        $data = $this->User->getAll();

        $result = [
            // どちらのリポジトリを使用しているかわかるように
            'name'      => get_class($this->User),
            // 実行時間
            'time'      => microtime(true) - $start,
            // 使用メモリ
            'memory'    => (memory_get_peak_usage() - $memory) / (1024 * 1024)
        ];

        // 結果出力
        var_dump($result);
    }
}
