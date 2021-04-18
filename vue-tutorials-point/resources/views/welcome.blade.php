<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
       <div id="app">
           <main-component></main-component>
       </div>
    </body>

<script src="{{ asset('js/app.js') }}"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{--    <script src="sweetalert2.all.min.js"></script>--}}
{{--    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->--}}
{{--    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"><script>--}}
</html>
