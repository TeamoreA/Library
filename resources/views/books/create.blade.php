        <div class="card mb-6 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Add book </h4>
          </div>
          <div class="card-body">
            <form class="form-signin" method="POST" action="{{ route('books.store') }}">
              @csrf
              <div class="form-label-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Book name" required autofocus>
                <label for="name">Book Title</label>
              </div>

              @if($genres == null)
                <input class="form-control" type="hidden" name="genre_id" value="{{$genre_id}}">
              @endif
              @if($genres != null)
              <div class="form-group">
                <select name="genre_id" id="#" class="form-control">
                  @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                  @endforeach
                </select>
                <label for="genre_id">Select genre</label>
              </div>
              @endif

              <div class="form-label-group">
                <textarea type="email" id="description" name="description" class="form-control autosize-target text-left" placeholder="Description" required autofocus rows="4" style="resize: vertical;"></textarea>
                <label for="description">Description</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit"> <i class="fas fa-plus"></i> Add Book</button>
            </form>

          </div>
        </div>