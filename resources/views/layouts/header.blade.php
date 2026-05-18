@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeakScore</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}?v=2">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style type="text/tailwindcss">
        @theme {
            --color-brand-dark: #343434;
            --color-brand-muted: #8E8B82;
            --color-brand-beige: #E9DCBE;
            --color-brand-light: #F3F3F3;
        }
    </style>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="h-screen overflow-hidden overflow-x-hidden">
<div class="h-screen flex flex-col overflow-hidden overflow-x-hidden">
@endsection