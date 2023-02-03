<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Message;

interface AppUserIdAwareInterface
{
    public function getAppUserId(): ?int;

    public function setAppUserId(?int $appUserId): void;
}
