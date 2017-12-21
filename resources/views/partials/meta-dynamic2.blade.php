@section('meta-title') {{ $blog->title }} @endsection
@section('meta-desc'){{ str_limit($blog->body, 100) }}@endsection
@section('meta-author'){{ $blog->user->name }}@endsection