<h1>
    测试
</h1>
<script src="https://www.jq22.com/jquery/jquery-2.1.1.js"></script>
<script>
    $(document).ready(function(){
        console.log(11);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://www.laravel58.com:8888/test3', true);

        xhr.setRequestHeader("sign", "lfdtxAGEGFi9VsoaXxm7ZDJl8NAChsWcvkHPimfwSQVXkQ0VQfmwBsHgUf9JlhWjYQx86lSy6TCzYhljDtJx51YZ9uL/0goA7Yzs5HqunB6ToPVjZe5LJiKu8qbuclV+ebgOa3a3DLkzB5NRDUna3tWr9xLDEtby91wxbA9hr3g=");
        xhr.setRequestHeader("Access-Control-Allow-Origin", "http://xvideotool.xyz");

        xhr.onload = function (response) {
            console.log(response)
            // 请求结束后,在此处写处理代码
        };

        response = xhr.send(null);
        console.log(response)

        var url = 'http://xvideotool.xyz/api/selected_list';
        $.ajax({
            url: url,
            type: 'get',
            beforeSend: function(request) {
                request.setRequestHeader("sign", 'lfdtxAGEGFi9VsoaXxm7ZDJl8NAChsWcvkHPimfwSQVXkQ0VQfmwBsHgUf9JlhWjYQx86lSy6TCzYhljDtJx51YZ9uL/0goA7Yzs5HqunB6ToPVjZe5LJiKu8qbuclV+ebgOa3a3DLkzB5NRDUna3tWr9xLDEtby91wxbA9hr3g=');
                request.setRequestHeader('Access-Control-Allow-Origin','http://xvideotool.xyz');
                request.setRequestHeader('Access-Control-Allow-Credentials','true');
                request.setRequestHeader('Access-Control-Expose-Headers','FooBar');
            },

            success: function (response) {
                console.log(response)
            }
        });

    });
</script>
