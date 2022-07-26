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
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    {{-- CDN_CSS END --}}
    {{-- CSS START --}}
    @yield('css')
    <link rel="stylesheet" href="/assets/css/style.css">
    {{-- CSS END --}}
</head>

<body>
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] overflow-auto bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            @yield('main')
            {{-- MAIN END --}}
        </div>
    </div>
    {{-- JS_CDN START --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src=//code.jquery.com/jquery-3.5.1.slim.min.js integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
        crossorigin=anonymous></script>
    {{-- JS_CDN END --}}
    {{-- JS START --}}
    @yield('js')
    <script src="/assets/js/tailwind.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/gudang.js"></script>
    <script src="/js/cart.js"></script>
    {{-- JS END --}}
</body>

</html>
