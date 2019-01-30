<?php
//public function __construct()
//
//    $this->//model = new Defaults();
//    $this->columns = Schema::getColumnListing('default');
//}
namespace App\Http\Controllers\Curd;
use App\Curd\Defaults;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
class DefaultController extends Controller
{
    /**
     * defaultController constructor.
     */
    public function __construct()
    {
        $this->model = new Defaults();
        $this->columns = Schema::getColumnListing('default');
    }
    /**
     * @var array
     */
    public $columns = [];
    /**
     * @var string
     */
    public $model = '';



    /**
     * 展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(){
        $showdata = $this->model->getall(); //获得所有数据
        return view('wfxcurd.show',['columns'=>$this->columns,'data'=>$showdata]);
    }

    /**
     * 添加展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addshow(){
        return view('wfxcurd.addshow',['columns'=>$this->columns]);
    }

    /**
     * 添加数据
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adddata(Request $request){
        $data = [];
        foreach ($this->columns as $column) {
            $data[$column] = $request->$column;
        }
        $res = $this->model->adddata($data);
        if (!$res){
            return back()->withErrors('添加失败，原因不明');
        }
        return redirect('wfxtest');
    }
}
