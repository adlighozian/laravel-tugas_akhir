<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
  
    <p>Berikut merupakan link untuk melakukan reset password anda:</p>
    <a href="{{ $link }}">Reset Password</a>
     
    <p>Thank you</p>
</body>
</html>
