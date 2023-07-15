<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <title>Login Page</title>
  </head>
  <body>
    <div class="container mt-5">
            <!-- エラーメッセージの表示 -->
        @if(session('msg'))
            <p style="color:red;">{{ session('msg') }}</p>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="text-center mb-4">BizDiverse<br> 企業用ログインページ</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('company.login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="mail">Eメール</label>
                                <input type="email" class="form-control" id="com_email" name="com_email" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">パスワード</label>
                                <input type="password" class="form-control" id="pass" name="pass" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">ログインする</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <p> <a href="{{ route('company.register') }}">会員登録する<br>※パスワードを忘れた場合もこちらから再登録できます</a></p>
                </div>
                <div class="text-center mt-4">
                    <p> <a href="{{ url('/') }}">もとに戻る</a></p>
                </div>

                
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
