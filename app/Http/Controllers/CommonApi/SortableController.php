<?php

namespace App\Http\Controllers\CommonApi;

use App\Http\Requests\Backend\Headquarters\Sortable\UpdateRequest;
use App\Http\SingleActions\Common\Sortable\UpdateSortAction;
use Illuminate\Http\JsonResponse;

/**
 * Class SortableController
 * @package App\Http\Controllers\CommonApi
 */
class SortableController
{

    /**
     * Drag and drop sortable.
     * @param UpdateSortAction $action  UpdateSortAction.
     * @param UpdateRequest    $request Sortable Request.
     * @return JsonResponse
     * @throws \Throwable Throwable.
     */
    public function updateSortable(UpdateSortAction $action, UpdateRequest $request): JsonResponse
    {
        $result = $action->execute($request);
        return $result;
    }
}
