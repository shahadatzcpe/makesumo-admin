<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MakeSumo Admin[Production]- Frontend</title>

    <script>
        var MakeSumo = {!!  json_encode([
            'STRIPE_KEY' => config('services.stripe.key'),
            'packages'   => config('makesumo.subscription_models')
        ], JSON_PRETTY_PRINT)  !!}
    </script>
    @routes
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/frontend.css') }}">
</head>

<body>

@inertia


</body>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('/js/frontend.js') }}"></script>

</html>
