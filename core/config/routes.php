<?php

return [
    '^register$' => 'user/register',
    '^test(/(?P<id>[0-9]*))?$' => 'test/index/$2',
    '^page(/(?P<name>[a-z-]*))?$' => 'page/index/$2',
     '' => 'main', //Main - controller, index - action,
];