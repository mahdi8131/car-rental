<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Rental Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">🚗 New Car Rental Notification</h1>

        <p><strong>Customer:</strong> {{ $rental->user->name }}</p>
        <p><strong>Car:</strong> {{ $rental->car->name }} ({{ $rental->car->brand }})</p>
        <p><strong>Rental Period:</strong> {{ $rental->start_date->format('Y-m-d') }} to {{ $rental->end_date->format('Y-m-d') }}</p>
        <p><strong>Total Cost:</strong> ${{ number_format($rental->total_cost, 2) }}</p>

        <p class="mt-6">Thanks,<br><strong>{{ config('app.name') }}</strong></p>
    </div>
</body>
</html>
