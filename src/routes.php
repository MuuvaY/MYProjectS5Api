<?php

declare(strict_types=1);
/*
-------------------------------------------------------------------------------
les routes
-------------------------------------------------------------------------------
 */

return [

    ['GET', '/api/v1/fake-datas/posts', 'post@index'],

    ['GET', '/api/v1/fake-datas/posts/{id:\d+}', 'post@show'],

    ['POST', '/api/v1/fake-datas/posts', 'post@create'],

    ['PATCH', '/api/v1/fake-datas/posts/{id:\d+}', 'post@update'],

    ['DELETE', '/api/v1/fake-datas/posts/{id:\d+}', 'post@delete'],

    ['OPTION', '/api/v1/fake-datas/posts', 'post@option'],


];
