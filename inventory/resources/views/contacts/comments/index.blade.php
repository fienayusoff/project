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
 <h1 class="display-3">Comments</h1>    									
 <table class="table table-striped">									
<thead>									
<tr>									
<td>ID</td>									
 <td>Text</td>									
<td>Star</td>												
<td colspan = 2>Actions</td>									
</tr>									
</thead>									
<tbody>									
@foreach($comments as $comment)									
<tr>									
  <td>{{$comment->id}}</td>									
  <td>{{$comment->text}}</td>									
  <td>{{$comment->star}}</td>									
  							
  <td>									
<a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>									
</td>									
<td>									
<form action="{{ route('contacts.destroy', $contact->id)}}" method="post">									
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
<a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">New contact</a>									
</div>  																
</div>									
@endsection									
                                                                            