<?php

namespace App\Trait;

use App\Interfaces\Services\IService;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Log;

trait CrudBehaviour
{
    use JsonBehavior;
    public const PAGINATION_PERPAGE = 15;


    public function getOptions(Request $request) {
        $perpage = $request->per_page 
            ?? $request->perPage 
            ?? $request->pageSize 
            ?? $request->page_size
            ?? self::PAGINATION_PERPAGE;
        $page = $request->page
            ?? $request->page_number
            ?? $request->pageNumber;

        $perpage = is_numeric($perpage) ? intval(round($perpage)) : self::PAGINATION_PERPAGE;
        $page = is_numeric($page) ? intval(round($page)) : 1;

        $options = [
            'perpage' => $perpage,
            'page' => $page,
        ];

        if (isset($request->order_by)) {
            $options['orderBy'] = $request->order_by;
        }

        return $options;
    }

    public function _index(Request $request, IService $service, $customCriteria = [], $mergeCriteria = true, $customOptions = []) {
        $options = $this->getOptions($request);
        $options = array_merge($options, $customOptions);
        $perpage = $options['perpage'];
        $page = $options['page'];
        try {
            $criteria = [];
            if($mergeCriteria) {
                $criteria = array_merge($request->except(['per_page', 'page', 'perPage', 'pageSize', 'pageNumber', "_"]), $customCriteria);
            } else {
                $criteria = $customCriteria && count($customCriteria) > 0 ? $customCriteria : $request->except(['per_page', 'page']);
            }
            $total = $service->count($criteria);
            $all = $criteria ? $service->getBy($criteria, $options) : $service->getAll($options);
            $pageCount = ceil($total / $perpage);
            return $this->success(__('Dữ liệu đã được lấy thành công'), $all, 200, [
                'total' => $total,
                'page_count' => $pageCount,
                'per_page' => $perpage,
                'page' => $page
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error(__('Có lỗi xảy ra'), 500);
        }
    }

    public function _show(Request $request, IService $service, $customCriteria = [], $mergeCriteria = true, $customOptions = []) {
        try {
            $criteria = [];
            if($mergeCriteria) {
                $criteria = array_merge($request->except(['per_page', 'page']), $customCriteria);
            } else {
                $criteria = $customCriteria && count($customCriteria) > 0 ? $customCriteria : $request->except(['per_page', 'page']);
            }

            $item = $criteria && count($customCriteria) > 0
                ? $service->getBy(array_merge(['id' => $request->route('id')], $criteria), $customOptions)->first()
                : $service->getById($request->route('id'));

            if ($item) {
                return $this->success(__('Dữ liệu đã được lấy thành công'), $item);
            }
            return $this->error(__('Không tìm thấy dữ liệu'), 404);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error(__('Có lỗi xảy ra'), 500);
        }
    }

    public function _store(Request | FormRequest $request, IService $service, array $customData = [], bool $isMerge = false) {
        try {
            $created = null;
            if($isMerge)
                $created = $service->create(array_merge($request->all(), $customData));
            else {
                $created = empty($customData) ? $service->create($request->all()) : $service->create($customData);
            }
            return $created
                ? $this->success(__('Dữ liệu đã được tạo thành công'), $created)
                : $this->error(__('Dữ liệu chưa được tạo'), 400);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            return $this->error(__('Có lỗi xảy ra'), 500);
        }
    }

    public function _update(Request | FormRequest $request, IService $service, array $customData = [], bool $isMerge = false) {
        try {
            $id = $request->route('id');
            $updated = null;
            if($isMerge)
                $updated = $service->update($id, array_merge($request->all(), $customData));
            else {
                $updated = empty($customData) ? $service->update($id, $request->all()) : $service->update($id, $customData);
            }

            return $updated
                ? $this->success('Data updated successfully', $updated)
                : $this->error('Data not updated', 400);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            return $this->error('Something went wrong', 500);
        }
    }

    public function _delete(Request $request, IService $service) {
        try {
            $deleted = $service->delete($request->route('id'));
            return $deleted
                ? $this->success('Data deleted successfully')
                : $this->error('Data not deleted', 400);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error('Something went wrong', 500);
        }
    }


}
