@extends('inc.header')

<body class="antialiased">

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        @if (Route::has('login'))

                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">

                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ url('/old_tickets') }}"> <button type="button" class="btn btn-outline-primary">View Old Tickets</button></a>

                        <a href="{{ route('login') }}"> <button type="button" class="btn btn-outline-primary">Login As Support Agent</button></a>

                    @endauth
                </div>
            @endif
                <div class="container">
                    <div>
                        <h1 id="head">Hello! Enter Your Problem </h1>
                        <form action="/creat_ticket"method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="lbl" for="exampleFormControlInput1">Customer Name</label>
                                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Enter Your Name" Required>
                            </div>
                            <div class="form-group">
                                <label class="lbl" for="exampleFormControlInput1">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Enter Your Email" Required>
                            </div>
                            <div class="form-group">
                                <label class="lbl" for="exampleFormControlInput1">Phone</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <select class="custom-select" name="ccode" style="max-width: 120px;">
                                                <option value="+1" selected>+1</option>
                                                <option value="+44">+44</option>
                                                <option value="+61">+61</option>
                                                <option value="+64">+64</option>
                                                <option value="+81">+81</option>
                                                <option value="+91">+91</option>
                                                <option value="+94">+94</option>
                                            </select>
                                        </div>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" maxlength="9" Required>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="lbl" for="exampleFormControlTextarea1">Problem Description</label>
                                <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3" Required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-success btn-lg">ADD TICKET</button>
                            </div>
                            <br>
                        </form>

                    </div>
                </div>

        </div>
        @include('sweetalert::alert')
    </body>
</html>
