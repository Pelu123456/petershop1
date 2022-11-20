<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
@include('admin.layout.head',['title'=>__($title ??'Dashboard')])
</head>

<body class="nk-body ui-rounder npc-default has-sidebar ">
    <div class="nk-app-root">

        <!-- side-bar -->
        @include('admin.layout.side-bar')
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('admin.layout.header')
                <!-- main header @e -->
                <!-- content @s -->
                @yield('main')
                <!-- content @e -->

            </div>
                  
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @include('admin.layout.java')
</body>

</html>