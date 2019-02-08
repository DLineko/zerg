<?php

namespace app\api\controller;


use app\api\service\Token as TokenService;
use think\Controller;

class BaseController extends Controller
{
    protected function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }

    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    protected function checkSuperScope()
    {
        TokenService::needSuperScope();
    }
}