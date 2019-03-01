<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25
 * Time: 23:15
 */
namespace app\api\model;
use think\console\output\Formatter;
use think\File;
header("Content-type: text/html; charset=utf-8");
class UpImage{
    public static  function getUploadImage(){
        $typeArr = array("jpg", "png", "gif","ico");
        $path = "../public/images/" ;//上传路径
        $upload=$_FILES;
        $file =  $upload['file'];
        $name = $file['name'];
        $size = $file['size'];
        $name_tmp = $file['tmp_name'];
        $type = strtolower(substr(strrchr($name, '.'), 1));
        if (empty($name)) {
            echo json_encode(array("error" => "您还未选择图片"));
            exit ;
        }
        if (!in_array($type, $typeArr)) {
            echo json_encode(array("error" => "清上传jpg,png或gif类型的图片！"));
            exit ;
        }
        if ($size > (500 * 1024)) {
            echo json_encode(array("error" => "图片大小已超过500KB！"));
            exit ;
        }
        $time=date("YmdHis",time());
        $pic_name = $time  .  rand(10000, 99999) ."." . $type;
        //图片名称
        $pic_url = $path . $pic_name;
        //上传后图片路径+名称
            if (move_uploaded_file($name_tmp, $pic_url)) {//临时文件转移到目标文件夹
                echo json_encode(array("error" => "0", "pic" => $pic_url, "name" => $pic_name));
            } else {
                echo json_encode(array("error" => "上传有误，清检查服务器配置！"));
            }
    }
}