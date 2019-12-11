<?php

namespace App\Http\SingleActions\Backend\Headquarters\GameType;

use App\Http\Controllers\BackendApi\Headquarters\BackEndApiMainController;
use App\Models\Game\GameTypePlatform;
use App\Models\SystemPlatform;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

/**
 * Class AddDoAction
 *
 * @package App\Http\SingleActions\Backend\Headquarters\GameType
 */
class AddDoAction extends BaseAction
{
    /**
     * @param  BackEndApiMainController $contll     Contll.
     * @param  array                    $inputDatas InputDatas.
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(BackEndApiMainController $contll, array $inputDatas) :JsonResponse
    {
        $flag = false;
        try {
            $inputDatas['author_id'] = $contll->currentAdmin->id;
            DB::beginTransaction();
            $this->model->fill($inputDatas);
            if ($this->model->save()) {
                $insertData = $this->_getFormatDataForTypePlatform($this->model->id);
                GameTypePlatform::insert($insertData);
                $flag = true;
            }
        } catch (\Exception $exception) {
            $flag = false;
        }
        if ($flag) {
            DB::commit();
            return msgOut(true);
        } else {
            DB::rollBack();
            throw new \Exception('300402');
        }
    }

    /**
     * @param  integer $typeId TypeId.
     * @return array
     */
    private function _getFormatDataForTypePlatform(int $typeId):array
    {
        $data = [];
        $platforms = SystemPlatform::select('id')->get()->toArray();
        foreach ($platforms as $platform) {
            $tmpData['type_id'] = $typeId;
            $tmpData['platform_id'] = $platform['id'];
            $tmpData['device'] = GameTypePlatform::DEVICE_H5;
            $data[] = $tmpData;
            $tmpData['device'] = GameTypePlatform::DEVICE_APP;
            $data[] = $tmpData;
            $tmpData['device'] = GameTypePlatform::DEVICE_PC;
            $data[] = $tmpData;
        }
        return $data;
    }
}
