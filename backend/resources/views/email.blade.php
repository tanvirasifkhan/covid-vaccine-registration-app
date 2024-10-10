<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background: #dedede;">
    <div style="border:2px solid #dedede;background: white; margin: 100px auto; width:40%; padding:15px 20px 20px 20px;border-radius: 10px;">
        <h2 style="color: #555555;font-family: Arial, Helvetica, sans-serif">Hello {{ $name }}</h2>
        <p style="color: #333333;font-family: Arial, Helvetica, sans-serif">Your Covid vaccination program scheduled at <strong style="color: #111111;">{{ $date }}</strong></p>
        <p style="color: #333333;font-weight:bold;font-style: italic;font-family: Arial, Helvetica, sans-serif">Please be there on time</p>
        <div>
            <span style="font-size:15px; color: #333333;font-family: Arial, Helvetica, sans-serif">Best Regards</span></br>
            <span style="font-size:15px; color: #333333;font-family: Arial, Helvetica, sans-serif">The Covid Vaccine Team</span>
        </div>
    </div>
</body>
</htm20