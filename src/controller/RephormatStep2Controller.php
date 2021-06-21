<?php


class RephormatStep2Controller extends RephormatController
{
    function handleRequest(AphrontRequest $request)
    {
        $page = $this->newPage();

        return $page;
    }
}