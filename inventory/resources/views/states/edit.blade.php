@extends('base') 										
@section('main')										
<div class="row">										
    <div class="col-sm-8 offset-sm-2">										
        <h1 class="display-3">Update a states</h1>										
										
        @if ($errors->any())										
        <div class="alert alert-danger">										
            <ul>										
                @foreach ($errors->all() as $error)										
                <li>{{ $error }}</li>										
                @endforeach										
            </ul>										
        </div>										
        <br /> 										
        @endif										
        <form method="post" action="{{ route('states.update', $state->id) }}">										
            @method('PATCH') 										
            @csrf										
            <div class="form-group">										
										
                <label for="first_name">State Name:</label>										
                <input type="text" class="form-control" name="state_name" value={{ $state->state_name }} />										
            </div>										
										
            <div class="form-group">										
                <label for="last_name">City:</label>										
                <input type="text" class="form-control" name="city" value={{ $state->city }} />										
            </div>										
													
            <button type="submit" class="btn btn-primary">Update</button>										
        </form>										
    </div>										
</div>										