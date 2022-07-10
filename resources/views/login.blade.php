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
    <div class="w-full h-[100vh] flex">
        {{-- IMAGE START --}}
        <div class="sm:block bg-warnatiga w-full h-full hidden duration-150"></div>
        {{-- IMAGE END --}}
        <div class="sm:w-[700px] w-full h-full flex justify-center px-[30px] bg-warnasatu flex-col">
            <p class="font-bold text-2xl mb-[24px]">Masuk</p>
            @if ($errors->first('email') != null)
                <div class="w-full bg-loginsatu text-logindua mb-[24px] rounded-[7px] flex justify-center p-3">
                    <p>{{ $errors->first('email') }}</p>
                </div>
            @endif
            {{-- FORM START --}}
            <form action="/action_login" method="post" class="w-full">
                @csrf
                <div class="mb-3">
                    <label for="inputEmail" class="mb-1">Email</label>
                    <input type="text" id="email" class="form-control rounded-2xl h-[48px] border-0"
                        placeholder="Masukan email" name="email" required autofocus value="{{ old('email') }}">
                </div>
                <div class="mb-8">
                    <label for="inputPassword" class="mb-1">Password</label>
                    <div class="flex justify-end items-center h-[48px] w-full">
                        <input type="password" id="password" class="form-control h-full w-full rounded-2xl border-0"
                            placeholder="Masukan Password" name="password" required>
                        {{-- HIDE_SHOW START --}}
                        <span onclick="hide()"
                            class="absolute h-[40px] w-[30px] mr-3 cursor-pointer flex items-center justify-center bg-white">
                            <i id="hide2" class='bx bx-show hidden text-slate-600 text-[20px]'></i>
                            <i id="hide1" class='bx bx-hide text-slate-600 text-[20px]'></i>
                        </span>
                        {{-- HIDE_SHOW END --}}
                    </div>
                </div>
                <button type="submit"
                    class="font-medium h-[48px] w-full rounded-2xl bg-warnadua text-white hover:bg-opacity-80 shadow-lg duration-150">Masuk</button>
            </form>
            {{-- FORM END --}}

        </div>
    </div>
    {{-- MAIN END --}}
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
    {{-- JS END --}}
</body>

</html>
