<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->

      <base href="/public">
      @include('home.homecss')

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')

      </div>

      <div style="text-align:center" class="col-md-12">

        <div><img style="padding: 20px; height:100%; width:100%"
            src="/postimage/{{ $post->image }}"
            class="services_img"></div>


        <h3><b>{{ $post->title }}</b></h3>

        <h4>{{ $post->description }}</h4>


        <p>Posted by: <b>{{ $post-> name }}</b></p>

     </div>


      <!-- footer section start -->
      @include('home.footer')
   </body>
</html>
