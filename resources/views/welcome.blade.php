<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>

<form action="{{ route('user.login') }}" method="get">
  <button type="submit">個人用ログイン画面</button>
</form>

<form action="{{ route('company.login') }}" method="get">
  <button type="submit">企業用ログイン画面</button>
</form>

</body>
</html>
