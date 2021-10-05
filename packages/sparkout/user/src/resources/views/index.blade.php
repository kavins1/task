<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add post</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
   <?php dd("test");?>
<section id="section1"style="padding-top:60px;">
        <div class="container">
        @if(Session::has('students'))
             <div class="alert alert-success"role="alert">
                {{Session::get('students')}}
            </div>
        @endif    
           <div class="row">
              <div class="col-md-12 ">
                 <div class="card">
                    <div class="card-header">
                       Add Post 
                    </div>
                    <div class="card-body">
                      
                       <form method="POST" action="{{route('students.store')}}">
                          @csrf
                          <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">First Name</label>
                             <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">

                              @error('name')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                           
                          </div>
                          </div >
                          <!-- <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">Last Name</label>
                           <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="last name" id="lastname">
                           
                           @error('last name')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          </div> -->
                          <div class="col-md-6">
                          <div class="form-group">
                          <label>Email</label>
                         <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">

                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
            
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                          <label >phone</label>
                          <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                             
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">State</label>
                             <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" id="state">

                           @error('state')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                           @enderror
                             
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                             <label for="name">Country</label>
                             <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country">

                              @error('country')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                   </span>
                              @enderror
                            
                          </div>
                          </div>
                          </div>
                          <button type="submit"class="btn btn-success" style="margin:15px;float:right">Add Post</button>
                       </form>
                    </div>
                 </div>
              </div>
           </div>
        </div>
</section>

<div class="card" style="padding-top:50px;">
  <div class="container">
     <div class="row">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  users 
               </div>
                  <div class="card-body">
                     <table class="table table-striped">
                         <thead>
                            <tr>
                              <th>ID</th>
                              <th>First</th>
                              <th>Email</th>
                              <th>phone number</th>
                              <th>state</th>
                              <th>country</th>
                              <th>Action</th>
                            </tr> 
                         </thead>
                          <tbody>
                          @foreach($student as $students)
                               <tr>
                               <td>{{$students->id}}</td>
                               <td>{{$students->name}}</td>
                               <td>{{$students->email}}</td>
                               <td>{{$students->phone}}</td>
                               <td>{{$students->state}}</td>
                               <td>{{$students->country}}</td>


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$students->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                          </div>
                                          <div class="modal-body">
                                          <div class="card-body">
                                                            
                                                   <form method="post" action="{{ route('students.update', $students->id) }}" >
                                                         <div class="form-group">
                                                         @csrf
                                                         <label for="name">Name</label>
                                                         <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"value="{{ $students->name }}"/>

                                                               @error('name')
                                                               <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                                  </span>
                                                               @enderror

                                                         </div>
                                                         <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $students->email }}"/>

                                                               @error('email')
                                                                  <span class="invalid-feedback" role="alert">
                                                                     <strong>{{ $message }}</strong>
                                                                  </span>
                                                               @enderror
                                                         </div>
                                                         <div class="form-group">
                                                            <label for="phone">Phone</label>
                                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $students->phone }}"/>

                                                               @error('phone')
                                                                  <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                                  </span>
                                                               @enderror
                                                         </div>
                                                         <div class="form-group">
                                                            <label for="state">state</label>
                                                            <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" id="state"value="{{ $students-> state }}"/>

                                                               @error('state')
                                                               <span class="invalid-feedback" role="alert">
                                                                     <strong>{{ $message }}</strong>
                                                               </span>
                                                               @enderror
                                                         </div>
                                                         <div class="form-group">
                                                            <label for="country"></label>
                                                            <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{ $students->country }}"/>

                                                                  @error('country')
                                                                     <span class="invalid-feedback" role="alert">
                                                                     <strong>{{ $message }}</strong>
                                                                     </span>
                                                                  @enderror
                                                         </div>
                                                      
                                                   </form>
                                                </div>
                                                </div>
                                          </div>
                                          <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                       <button type="submit" class="btn btn-primary">Update data</button>
                                          </div>
                                       </div>
                                    </div>
                                    </div>
                                    
                                  <td class="text-center">
                                     
                                     <a  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$students->id}}">Edit</a>
                                   
                                     <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
                                          @csrf
                                         @method('DELETE')  
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                      </form>
                                   </td>
                                             
                               </tr>
                             @endforeach
                          </tbody>
                       </table>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>