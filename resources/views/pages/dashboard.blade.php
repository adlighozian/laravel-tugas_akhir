<!DOCTYPE html>
<html lang="en">

<head>
    @extends('partials.layouts.head')
    <!-- CSS_CUSTOM START -->
    <link rel="stylesheet" href="/stylesheets/pages/dashboardStyle.css" />
    <!-- CSS_CUSTOM END -->
</head>

<body>
    <div class="box2">
        <!-- SIDEBAR_ICON START -->
        @extends('partials.layouts.sidebarIcon')
        <!-- SIDEBAR_ICON END -->
        <!-- SIDEBAR_MENU START -->
        @extends('partials.layouts.sidebarMenu')
        <!-- SIDEBAR_MENU END -->
    </div>
    <div class="box1">
        <header>
            <!-- NAVBAR START -->
            @extends('partials.layouts.navbar')
            <!-- NAVBAR END -->
        </header>
        <main>
            <!-- CONTENT START -->
            <div class="content">
                <!-- UPPER START -->
                <div class="upper">
                    <span class="text1">Dashboard <i class='bx bx-chevron-right'></i> </span><span
                        class="text2">Dashboard
                        car</span>
                </div>
                <!-- UPPER END -->
                <!-- MIDDLE START -->
                <div class="middle">
                    <span>Dashboard</span>
                </div>
                <!-- MIDDLE END -->
                <!-- MAIN START -->
                <div class="main">
                    <!-- TABLE START -->
                    @extends('partials.dashboard.tableOrder')
                    @extends('partials.dashboard.tableCar')
                    <!-- TABLE END -->
                </div>
                <!-- MAIN END -->
            </div>
            <!-- CONTENT END -->
        </main>
    </div>
    <!-- JS START -->
    @extends('partials.layouts.script')
    <!-- JS END  -->
</body>

</html>
