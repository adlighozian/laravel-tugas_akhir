<!DOCTYPE html>
<html lang="en">

<head>
    @extends('partials.layouts.head')
    <!-- CSS_CUSTOM START -->
    <link rel="stylesheet" href="stylesheets/pages/loginStyle.css">
    <!-- CSS_CUSTOM END -->
</head>

<body>
    <!-- <div class="ukur1"></div> -->
    <main>
        <!-- LOGIN START -->
        <div class="login d-flex flex-row justify-content-center align-items-center overflow-hidden">
            <!-- IMAGE START -->
            <div class="gambar">
                <img src="/images/login_image1.png" alt="">
            </div>
            <!-- IMAGE END -->
            <!-- LOGINFORM START -->
            <div class="sidebar d-flex justify-content-center align-items-center bg-white">
                <div class="box">
                    <div class="logo"></div>
                    <div class="text">
                        <p>Welcome, Admin BCR</p>
                    </div>
                    <div id="alert" class="d-none alertss">
                        <span>Masukkan username dan password yang benar. Perhatikan penggunaan huruf kapital.
                        </span>
                    </div>
                    <form id="form" action="#">
                        <!-- LABEL SATU -->
                        <label id="p1" for="">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value=""
                            placeholder="Contoh: johndee@gmail.com" onkeydown="validation()" required>
                        <!-- LABEL DUA -->
                        <label id="p1" for="">password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="6+ karakter" onkeydown="validation()" required>
                    </form>
                    <!-- BUTTON -->
                    <a href="/dashboard">
                        <button class="btn">
                            <p>Sign In</p>
                        </button>
                    </a>
                </div>
            </div>
            <!-- LOGINFORM END -->
        </div>
        <!-- LOGIN END -->
    </main>
    <!-- JS START -->
    <script src="/javascripts/loginScript.js"></script>
    <!-- JS END -->
</body>

</html>
