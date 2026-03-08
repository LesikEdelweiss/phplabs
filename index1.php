<?php
declare(strict_types=1);

/**
 * Массив банковских транзакций
 */
$transactions = [
    [
        "id" => 1,
        "date" => "2019-01-01",
        "amount" => 100.00,
        "description" => "Payment for groceries",
        "merchant" => "SuperMart",
    ],
    [
        "id" => 2,
        "date" => "2020-02-15",
        "amount" => 75.50,
        "description" => "Dinner with friends",
        "merchant" => "Local Restaurant",
    ],
    [
        "id" => 3,
        "date" => "2021-06-10",
        "amount" => 50.25,
        "description" => "Book purchase",
        "merchant" => "BookStore",
    ],
];

/**
 * Вычисляет общую сумму транзакций
 */
function calculateTotalAmount(array $transactions): float
{
    $total = 0;
    foreach ($transactions as $transaction) {
        $total += $transaction["amount"];
    }
    return $total;
}

/**
 * Поиск транзакции по части описания
 */
function findTransactionByDescription(string $descriptionPart): array
{
    global $transactions;

    $result = [];

    foreach ($transactions as $transaction) {
        if (stripos($transaction["description"], $descriptionPart) !== false) {
            $result[] = $transaction;
        }
    }

    return $result;
}

/**
 * Поиск транзакции по id (foreach)
 */
function findTransactionById(int $id): ?array
{
    global $transactions;

    foreach ($transactions as $transaction) {
        if ($transaction["id"] === $id) {
            return $transaction;
        }
    }

    return null;
}

/**
 * Поиск транзакции через array_filter
 */
function findTransactionByIdFilter(int $id): array
{
    global $transactions;

    return array_filter($transactions, function ($transaction) use ($id) {
        return $transaction["id"] === $id;
    });
}

/**
 * Количество дней с момента транзакции
 */
function daysSinceTransaction(string $date): int
{
    $transactionDate = new DateTime($date);
    $now = new DateTime();

    $diff = $now->diff($transactionDate);

    return $diff->days;
}

/**
 * Добавление транзакции
 */
function addTransaction(
    int $id,
    string $date,
    float $amount,
    string $description,
    string $merchant
): void {

    global $transactions;

    $transactions[] = [
        "id" => $id,
        "date" => $date,
        "amount" => $amount,
        "description" => $description,
        "merchant" => $merchant
    ];
}

/**
 * Сортировка по дате
 */
function sortByDate(array &$transactions): void
{
    usort($transactions, function ($a, $b) {
        return strtotime($a["date"]) <=> strtotime($b["date"]);
    });
}

/**
 * Сортировка по сумме (по убыванию)
 */
function sortByAmountDesc(array &$transactions): void
{
    usort($transactions, function ($a, $b) {
        return $b["amount"] <=> $a["amount"];
    });
}

sortByDate($transactions);

$totalAmount = calculateTotalAmount($transactions);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Transactions</title>
</head>

<body>

<h2>Bank Transactions</h2>

<table border="1">

<thead>
<tr>
<th>ID</th>
<th>Date</th>
<th>Amount</th>
<th>Description</th>
<th>Merchant</th>
<th>Days ago</th>
</tr>
</thead>

<tbody>

<?php foreach ($transactions as $transaction): ?>

<tr>

<td><?= $transaction["id"] ?></td>
<td><?= $transaction["date"] ?></td>
<td><?= $transaction["amount"] ?></td>
<td><?= $transaction["description"] ?></td>
<td><?= $transaction["merchant"] ?></td>
<td><?= daysSinceTransaction($transaction["date"]) ?></td>

</tr>

<?php endforeach; ?>

<tr>
<td colspan="2"><b>Total</b></td>
<td><?= $totalAmount ?></td>
<td colspan="3"></td>
</tr>

</tbody>

</table>

</body>
</html>