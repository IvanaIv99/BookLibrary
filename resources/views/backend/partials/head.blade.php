<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=asset('assets/img/favicons/favicon-16x16.png')?>">

    <title>Book Library  {{  isset($title) ? " - " . $title : " " }}</title>
    @include('backend.partials.styles')
</head>
