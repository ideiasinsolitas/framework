<?php

namespace Deck\Framework;

class DatabaseClientInterface
{

    public function connect(array $options);

    public function disconnect();

    public function query($query, $bind);
}
