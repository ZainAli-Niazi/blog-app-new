<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Niazi School Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @extends('layout/app')


</head>

<body>
    @extends('sidebar/sidebar')
    <!-- Main Content -->



    <div class="main-content">

        @yield('addstudent')

    </div>

    <div class="footer mt-5">
        2025 © Niazi School MANAGEMENT Developed By <a href="#"> Zain Ali</a>
    </div>


    @extends('layout/jquery')

</body>

</html>
