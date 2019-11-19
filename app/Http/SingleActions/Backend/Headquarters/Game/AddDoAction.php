<?php

namespace App\Http\SingleActions\Backend\Headquarters\Game;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class AddDoAction
 * @package App\Http\SingleActions\Backend\Headquarters\Game
 */
class AddDoAction extends BaseAction
{
    /**
     * @param Request $request Request.
     * @return JsonResponse
     * @throws \Exception Exception.
     */
    public function execute(Request $request) :JsonResponse
    {
        $inputDatas = $request->all();
        $this->model->type_id = $inputDatas['type_id'];
        $this->model->vendor_id = $inputDatas['vendor_id'];
        $this->model->name = $inputDatas['name'];
        $this->model->sign = $inputDatas['sign'];
        $this->model->request_mode = $inputDatas['request_mode'];
        $this->model->conver_url = $inputDatas['conver_url'];
        $this->model->test_conver_url = $inputDatas['test_conver_url'] ?? '';
        $this->model->check_balance_url = $inputDatas['check_balance_url'];
        $this->model->test_check_balance_url = $inputDatas['test_check_balance_url'] ?? '';
        $this->model->check_order_url = $inputDatas['check_order_url'];
        $this->model->test_check_order_url = $inputDatas['test_check_order_url'] ?? '';
        $this->model->in_game_url = $inputDatas['in_game_url'];
        $this->model->test_in_game_url = $inputDatas['test_in_game_url'] ?? '';
        $this->model->get_station_order_url = $inputDatas['get_station_order_url'];
        $this->model->test_get_station_order_url = $inputDatas['test_get_station_order_url'] ?? '';
        $this->model->status = $inputDatas['status'];
        $this->model->app_id = $inputDatas['app_id'] ?? '';
        $this->model->authorization_code = $inputDatas['authorization_code'] ?? '';
        $this->model->merchant_code = $inputDatas['merchant_code'] ?? '';
        $this->model->merchant_secret = $inputDatas['merchant_secret'] ?? '';
        $this->model->public_key = $inputDatas['public_key'] ?? '';
        $this->model->private_key = $inputDatas['private_key'] ?? '';
        if ($this->model->save()) {
            return msgOut(true, [], '200', '添加成功');
        }
        throw new \Exception('300200');
    }
}
