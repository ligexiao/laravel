<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    private $file;

    private $access_path;

    private $store_path;

    public $err_code= 0;

    /**
     * TODO: 上传文件错误码
     */
    const FileUploadOk= "0";        //文件上传正常
    const FileServerLimit= "401";   //文件大小超出了服务器的空间大小
    const FileWebLimit= "402";      //要上传的文件大小超出浏览器限制
    const FileUploadPart= "403";    //文件仅部分被上传
    const FileLost= "404";          //没有找到要上传的文件
    const FileTempLost= "405";      //服务器临时文件夹丢失
    const FileCopyError= "406";     //文件写入到临时文件夹出错
    const FileError= "407";         //文件上传出错

    public function __construct()
    {
        $this->file = $_FILES['file'];
        $this->access_path = '/uploads/';// 页面可访问地址,不包含域名部分
        $this->store_path = '/data/uploads/';// 服务器保持地址
    }

    public function fileInfo()
    {
        try{
            $file_info =array();
            # 取得文件名称
            $file_info['name'] = $this->file['name'];
            # 文件扩展名
            $file_info['ext'] = substr($this->file['name'], strrpos($this->file['name'], ".") + 1);
            # 取得文件类型
            $file_info['type'] = $this->file['type'];
            # 取得文件长度
            $file_info['size'] = $this->file['size'];
            # 文件上传上来临时文件的路径
            $file_info['tmp_path'] = $this->file['tmp_name'];
            return $file_info;
        }catch (\Exception $e){
            return [];
        }
    }


    /*
         * 上传图片测试
         */
    public function uploadFile(Request $request)
    {
        $size = $request->get('size');

        $ret = $this->upload($this->store_path);
        if($ret!==false && isset($ret['path'])){
            return $this->success($ret);
        }else{
            return $this->fail($this->err_code);
        }

    }
    /**
     *上传文件
     * @param $upload_path string 存储路径
     */
    public function upload($upload_path)
    {
        try{
            if(is_uploaded_file($this->file['tmp_name'])){
                move_uploaded_file($this->file['tmp_name'], $upload_path.$this->file['name']);
                switch($this->file['error']) {
                    case 1:
                        # 文件大小超出了服务器的空间大小
                        $error = self::FileServerLimit;
                        break;
                    case 2:
                        # 要上传的文件大小超出浏览器限制
                        $error = self::FileWebLimit;
                        break;

                    case 3:
                        # 文件仅部分被上传
                        $error = self::FileUploadPart;
                        break;

                    case 4:
                        # 没有找到要上传的文件
                        $error = self::FileLost;
                        break;

                    case 5:
                        # 服务器临时文件夹丢失
                        $error = self::FileTempLost;
                        break;

                    case 6:
                        # 文件写入到临时文件夹出错
                        $error = self::FileCopyError;
                        break;

                    default:
                        $error = self::FileUploadOk;
                }
                $this->err_code = $error;
                return ['path'=>'uploads/'.$this->file['name']];
            }else{
                $this->err_code =  self::FileError;
                return false;
            }
        }catch (\Exception $e){
            $this->err_code =  self::FileError;
            return false;
        }
    }
}