<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard {{ Auth::user()->role }}</title>
    <link href="{{ asset('backend/css/bootstrap.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/font-awesome.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/datepicker3.css ') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/styles.css ') }}" rel="stylesheet">
    <link href="{{ asset('datatable/jquery.dataTables.min.css ') }}" rel="stylesheet">
    <link href="{{ asset('selectize/select2.min.css')}}" rel="stylesheet" />

    
    <!-- include libraries(jQuery, bootstrap) -->

<script src="{{ asset('js/sweetalert.min.js')}}"></script>
    <!--[if lt IE 9]>

    <script src="{{ asset('backend/js/html5shiv.js ') }}"></script>
    <script src="{{ asset('backend/js/respond.min.js ') }}"></script>
    <![endif]-->
</head>
<body>
    @include('sweet::alert')
@include('partials.navbar')
@include('partials.sidebar')
    <main class="py-4">
            @yield('content')
        </main>

    
    <script src="{{ asset('backend/js/jquery-1.11.1.min.js ') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js ') }}"></script>
    <script src="{{ asset('backend/js/chart.min.js ') }}"></script>
    <script src="{{ asset('backend/js/chart-data.js ') }}"></script>
    <script src="{{ asset('backend/js/easypiechart.js ') }}"></script>
    <script src="{{ asset('backend/js/easypiechart-data.js ') }}"></script>
    <script src="{{ asset('backend/js/bootstrap-datepicker.js ') }}"></script>
    <script src="{{ asset('backend/js/custom.js ') }}"></script>
    <script src="{{ asset('datatable/jquery.dataTables.min.js ') }}"></script>
    <script src="{{ asset('selectize/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $('#datatables').DataTable({
                        responsive: true
                });
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#id').select2({
                maximumInputLength: 10

            });
        });
 
 
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#id1').select2({
                maximumInputLength: 10

            });
        });
 
 
    </script>

    <script type="text/javascript">


    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>

    <script>
            CKEDITOR.replace( 'content' );
    </script>
    
</body>
</html>