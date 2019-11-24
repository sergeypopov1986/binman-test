<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="d-flex align-items-center flex-column justify-content-center h-100 bg-dark text-white" id="header">
    <span class="display-7" id="short-link-result">Short link will here</span>
    <form id="get-link-form">
        <div class="form-group">
            <input class="form-control form-control-lg" name="URL" placeholder="URL" type="text">
        </div>
        <div class="form-group">
            <button class="btn btn-info btn-lg btn-block" id="get-shortlink-btn">Получить короткую ссылку</button>
        </div>
    </form>
</div>
</body>
</html>
<script>
    $(function(){
        $('#get-shortlink-btn').on('click' , function(e){
            e.preventDefault();
            if($('input[name="URL"]').val() !== '') {
                $.ajax({
                    url: '/service.php?action=getLink',
                    data: $('#get-link-form').serialize(),
                    method: 'get',
                    dataType: 'json'
                }).done(function(resp){
                    if(resp.success) {
                        $('#short-link-result').text(resp.data.link);
                        $('input[name="URL"]').val('');
                    }
                });
            } else {
                $('#short-link-result').html('<p style="color:red;">Введите URL</p>');
            }
        });
    });
</script>