<?php

$app->get('login.php', function() use($app) {
    $app['monolog']->addDebug('cowsay');
    return "<pre>".\Cowsayphp\Cow::say("Cool beans")."</pre>";
  });

?>