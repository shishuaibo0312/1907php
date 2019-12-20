<form action="{{route('yy')}}" method="post">
    @csrf
    <table>
        用户名：<input type="text"name="name"><br>
        密码：<input type="pwd" name="pwd"><br>
        <input type="submit" value="提交">

    </table>
</form>





