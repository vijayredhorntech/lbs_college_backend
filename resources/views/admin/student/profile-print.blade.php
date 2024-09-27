<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>application_form_{{ $student->full_name }}_{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/641cc4ef4e.js" crossorigin="anonymous"></script>

    <wireui:scripts />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <style>
        @media print {
            /* set margins*/
            @page {
                margin: 10px;
            }
            .page-break {
                page-break-before: always;
            }
        }
    </style>

</head>
<body>

<x-student-details :student="$student" />
@livewireScripts
<script>
    window.print();
</script>
</body>
</html>
