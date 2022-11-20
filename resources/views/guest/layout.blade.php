<!DOCTYPE html>
<html lang="en">

  <head>
    @include('guest.layout.head',['title'=>__($title ??'PeterShop')])
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
   
    
    <!-- ***** Header Area Start ***** -->
    @include('guest.layout.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <!-- ***** Main Banner Area End ***** -->
    @yield('main')
    

    
    <!-- ***** Footer Start ***** -->
    @include('guest.layout.footer')

  </body>
</html>