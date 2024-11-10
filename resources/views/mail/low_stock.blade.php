<!DOCTYPE html>
<html>
    <head>
        <title>Low Stock Alert</title>
    </head>
    <body>
        <p>Dear Supplier,</p>
        <p>
            The stock for the product
            <strong>{{ $product->name }}</strong>
            is running low.
        </p>
        <p>Current Quantity: {{ $product->stock }}</p>
        <p>Please restock as soon as possible.</p>
        <p>Thank you!</p>
    </body>
</html>
