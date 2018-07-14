<?php

namespace Gammabeam82\Bot\Message;

use Gammabeam82\Bot\Utils\Utils;

class MessageProvider implements MessageProviderInterface
{
    /**
     * @var array
     */
    protected $messages;

    /**
     * MessageProvider constructor.
     *
     * @param array $messages
     */
    public function __construct(array $messages)
    {
        $this->messages = $messages;
    }

    /**
     * @param int $num
     *
     * @return string
     */
    public function getReply(int $num = 1): string
    {
        $num = $num > 9 ? 9 : $num;

        $reply = "";

        $parts = array_map(function ($part) {
            shuffle($part);
            return $part;
        }, $this->messages['parts']);

        for ($i = 1; $i <= $num; $i++) {
            $sentence = "";
            foreach ($parts as $key => &$part) {
                $word = array_pop($part);
                if (0 === $key) {
                    $word = Utils::ucFirst($word);
                }
                $format = 3 !== $key ? "%s " : "%s. ";
                $sentence .= sprintf($format, $word);
            }
            $reply .= $sentence;
        }

        return $reply;
    }

    /**
     * @return string
     */
    public function greeting(): string
    {
        return $this->messages['greeting'];
    }
}
