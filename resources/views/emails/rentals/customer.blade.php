<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">✅ Car Rental Confirmation</h1>

        <p>Hello <strong>{{ $rental->user->name }}</strong>,</p>

        <p class="mt-4">Thank you for renting a car with us. Here are your rental details:</p>

        <ul class="mt-4 space-y-2">
            <li><strong>Car:</strong> {{ $rental->car->name }} ({{ $rental->car->brand }})</li>
            <li><strong>Rental Period:</strong> {{ $rental->start_date->format('Y-m-d') }} to {{ $rental->end_date->format('Y-m-d') }}</li>
            <li><strong>Total Cost:</strong> ${{ number_format($rental->total_cost, 2) }}</li>
        </ul>

        <div class="mt-6">
            <a href="{{ url('/rentals') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                View Your Rentals
            </a>
        </div>

        <p class="mt-6">Thanks,<br><strong>{{ config('app.name') }}</strong></p>
    </div>
</body>
</html>
