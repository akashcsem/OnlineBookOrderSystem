<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('page-title')</title>

  <!-- REQUIRED CSS -->
  <link rel="stylesheet" href="/css/app.css">
  <style>
  .my-card
    {
      position:absolute;
      left:40%;
      top:-20px;
      border-radius:50%;
    }
  </style>
</head>
