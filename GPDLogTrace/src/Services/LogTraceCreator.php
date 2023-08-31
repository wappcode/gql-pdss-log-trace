<?php

declare(strict_types=1);

namespace GPDLogTrace\Services;

use Exception;
use GPDCore\Services\IPClientService;
use Doctrine\ORM\EntityManager;
use GPDLogTrace\Entities\LogTrace;
use GPDLogTrace\Library\LogTraceInfo;

class LogTraceCreator
{

    public static function create(EntityManager $entityManger, LogTraceInfo $info)
    {

        if (!$info->isValid()) {
            throw new Exception('Invalid Log Data');
        }
        $input = $info->getInput();
        $userId = $info->getUserId() ?? null;
        $userFullName = $info->getUserName() ?? null;
        $ip = IPClientService::get();
        $inputValue = is_array($input) ? $input : null;
        $entity = new LogTrace();
        $entity
            ->setResource($info->getResource())
            ->setAction($info->getAction())
            ->setReferenceId($info->getReferenceId())
            ->setReferenceLabel($info->getReferenceLabel())
            ->setSourceIP($ip)
            ->setUser($userId)
            ->setInput($inputValue)
            ->setUserFullName($userFullName);
        $entityManger->persist($entity);
        $entityManger->flush();
    }
}
