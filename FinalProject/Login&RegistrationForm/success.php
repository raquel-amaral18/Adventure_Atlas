<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdventureAtlas - Touristic Guides</title>
    <style>
        body {
            background-color: #126D76;
            color: white;
            font-family: 'made-dillan-personal', Arial, sans-serif !important;
            text-align: center;
            padding-top: 100px;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 30px;
        }

        p {
            font-size: 20px;
            margin-bottom: 50px;
        }

        a {
            width: calc((100% / 3) - 8px);
            padding: 16px;
            background-color: white;
            color: #126D76;
            border: 1px solid white;
            cursor: pointer;
            transition: all 200ms ease-in-out;
            border-radius: 3px;
            font-weight: bold;
            font-size: 0.75rem;
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 0.15rem;
        }

        a:not([disabled]):hover {
            box-shadow: 0 1px 9px rgb(255, 255, 255);
        }

        a[disabled] {
            background-color: #eaeaea !important;
        }
    </style>
</head>

<body>
    <h1>Welcome Aboard!</h1>
    <p>Your action was completed successfully</p>
    <a href="Form.php">Go to Login</a>
</body>

</html>