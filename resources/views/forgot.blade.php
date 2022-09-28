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
            <p class="font-bold text-2xl mb-[24px]">Forgot Password</p>
            @if ($errors->first('email') != null)
                <div class="w-full bg-loginsatu text-logindua mb-[24px] rounded-[7px] flex justify-center p-3">
                    <p>{{ $errors->first('email') }}</p>
                </div>
            @endif
            {{-- FORM START --}}
            <form action="/action_forgot" method="post" class="w-full">
                @csrf
                <div class="mb-3">
                    <label for="inputEmail" class="mb-1">Masukkan Email Anda Untuk Dilakukan Reset Password</label>
                    <input type="text" id="email" class="form-control rounded-2xl h-[48px] border-0"
                        placeholder="Masukan email" name="email" required autofocus value="{{ old('email') }}">
                </div>
                
                <button type="submit"
                    class="font-medium h-[48px] w-full rounded-2xl bg-warnadua text-white hover:bg-opacity-80 shadow-lg duration-150">Kirim Email</button>
            </form>
            {{-- FORM END --}}
            {{-- JS START --}}
            @yield('js')
            <script src="/assets/js/tailwind.js"></script>
            <script src="/assets/js/script.js"></script>
            <script src="/assets/js/gudang.js"></script>
            <script src="js/cart.js"></script>
            {{-- JS END --}}
        </div>
    </div>
</body>

</html>
