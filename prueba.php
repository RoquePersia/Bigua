<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/* default timezone is irrelevant; timezone taken from the object */
ini_set('date.timezone', 'UTC');
/* default locale is taken from this ini setting */
ini_set('intl.default_locale', 'es_ES');
$fmt = new IntlDateFormatter(
    'es_ES',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Arentina/Buenos_Aires',
    IntlDateFormatter::GREGORIAN
);
echo 'First Formatted output is ' . $fmt->format(0);

?>
</body>
</html>