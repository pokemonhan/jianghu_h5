<?php

namespace App\Http\SingleActions\Backend\Headquarters\Game;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class EditDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\Game
 */
class EditDoAction extends BaseAction
{
    /**
     * @param Request $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(Request $request) :JsonResponse
    {
        $inputDatas = $request->all();
        $model = $this->model->find($inputDatas['id']);
        $inputDatas = $request->all();
        $model->type_id = $inputDatas['type_id'];
        $model->vendor_id = $inputDatas['vendor_id'];
        $model->name = $inputDatas['name'];
        $model->sign = $inputDatas['sign'];
        $model->request_mode = $inputDatas['request_mode'];
        $model->conver_url = $inputDatas['conver_url'];
        $model->test_conver_url = $inputDatas['test_conver_url'] ?? '';
        $model->check_balance_url = $inputDatas['check_balance_url'];
        $model->test_check_balance_url = $inputDatas['test_check_balance_url'] ?? '';
        $model->check_order_url = $inputDatas['check_order_url'];
        $model->test_check_order_url = $inputDatas['test_check_order_url'] ?? '';
        $model->in_game_url = $inputDatas['in_game_url'];
        $model->test_in_game_url = $inputDatas['test_in_game_url'] ?? '';
        $model->get_station_order_url = $inputDatas['get_station_order_url'];
        $model->test_get_station_order_url = $inputDatas['test_get_station_order_url'] ?? '';
        $model->status = $inputDatas['status'];
        $model->app_id = $inputDatas['app_id'] ?? '';
        $model->authorization_code = $inputDatas['authorization_code'] ?? '';
        $model->merchant_code = $inputDatas['merchant_code'] ?? '';
        $model->merchant_secret = $inputDatas['merchant_secret'] ?? '';
        $model->public_key = $inputDatas['public_key'] ?? '';
        $model->private_key = $inputDatas['private_key'] ?? '';
        if ($model->save()) {
            return msgOut(true, [], '200', '修改成功');
        }
        throw new \Exception('300201');
    }
}
