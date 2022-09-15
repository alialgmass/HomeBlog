@extends('layouts.app')

@section('content')
<table class="table">
    <tr>
        
        <th>name</th>
        <th>email</th>
        <th>address</th>
        <th>birth Date</th>
        
    </tr>
    <tr>
     <td>{{Auth::user()->name}}</td> 
     <td>{{Auth::user()->email}}</td> 
     <td>{{Auth::user()->address}}</td> 
     <td>{{Auth::user()->birth}}</td>   
    </tr>
</table>    
@endsection