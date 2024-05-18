<?php
while (true) {
    $input = strtolower(readline("Enter amount and currency you want to convert (100 EUR): "));
    [$amount, $currency] = explode(" ", $input);
    if (!is_numeric($amount)) {
        echo "Invalid number. Try again!" . PHP_EOL;
        continue;
    }
    $url = "https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/$currency.json";
    $getContents = json_decode(file_get_contents($url));
    if ($getContents == null) {
        echo "Invalid currency. Try again!" . PHP_EOL;
        continue;
    }
    break;
}
while (true) {
    $targetCurrency = trim(strtolower(readline("Enter currency you want to convert to (usd): ")));
    $exchangeRate = $getContents->{$currency}->{$targetCurrency};
    if (!isset($exchangeRate)) {
        echo "Invalid input. Try again!" . PHP_EOL;
        continue;
    }
    break;
}
$conversion = number_format($amount * $exchangeRate, 2);
echo "$amount $currency is $conversion $targetCurrency.";


