<?php

declare(strict_types=1);

namespace GPDLogTrace\Services;

use GPDAuth\Entities\User;
use GPDAuth\Library\IAuthService;
use GPDCore\Services\IPClientService;
use Doctrine\ORM\EntityManager;
use Exception;
use GPDLogTrace\Entities\LogTrace;
use GPDLogTrace\Library\LogTraceInfo;

class LogTraceCreator {

    public static function create(EntityManager $entityManger, IAuthService $auth, LogTraceInfo $info) {

        if (!$info->isValid()) {
            throw new Exception('Faltan datos para el registro log');
        }
        $input = $info->getInput();
        $userArray = $auth->getSignedUser();
        $userId = $userArray["id"];
        $user = $entityManger->getRepository(User::class)->find($userId);
        $userFullName = $user->getFullname();
        $ip = IPClientService::get();
        $inputString = json_encode($input);
        $entity = new LogTrace();
        $entity
        ->setResource($info->getResource())
        ->setAction($info->getAction())
        ->setReferenceId($info->getReferenceId())
        ->setReferenceLabel($info->getReferenceLabel())
        ->setSourceIP($ip)
        ->setUser($user)
        ->setInput($inputString)
        ->setUserFullName($userFullName);
        $entityManger->persist($entity);
        $entityManger->flush();
    }
    public static function createNoUser(EntityManager $entityManger, LogTraceInfo $info, string $userName) {

        if (!$info->isValid()) {
            throw new Exception('Faltan datos para el registro log');
        }
        $input = $info->getInput();
        $resource = $info->getResource();
        $action = $info->getAction();
        $referenceId = $info->getReferenceId();
        $referenceLabel = $info->getReferenceLabel();
        $ip = IPClientService::get();
        $inputString = json_encode($input);

        $entity = new LogTrace();
        $entity
        ->setResource($resource)
        ->setAction($action)
        ->setReferenceId($referenceId)
        ->setReferenceLabel($referenceLabel)
        ->setSourceIP($ip)
        ->setInput($inputString)
        ->setUserFullName($userName);
        $entityManger->persist($entity);
        $entityManger->flush();
    }
}