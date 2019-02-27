<?php

namespace app\api\controller\v1;

use app\api\model\UpImage as UpImageModel;
use app\api\validate\IDCollection;
use think\Controller;


class UpImage extends Controller
{

    public function getImage($ids = '')
    {
        $product = UpImageModel::getUploadImage();
        return $product;

    }
}
