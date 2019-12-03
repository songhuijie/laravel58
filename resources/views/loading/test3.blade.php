<form action="/v1/upload_avatar" method="POST" enctype ="multipart/form-data">

    <input type="hidden"  name="save_type" value="avatar">
    <input type="file"  id="file" name="avatar" value="">
    <input type="button" id="button" value="提交">
</form>

<script src="https://www.jq22.com/jquery/jquery-2.1.1.js"></script>
<script>
        $('#button').on('click',function(){
            var save_type = 'avatar';
            var formData = new FormData();
            formData.append("avatar", $("#file")[0].files[0]);


            var url = '/v1/upload_avatar?save_type' + save_type;

            var data = formData;
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.code == 0) {
                        console.log(response)
                    } else {
                       console.log(response)
                    }
                }
            });
        });

</script>
