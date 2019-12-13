<?php

namespace App\Models\Systems\Traits;

use App\ModelFilters\System\SystemDomainFilter;
use Illuminate\Http\Request;

trait SystemDomainLogics
{

    /**
     * 插入所有类型的域名
     * @param  string  $domain       域名.
     * @param  string  $platformSign 平台标识.
     * @param  integer $adminId      管理员ID.
     * @return void
     */
    public function insertAllTypeDomain($domain, $platformSign, $adminId)
    {
        $typePrefix = $this->typePrefix;
        foreach ($typePrefix as $type => $prefix) {
            $addData = [
                'platform_sign' => $platformSign,
                'admin_id' => $adminId,
                'status' => self::STATUS_OPEN,
                'domain' => $prefix . $domain,
                'type' => $type,
            ];
            $this->insertDomain($addData);
        }
    }

    /**
     * 插入一条域名
     * @param array $addData 数据.
     * @return void
     */
    public function insertDomain($addData)
    {
        $domainEloq = new self;
        $domainEloq->fill($addData);
        $domainEloq->save();
        $success = true;
    }

    /**
     * 检查域名格式
     * @param  string  $domain 域名.
     * @param  integer $type   类型.
     * @return boolean
     */
    public function checkDomainPrefix(string $domain, int $type)
    {
        $success = false;
        $count = mb_substr_count($domain, '.');
        //必须是二级域名
        if ($count === 2) {
            $prefix = substr($domain, 0, strpos($domain, '.') + 1);
            $typePrefix = $this->typePrefix;
            //检查域名前缀是否正确
            if ($typePrefix[$type] === $prefix) {
                $success = true;
            }
        }
        return $success;
    }
}
