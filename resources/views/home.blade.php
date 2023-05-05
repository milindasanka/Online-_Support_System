@extends('layouts.app')

@section('content')
    <!-- Fonts -->
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="    https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Styles -->
<div class="container">
  <h1>List OF Tickets</h1>

    <div class="card">
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Reference ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    @php if($ticket->status == 'TO DO'){$col ='#7DF9FF'; }
                    elseif ($ticket->status == 'DONE'){$col= '#32CD32';}else{$col='#FFBF00';}@endphp
                <tr style="background-color: @php echo $col; @endphp;">
                    <td>{{$ticket->reference}}</td>
                    <td>{{$ticket->name}}</td>
                    <td>{{$ticket->status}}</td>
                    <td><a href="/viewticket/{{$ticket->reference}}"> <button type="button" class="btn btn-outline-dark">open</button></a></td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</div>

@endsection
