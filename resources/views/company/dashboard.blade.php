<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container my-5">
    <div class="row">
        <div class="col-sm-4">
            <a href="{{ route('info') }}" class="btn btn-primary btn-block mb-2">基本情報修正画面</a>
            <a href="{{ route('com_scout_set') }}" class="btn btn-primary btn-block mb-2">条件設定画面</a>
            <a href="{{ route('cus_search') }}" class="btn btn-primary btn-block mb-2">会員検索画面</a>
            <a href="{{ route('com_chat') }}" class="btn btn-primary btn-block mb-2">スカウトやり取り画面</a>
            <a href="{{ route('index_com') }}" class="btn btn-primary btn-block mb-2">ログアウト</a>
            <a href="{{ route('result') }}" class="btn btn-primary btn-block mb-2">数値</a>
        </div>
        <div class="col-sm-8">
            <table class='table'>
                <thead><tr><th>User ID</th><th>Count</th></tr></thead>
                <tbody>
                    @foreach ($counts as $count)
                        <tr>
                            <td>{{ $count->user_send_id }}</td>
                            <td>{{ $count->count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br><br>

            <table class='table'>
                <thead><tr><th>Total unique users</th><th>Total messages</th></tr></thead>
                <tbody>
                    <tr>
                        <td>{{ $total_counts->total_unique_user_count }}</td>
                        <td>{{ $total_counts->total_message_count }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>

</body>
</html>
