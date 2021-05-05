@extends('base')		
			
            @section('main')		
            <div class="row">		
             <div class="col-sm-8 offset-sm-2">		
                <h1 class="display-3">Add a Comment</h1>		
              <div>		
                @if ($errors->any())		
                  <div class="alert alert-danger">		
                    <ul>		
                        @foreach ($errors->all() as $error)		
                          <li>{{ $error }}</li>		
                        @endforeach		
                    </ul>		
                  </div><br />		
                @endif		
                  <form method="post" action="{{ route('comments.store') }}">		
                      @csrf	
                      <div class="form-group">										
										
                    <label for="contacts_id">Contact ID:</label>										
                    <input type="contacts_id" class="form-control" name="contacts_id" value={{ $contact->id }} />										
                </div>
                      <div class="form-group">    		
                          <label for="text">Texts:</label>		
                          <input type="text" class="form-control" name="text"/>		
                      </div>		
                    
                      <div class="form-group">    		
                          <label for="star">Star:</label>		
                          <input type="star" class="form-control" name="star"/>		
                      </div>		
                    
                    <button type="submit" class="btn btn-primary">Add Comment</button>		
                  </form>		
              </div>		
            </div>		
            </div>
            @endsection		