<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->

      @include('home.homecss')

      <style type="text/css">

        .post_deg{
            padding: 30px;
            text-align: center;
            background-color: black;
        }

        .title_deg{
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
            font-family: 'Times New Roman', Times, serif;
            color: wheat;
        }

        .desc_deg{
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            font-family: 'Times New Roman', Times, serif;
            color: wheat;
        }

        .img_deg{
            height: 200px;
            width: 300px;
            padding: 30px;
            margin: auto;
        }
      </style>

   </head>
   <body>
    @include('sweetalert::alert')

      <!-- header section start -->
      <div class="header_section">
        @include('home.header')


    @foreach ( $data as $data )


    <div class="post_deg">
        <img class="img_deg" src="/postimage/{{ $data -> image }}">
        <h4 class="title_deg">{{ $data -> title }}</h4>
        <p class="desc_deg">{{ $data -> description }}</p>

        <a onclick="return confirm('Are you sure to delete this?')" href="{{ url('my_post_del', $data->id) }}" class="btn btn-danger">Delete</a>

        <a href="{{ url('post_update_page', $data->id) }}" class="btn btn-primary">Update</a>

    </div>
    @endforeach
      </div>

      <!-- footer section start -->
      @include('home.footer')
   </body>
</html>
