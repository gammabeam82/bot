<?php

namespace Gammabeam82\Bot\Message;

interface MessageProviderInterface
{
    public function getReply(int $num = 1): string;

    public function greeting(): string;
}
