<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#000">
    <meta name="description" content="Quick and easy way to validate your IBAN!">
    <meta name="author" content="Jakub Kupczyk">
    <title>IBAN Validator</title>

    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💳</text></svg>">
    <link rel="stylesheet" href="./public/style.css">
</head>

<body>
    <div class="wrapper">
        <header>IBAN Validator</header>

        <main>
            <form action="./utils/test.php" method="post">
                <span class="hint">Ex. PL94109024021696142279144242</span>
                <div>
                    <input type="text" name="iban" class="" placeholder="Type IBAN...">
                    <button type="submit">Check IBAN</button>
                </div>
            </form>
        </main>

        <footer>

        </footer>
    </div>

    <script src="./public/app.js"></script>
</body>

</html>