<?php

namespace App\Http\Resources\Frontend\System;

use App\Models\User\FrontendUsersAccount;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

/**
 * Class SystemLevelResource
 * @package App\Http\Resources\Frontend\FrontendUser
 */
class SystemLevelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request Request.
     * @return mixed[]
     */
    public function toArray($request): array
    {
        $result = [
                   'level'          => $this->level,
                   'experience_min' => $this->experience_min,
                   'experience_max' => $this->experience_max,
                   'grade_gift'     => (float) sprintf('%.2f', $this->grade_gift),
                   'week_gift'      => (float) sprintf('%.2f', $this->week_gift),
                  ];
        return $result;
    }
}
