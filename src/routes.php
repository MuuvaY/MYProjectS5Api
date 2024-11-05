<?php

declare(strict_types=1);
/*
-------------------------------------------------------------------------------
les routes
-------------------------------------------------------------------------------
 */

return [

    /* Routes pour les fighters */

    ['GET', '/fighters', 'fighters@index'],

    ['GET', '/fighters/{id:\d+}', 'fighters@show'],

    ['POST', '/fighters', 'fighters@create'],

    ['PATCH', '/fighters/{id:\d+}', 'fighters@update'],

    ['DELETE', '/fighters/{id:\d+}', 'fighters@delete'],

    ['OPTION', '/fighters', 'fighters@option'],

    /* Routes pour les fights */

    ['GET', '/fights', 'fights@index'],

    ['GET', '/fights/{id:\d+}', 'fights@show'],

    ['POST', '/fights', 'fights@create'],

    ['PATCH', '/fights/{id:\d+}', 'fights@update'],

    ['DELETE', '/fights/{id:\d+}', 'fights@delete'],



];
