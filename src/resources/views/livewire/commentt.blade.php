<div class="col-md-12 bootstrap snippets">
    <div class="panel">
      @error('newComment') <span class="alert alert-danger">{{$message}}</span> @enderror
      <form wire:submit.prevent="addComment">
        <div class="panel-body">
            <input name="content" class="form-control" rows="2" placeholder="What are you thinking?" autocomplete="off" wire:model.debounce.500ms="newComment"/>
            <div class="mar-top clearfix">
              <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
            </div>
        </div>
        @csrf
      </form>
    </div>
    <div class="panel">
      @if(!empty($comments))
      @foreach($comments as $comment)
        <div class="panel-body">
            <div class="media-block"> 
              <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
              <div class="media-body">
                <div class="mar-btm">
                  <a href="#" class="btn-link text-semibold media-heading box-inline ml-2">{{nameUser($comment->user_id)}}</a>
                  <p class="text-muted text-sm"><i class="fa fa-lg ml-2"></i>{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                <p class="ml-2">{{ $comment->content }}</p>
                <div class="pad-ver">
                    <div class="btn-group">
                      <i id="likeButton" class="input1 btn btn-sm btn-default fa fa-thumbs-up"></i>
                      <i id="dislikeButton" class="input2 btn btn-sm btn-default fa fa-thumbs-down" style="color:#858796"></i>
                    </div>
                </div>
              <hr>
              </div>
            </div>
        </div>
      @endforeach
      @endif
     
    </div>

    @section('ext-script')
    <script>
    </script>
  @endsection
 