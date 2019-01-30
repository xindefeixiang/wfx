<?php

namespace App\Http\Controllers\Curd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class CurdController extends Controller
{
    /**
     * @var string
     */
    public $controller = '';
    public $model = '';
    /**
     * 接受数据
     */
    public function getdata(Request $request){
        $data = $request->only('controller','model','views');
        //控制器
        $controller = __DIR__.'/../'.ucfirst($data['controller']).'.php';

        //模型
        $model = app_path(ucfirst($data['model']).'.php');
        $this->controllerfile(ucfirst($data['controller']),$controller,ucfirst($data['model']));
        $this->modelfile(ucfirst($data['model']),$model);
        //生成文件
//        $this->createfile($controller,$model);
        //生成路由
        $this->createroute(lcfirst($data['controller']));
    }
    /*
     * 生成路由
     */
    public function createroute($controller){
        echo $controller;die;
        Route::get("$controller/show",ucfirst($controller)."@show");
        Route::get("$controller/wfxtaddshow",ucfirst($controller)."@addshow");
        Route::post("$controller/wfxadddata",ucfirst($controller)."@adddata");
    }
    /*
     * 生成文件
     */
    public function createfile($controller,$model){
        file_put_contents($controller,$this->controller);
        file_put_contents($model,$this->model);
    }
    /**
     * 处理模型
     */
    public function modelfile($model,$file){
        $modeldata = file_get_contents(app_path('Curd/Defaults.php'));
        $preg = '/Defaults/isu'; //处理名称
        $preg2 = '/App.Curd/isu'; //处理命名空间
        $preg3 = '/App.Curd.Defaults/isu'; //处理命名空间
        $preg4 = '/table = \'.*?\'/isu';
        $res = preg_replace($preg,$model,$modeldata);
        $res1 = preg_replace($preg2,'App',$res);
        $res3 = preg_replace($preg4,"table = '".lcfirst($model)."'",$res1);
        $res2 = preg_replace($preg3,"App\\".$model,$this->content);
        $this->controller = $res2;
        $this->model = $res3;
    }
    /**
     * @param $file
     * @return $this
     * 处理控制器
     */
    public function controllerfile($controller,$file,$model){
        $controllerdata = file_get_contents(__DIR__.DIRECTORY_SEPARATOR."DefaultController.php");
        $preg = '/DefaultController/isu'; //控制器名称替换
        $preg2 = '/App.Http.Controllers.Curd/isu'; //命名空间替换
        $preg3 = '/new Defaults()/isu'; //替换模型
        $preg4 = '/Schema::getColumnListing\(.*?\)/isu';
        $res = preg_replace($preg,$controller,$controllerdata);
        $res1 = preg_replace($preg2,'App\Http\Controllers',$res);
        $res2 = preg_replace($preg3,"new $model",$res1);
        $res3 = preg_replace($preg4,"Schema::getColumnListing('".lcfirst($model)."')",$res2);
        $this->content = $res3;
    }

}
