<?php

interface Storage
{
    public function addMatch($match);
    public function getMatchHistory();
}

interface CanCount
{
    public function count();
}


class LocalStorage implements Storage
    public function addMatch($match)
    {
        $history = json_decode(file_get_contents('history.json'));
        $history[] = $match;
        file_put_contents(
            'history.json',
            json_encode($history, JSON_PRETTY_PRINT)
        );
    }

    public function getMatchHistory()
    {
        return json_decode(file_get_contents('history.json'));
    }
}


class OtherStorage implements Storage
{
    public function addMatch($match)
    {
        $history = json_decode(file_get_contents('history.json'));
        $history[] = $match;
        file_put_contents(
            'history.json',
            json_encode($history, JSON_PRETTY_PRINT)
        );
    }

    public function getMatchHistory()
    {
        return json_decode(file_get_contents('history.json'));
    }
}

class Truc
{
    public $storage;
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }
}

$truc = new Truc(new LocalStorage());




