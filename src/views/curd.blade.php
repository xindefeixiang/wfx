<link rel="stylesheet" href="{{asset('css/app.css')}}">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="wfxaddcurd" method="post">

<table class="table" style="width: 60%;margin: 0 auto">
    <tr>
        <td>控制名称：</td>
        <td><input type="text" name="controller"></td>
    </tr>
    <tr>
        <td>模型名称：</td>
        <td><input type="text" name="model"></td>
    </tr>
    <tr>
        <td>视图目录：</td>
        <td><input type="text" name="views"></td>
    </tr>
    <tr>
        <td>{{ csrf_field() }}</td>
        <td><input type="submit" value="提交"></td>
    </tr>
</table>
</form>