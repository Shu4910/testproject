<!-- info.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <title>登録情報</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="text-center mb-4">登録情報</h2>
                @if (!empty($msg))
                    <div class="alert alert-danger">{{ $msg }}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="houjin">法人：</label>
                                <input type="text" class="form-control" id="houjin" name="houjin" value="{{ $userData->houjin }}" required>

                            </div>
                            <div class="form-group">
                                <label for="tanto">担当者：</label>
                                <input type="text" class="form-control" id="tanto" name="tanto" value="{{ $userData->tanto }}" required>
                            </div>
                            <div class="form-group">
                                <label for="com_email">Eメール：</label>
                                <input type="email" class="form-control" id="com_email" name="com_email" value="{{ $userData->com_email}}" required>
                            </div>
                            <div class="form-group">
                                <label for="com_tel">電話番号：</label>
                                <input type="text" class="form-control" id="com_tel" name="com_tel" value="{{ $userData->com_tel }}" required>
                            </div>
                            <div class="form-group">
                                <label for="types">タイプ：</label>
                                <input type="text" class="form-control" id="types" name="types" value="{{ $userData->types }}" required>
                            </div>
                            <div class="form-group">
                                <label for="content">内容：</label>
                                <textarea class="form-control" id="content" name="content" required>{{ $userData->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="zipcode">郵便番号：</label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $userData->zipcode}}" required>
                            </div>
                            <div class="form-group">
                                <label for="address1">住所1：</label>
                                <input type="text" class="form-control" id="address1" name="address1" value="{{ $userData->address1 }}" required>
                            </div>
                            <div class="form-group">
                                <label for="address2">住所2：</label>
                                <input type="text" class="form-control" id="address2" name="address2" value="{{ $userData->address2 }}" required>
                            </div>
                            <div class="form-group">
                                <label for="address3">住所3：</label>
                                <input type="text" class="form-control" id="address3" name="address3" value="{{ $userData->address3}}" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">新しいパスワード：</label>
                                <input type="password" class="form-control" id="pass" name="pass" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_pass">新しいパスワードの確認：</label>
                                <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" required>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary btn-block">更新</button>
                        </form>
                        <form method="POST" style="margin-top: 10px;">
                            @csrf
                            <button type="submit" name="logout" class="btn btn-secondary btn-block">戻る</button>
                        </form>
                    </div>
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
