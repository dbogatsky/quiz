<?php

$router = new \Phalcon\Mvc\Router();

$router->add(
    "/",
    array(
        "controller" => "auth",
        "action"     => "start"
    )
);

$router->add(
    "/auth",
    array(
        "controller" => "auth",
        "action"     => "start"
    )
);

$router->add(
    "/end",
    array(
        "controller" => "auth",
        "action"     => "end"
    )
);

$router->add(
    "/start",
    array(
        "controller" => "start",
        "action"     => "topics"
    )
);

$router->add(
    "/rules",
    array(
        "controller" => "quiz",
        "action"     => "rules"
    )
);
