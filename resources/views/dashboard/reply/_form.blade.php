@csrf
<div class="row form-group">
    <label for="post_id">Posts</label>
    <select class="form-control" name="post_id" id="post_id">
        @foreach ($posts as $post )
        <option {{ $post->id ==$reply->post_id ? 'selected="selectes"' : '' }}
            value="{{ $post->id }}">{{ $post->name}}</option>           
        @endforeach
    </select>
 </div>

<div class="row form-group">
    <label for="text">Text</label>
    <textarea class="form-control" name="text" id="text" rows="10" rows="10">{{ old('text', $reply->text) }}</textarea>
</div>

<div class="row center">
    <div class="col s6">
        <button class="btn btn-success btn-sm" type="submit">Publicar</button>
        <button class="btn btn-danger btn-sm">Cancelar</button>
    </div>

</div>
