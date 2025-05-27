<?php

namespace App\Http\Controllers\Ajax\Common;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiController;
use App\Http\Requests\Common\Component\ComponentLoadManyRequest;
use App\Http\Requests\Common\Component\ComponentLoadRequest;
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

class ComponentController extends ApiController
{
    public function load(ComponentLoadRequest $request) {
        $component = $request->component;
        $record = $request->record;
        $recordType = $record->recordType;

        $model = $recordType::hydrate($record);
        $html = view($component, ["model" => $model]);
        return $this->success("Load component successfully", $html);
    }

    public function loadMany(ComponentLoadManyRequest $request) {
        $component = $request->component;
        $records = $request->records;
        $recordType = trim(htmlspecialchars_decode($request->recordType), '"');
        $htmls = array_map(function ($record) use ($recordType, $component) {
            $model = $recordType::hydrate($record);
            return view($component, ["model" => $record])->render();
        }, $records);
        return $this->success("Load component successfully", $htmls);
    }
}
