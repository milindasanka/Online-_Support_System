@extends('inc.header')

<body class="antialiased">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

    @if (Route::has('login'))

        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">

            @auth
                <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            @else
                <a href="{{ url('/') }}"> <button type="button" class="btn btn-outline-primary">Back to Home</button></a>
            @endauth
        </div>
    @endif
    <div class="container">
        <div>
            <h1 id="head">Search Your Ticket </h1>
            <form id="search-form"  method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control rounded" id="search-query" maxlength="10" placeholder="Enter Ticket Reference" aria-label="Search" aria-describedby="search-addon" name="query">
                    <button type="button" id="search-btn" class="btn btn-outline-primary">Search</button>
                </div>
                <br>
            </form>

        </div>

        <div id="search-result-container"></div>

    </div>
</div>

@include('sweetalert::alert')

</body>
<script>
    $(document).ready(function () {
        $('#search-btn').on('click', function() {
            var query = $('#search-query').val();
            get_table(query);
        });

        function get_table(query) {
            $.ajax({
                type: "GET",
                url: "{{ route('searchtx') }}",
                dataType: "html",
                data: { 'ticketID': query },
                success: function (data) {
                    $('#search-result-container').html(data);
                },
                error: function(xhr, status, erro)
                {
                    alert("Enter Correct Ticket Reference!");

                }

            });
        }
    });
</script>

</html>
