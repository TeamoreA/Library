<div class="card mb-6 box-shadow">
  <div class="card-header">
    <h4 class="my-0 font-weight-normal">Create Genre</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('genres.store') }}" method="POST"  class="form-signin">
      {{ csrf_field() }}
      <div class="form-label-group">
        <input type="text" id="name"  name="name" class="form-control" placeholder="Genre Title" required autofocus>
        <label for="name">Genre Title</label>
      </div>
      <div class="form-label-group">
        <textarea id="description" name="description" class="form-control autosize-target text-left" placeholder="Description" required autofocus rows="4" style="resize: vertical;"></textarea>
        <label for="description">Description</label>
      </div>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fas fa-plus"></i> Create Genre</button>
    </form>
  </div>
</div> 