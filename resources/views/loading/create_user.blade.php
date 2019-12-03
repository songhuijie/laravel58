<h1>Create Account</h1>
<form action="/wecreate" method="POST">
    <label>名称</label>
    <input type="text" name="name" />
    <label>描述</label>
    <input type="text" name="description" />
    <input type="hidden" name="access_token" value="{{$access_token}}"/>
    <input type="submit" value="提交">
</form>
