
<div class="commentBody">
  @foreach($comments as $comment)
      <div class="card mt-1 py-1">
          <div class="card-body">
              <p class="mt-1 me-3 {{ auth()->id() == $comment->user_id ? 'text-primary' : 'text-secondary'}}" style="display:inline-block;"><strong>{{$comment->user->name}}</strong></p>
              <div class="col-12">
                  <div class="row">
                      <div class="col-4">
                          <i class="far fa-clock"></i> <span class="comment_date text-secondary">{{$comment->created_at->diffForHumans()}}</span>
                      </div>
                      <div class="col-4">
                          <span class="cursor-pointer reply-button" style="cursor: pointer">
                              <i class="fas fa-reply"></i> <span class="comment_date text-secondary">Reply</span>
                          </span>
                      </div>
                  </div>

                  <p class="my-1" style="color: black; font-weight: bold">{{$comment->body}}</p>

                      <form method="post" action="{{ route('reply.add') }}" class="reply" id="reply">
                          @csrf
                          <div class="form-group">
                              <textarea class="form-control @error('comment_body') is-invalid @enderror" name="comment_body" placeholder="أضف ردًا ..."></textarea>
                              @error('comment_body')
                                  <span class="invalid-feedback">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror

                              <input type="hidden" name="material_id" value="{{ $comment->material_id }}" />
                              <input type="hidden" name="comment_id" value="{{ $comment->id }}" />

                            </div>
                          <div class="form-group">
                              <input type="submit" class="btn btn-primary my-2 btn-sm" value="تعليق"/>
                          </div>
                      </form>

                  @include('partials.comments', ['comments' => $comment->replies])
              </div>
          </div>
      </div>
  @endforeach
</div>

@section('scripts')
  <script>
      $(document).ready(function () {
          $(".reply").hide();
          $(".reply-button").click(function (event) {
              ele = $(this).parents("div.row").nextAll().slice(1,2).slideToggle('slow');
          });
      });
  </script>
@endsection