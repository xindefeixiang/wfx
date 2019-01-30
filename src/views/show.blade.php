<link rel="stylesheet" href="{{asset('css/app.css')}}">
<table class="table" style="width: 80%;margin: 5% auto">
    <tr>
        <td><a href="wfxtaddshow">添加</a></td>
    </tr>
    <tr>
        @foreach ($columns as $post)
            <td>{{$post}}</td>
        @endforeach
        <td>操作</td>
    </tr>

        @foreach ($data as $post)
        <tr>
            @foreach ($post as $post1)
            <td>{{$post1}}</td>
            @endforeach
                <td>
                    <a href="#">删除</a> |
                    <a href="#">修改</a>
                </td>
        </tr>
        @endforeach

</table>