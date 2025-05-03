<?php

namespace App\Http\Controllers\Ajax\Common;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiController;
use DB;
use Illuminate\Http\Request;

class AutocompleteController extends ApiController
{
    public function index(Request $request) {
        $queryTable = $request->queryTable;
        $queryColumn = $request->queryColumn ?? 'name';
        $keyword = $request->keyword ?? '';
        $limit = $request->limit ?? 20;
        $records = DB::table($queryTable)
            ->where($queryColumn, 'like', '%'.$keyword.'%')
            ->limit($limit)
            ->offset(0)
            ->get(['id', $queryColumn]);
        return $this->success(__('Tìm kiếm thành công'), $records);
    }
}
