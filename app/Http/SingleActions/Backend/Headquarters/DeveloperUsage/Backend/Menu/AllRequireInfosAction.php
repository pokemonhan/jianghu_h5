<?php

namespace App\Http\SingleActions\Backend\Headquarters\DeveloperUsage\Backend\Menu;

use App\Models\DeveloperUsage\Backend\SystemRoutesBackend;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/**
 * Class for menu all require infos action.
 */
class AllRequireInfosAction
{
    /**
     * @param  array $inputDatas 传递的参数.
     * @return JsonResponse
     */
    public function execute(array $inputDatas): JsonResponse
    {
        $routeCollection = Route::getRoutes()->get();

        if ((int) $inputDatas['type'] === 0) {
            $routeInfo = $this->getAllRouteInfo($routeCollection);
        } else {
            $routeInfo = $this->getRouteInfo($routeCollection, $inputDatas);
        }

        //$data['firstlevelmenus'] = $firstlevelmenus;
        //$data['editMenu'] = $editMenu;
        //$data['routeMatchingName'] = $routeMatchingName;
        $data['route_info'] = $routeInfo;

        return msgOut(true, $data);
    }

    /**
     * Gets the route information.
     *
     * @param array $routeCollection RouteCollection.
     * @param array $inputDatas      传递的参数.
     *
     * @return array
     */
    private function getRouteInfo(array $routeCollection, array $inputDatas)
    {
        $type = [
            1 => 'headquarters-api',
            2 => 'merchant-api',
            3 => 'app-api',
        ];
        $routeEndKey = $type[$inputDatas['type']] ?? $type[1];
        //      firstlevelmenus = BackendSystemMenu::getFirstLevelList();

        //      editMenu = BackendSystemMenu::all();
        //      $routeMatchingName = $editMenu->where('route', '!=', '#')->keyBy('route')->toArray();
        $registeredRoute = SystemRoutesBackend::pluck('route_name');

        $routeInfo = [];
        foreach ($routeCollection as $dataKey => $route) {
            if (isset($route->action['as'])
                && $route->action['prefix'] !== '_debugbar'
                && preg_match('#^' . $routeEndKey . '#', $route->action['as']) === 1
                && !in_array($route->action['as'], (array) $registeredRoute)
            ) {
                $routeShortData[$dataKey]['url'] = $route->uri;
                $routeShortData[$dataKey]['controller'] = $route->action['controller'];
                $routeShortData[$dataKey]['route_name'] = $route->action['as'];
                $routeInfo[] = $routeShortData[$dataKey];
                //              $routeInfo[$r->action['as']] = $r->uri;
            }
        }
        
        return $routeInfo;
    }

    /**
     * Gets all route information.
     *
     * @param array $routeCollection RouteCollection.
     *
     * @return array
     */
    private function getAllRouteInfo(array $routeCollection)
    {
        $routeInfo = [];
        foreach ($routeCollection as $dataKey => $route) {
            if (isset($route->action['as']) && $route->action['prefix'] !== '_debugbar') {
                $routeShortData[$dataKey]['url'] = $route->uri;
                $routeShortData[$dataKey]['controller'] = $route->action['controller'];
                $routeShortData[$dataKey]['route_name'] = $route->action['as'];
                $routeInfo[] = $routeShortData[$dataKey];
            }
        }
        return $routeInfo;
    }
}
