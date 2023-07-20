<!DOCTYPE html>
<html>
<head>
    <title>都道府県と市区町村の選択</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
                    <form method="POST" action="{{ route('company.update2') }}">
                        @csrf
                        <div class="form-group">
                            <label for="com_email">Eメール：</label>
                            <input type="email" class="form-control" id="com_email" name="com_email" value="{{ $userData->com_email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="prefecture">都道府県:</label>
                            <select class="form-control" id="prefecture" name="prefecture" required>
                                <option value="">選択してください</option>
                                <option value="tokyo" @if($userData->prefecture == "tokyo") selected @endif>東京都</option>
                                <option value="kanagawa" @if($userData->prefecture == "kanagawa") selected @endif>神奈川県</option>
                                <option value="saitama" @if($userData->prefecture == "saitama") selected @endif>埼玉県</option>
                                <!-- 他の都道府県もここに追加 -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="area">エリア:</label>
                            <select class="form-control" id="area" name="area" required>
                                <option value="">選択してください</option>
                                <option value="inside" @if($userData->area == "inside") selected @endif>23区内</option>
                                <option value="outside" @if($userData->area == "outside") selected @endif>23区外</option>
                                <!-- 他のエリアもここに追加 -->
                            </select>
                        </div>
                        <div class="form-group">
                            <p>都市選択:</p>
                            <div id="city">
                                <!-- PHPで都市のチェックボックスを動的に生成 -->
                                @foreach($cityMappings as $key => $cityMapping)
                                    <input type="checkbox" id="{{ $key }}" name="city[]" value="{{ $key }}" @if(in_array($key, $cities)) checked @endif>
                                    <label for="{{ $key }}">{{ $cityMapping }}</label><br>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary btn-block">更新</button>
                    </form>
                    <form method="POST" style="margin-top: 10px;" action="{{ route('company.logout2') }}">
                        @csrf
                        <button type="submit" name="logout" class="btn btn-secondary btn-block">ホーム画面に戻る</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#prefecture').change(function(){
            var prefecture = $(this).val();
            if(prefecture == 'tokyo'){
                $('#area').html('<option value="">選択してください</option><option value="inside">23区内</option><option value="outside">23区外</option>');
            } else {
                $('#area').html('<option value="">選択してください</option>');
            }
        });
        $('#area').change(function(){
            var area = $(this).val();
            var cityOptions = '';
            if(area == 'inside'){
                cityOptions = '<input type="checkbox" id="chiyoda" name="city[]" value="chiyoda"> <label for="chiyoda">千代田区</label><br>' +
                    '<input type="checkbox" id="minato" name="city[]" value="minato"> <label for="minato">港区</label><br>' //+ ... 東京23区の全ての区をここにリストアップしてください
            }
            else if(area == 'outside'){
                cityOptions = '<input type="checkbox" id="hachi" name="city[]" value="hachi"> <label for="hachi">八王子</label><br>' +
                    '<input type="checkbox" id="tachi" name="city[]" value="tachi"> <label for="minato">立川市</label><br>' //+ ... 東京23区の全ての区をここにリストアップしてください
            }
            else {
                cityOptions = '';
            }
            $('#city').html(cityOptions);
        });
    });
</script>

</body>
</html>
