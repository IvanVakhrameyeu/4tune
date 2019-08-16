<?php


namespace App\Repositories;


use ZMQ;
use ZMQContext;

class DoublePusher extends BasePusher
{
    /***
     * отправляем данные в App\Console\Commands\PhpServer который затем
     * обратиться сюда же (в объект класса Pusher) (в который указывает метод)
     *
     * Для того чтобы данные ретранслировать подписчикам
     *
     * @param array $data
     * @throws \ZMQSocketException
     */
    static function sendDataToServer(array $data)
    {
        $context = new ZMQContext();
        $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my_pusher');

        $socket->connect('tcp://localhost:5555');

        $data = json_encode($data);
        $socket->send($data);
    }

    /***
     * рассылаем подписчикам данные
     * @param $jsonDataToSend
     */
    public function broadcast($jsonDataToSend)
    {
        $aDataToSend = json_decode($jsonDataToSend, true);

        $subscribedTopics = $this->getSubscribedTopics();
        if (isset($subscribedTopics[$aDataToSend['topic_id']])) {
            $topic = $subscribedTopics[$aDataToSend['topic_id']];
            $topic->broadcast($aDataToSend);
        }
    }
}
