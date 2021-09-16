

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Profile Update</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4">Update Profile</h5>
              @if ($status != 0)
                <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <span class="pt-4">Set Profile Pic</span>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ $user->phone !=null ? $user->phone : '' }}">
                  </div>

                  <div class="form-group mt-3">
                    <input type="number" min="1" name="family_member" class="form-control" placeholder="Family member" value="{{ $user->family_member !=null ? $user->family_member : '' }}">
                  </div>

                  <div class="form-group mt-3">
                    <input type="text" name="country" class="form-control" placeholder="Country" value="{{ $user->country !=null ? $user->country : '' }}">
                  </div>

                  <div class="form-group mt-3">
                    <input type="text" name="address_1" class="form-control" placeholder="Address 1" value="{{ $user->Address_1 !=null ? $user->Address_1 : '' }}">
                  </div>

                  <div class="form-group mt-3">
                    <input type="text" name="address_2" class="form-control" placeholder="Address 2" value="{{ $user->Address_2 !=null ? $user->Address_2 : '' }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Bio</label>
                    <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3">{{ $user->bio !=null ? $user->bio : '' }}</textarea>
                  </div>

                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>


                @else
                  <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <span class="pt-4">Set Profile Pic</span>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group mt-3">
                      <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                    </div>

                    <div class="form-group mt-3">
                      <input type="number" min="1" name="family_member" class="form-control" placeholder="Family member">
                    </div>

                    <div class="form-group mt-3">
                      <input type="text" name="country" class="form-control" placeholder="Country">
                    </div>

                    <div class="form-group mt-3">
                      <input type="text" name="address_1" class="form-control" placeholder="Address 1">
                    </div>

                    <div class="form-group mt-3">
                      <input type="text" name="address_2" class="form-control" placeholder="Address 2">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Bio</label>
                      <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              @endif


            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
