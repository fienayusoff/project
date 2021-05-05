@extends('base')									
										
@section('main')		
<div class="col-sm-12">				
				
  @if(session()->get('success'))				
    <div class="alert alert-success">				
      {{ session()->get('success') }}  				
    </div>				
  @endif				
</div>				
  <div class="row">									
<div class="col-sm-12">									
 <h1 class="display-3">States</h1>    									
 <table class="table table-striped">									
<thead>									
<tr>									
<td>ID</td>									
 <td>State Nama</td>									
<td>City</td>									
								
<td colspan = 2>Actions</td>									
</tr>									
</thead>									
<tbody>									
@foreach($states as $state)									
<tr>									
  <td>{{$state->id}}</td>									
  <td>{{$state->state_name}}</td>		
  <td>{{$state->city}}</td>									
  									
  <td>									
<a href="{{ route('states.edit',$state->id)}}" class="btn btn-primary">Edit</a>									
</td>									
<td>									
<form action="{{ route('states.destroy', $state->id)}}" method="post">									
@csrf									
@method('DELETE')									
<button class="btn btn-danger" type="submit">Delete</button>									
 </form>									
 </td>									
 </tr>									
 @endforeach									
</tbody>									
</table>									
<div>		
<div>									
<a style="margin: 19px;" href="{{ route('states.create')}}" class="btn btn-primary">New contact</a>									
</div>  																
</div>									
@endsection									
                                                                            