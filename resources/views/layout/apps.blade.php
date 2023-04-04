<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset ('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <link rel="shortcut icon" href=" {{ asset('assets/img/icong.png') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-0D9l83uU6V5U6Pvz7lw5Uw1YzV8W5pxGk11M7E9+6ugPKBC6U5z6BvylA0Nz6U+QFZhS1NLJvI3+XJc/tG4Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title> {{ $title }} </title>

    <script>
        $(document).ready(function() {
            var url = window.location.href;
            $('ul.nav a[href="'+url+'"]').parent().addClass('active');

            $(document).ready(function() {
                $('ul.nav li a').click(function() {
                    $('ul.nav li').removeClass('active');
                    $(this).parent().addClass('active');
                });
            });
        });

    //     $(document).ready(function () {
    //     $('#exampleModal').on('show.bs.modal', function (event) {
    //         var button = $(event.relatedTarget) // Button yang mengaktifkan modal
    //         var recipient = button.data('whatever') // Mengambil data yang dikirim melalui button
    //         var modal = $(this)
    //         modal.find('.modal-title').text('Tambah Data') // Mengubah judul modal
    //         modal.find('.modal-body input').val(recipient) // Mengisi form dengan data yang dikirim melalui button
    //     });
    // });
    </script>
</head>
<body>
    
    @if (Auth::check())
        @include('layout.header')
    @endif

    <div class="max-w-md mx-auto min-h-screen">
        @yield('content')
    </div>

    @include('layout.footer')
    

</body>
</html>