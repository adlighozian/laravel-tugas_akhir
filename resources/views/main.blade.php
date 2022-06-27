<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- TAB START --}}
    <link href="" rel="shortcut icon" />
    <title><?= $title ?> </title>
    {{-- TAB END --}}
    {{-- CDN_CSS START --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- CDN_CSS END --}}
    {{-- CSS START --}}
    <link rel="stylesheet" href="/assets/css/style.css">
    {{-- CSS END --}}
</head>

<body>
    {{-- MAIN START --}}
    @yield('main')
    {{-- MAIN END --}}
    {{-- JS_CDN START --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/tailwind.js"></script>
    {{-- JS_CDN END --}}
    {{-- JS START --}}
    {{-- JS END --}}
</body>

</html>
