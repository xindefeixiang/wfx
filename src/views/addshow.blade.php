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

<form action="wfxadddata" method="post">
    {{csrf_field()}}
<table class="table" style="width: 80%;margin: 5% auto">
    @foreach ($columns as $post)
        <tr>
            <td>{{$post}}:</td>
            <td><input type="text" name="{{$post}}"></td>
        </tr>
    @endforeach
        <tr>
            <td><input type="submit" value="提交"></td>
        </tr>
</table>
</form>