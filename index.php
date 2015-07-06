<?php

use Deck\Application\Application;
use Deck\Application\ApplicationServiceProvider;

use Deck\Framework\DeckServiceProvider;

$app = new Application(
    dirname(__FILE__),
    array(
        new ApplicationServiceProvider(),
        new HttpServiceProvider(),
        new DeckServiceProvider(),
    )
);

$app->run();
