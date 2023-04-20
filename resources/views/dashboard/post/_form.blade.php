 @csrf
 <input type="number" name="user_id" id="user_id" value="{{ old('user_id', $user->id) }}" readonly hidden />
 <div class="row">
     <div class="form-group">
         <label for="name">Articulo</label><input class="form-control" type="text" name="name" id="name"
             value="{{ old('name', $post->name) }}">
     </div>
 </div>

 <div class="row form-group">
     <label for="description">Contenido</label>
     <textarea class="form-control" name="description" id="description" rows="10" rows="10">{{ old('description', $post->description) }}</textarea>
 </div>

 <div class="form-group">
    <label for="category_id">categorías</label>
    <select class="form-control" name="category_id" id="category_id">
        @foreach ($categories as $category )
        <option {{ $post->category_id ==$category->id ? 'selected="selectes"' : '' }}
            value="{{ $category->id }}">{{ $category->name}}</option>           
        @endforeach
    </select>
 </div>


 <div class="form-group">
    <label for="state">Posted</label>
    <select class="form-control" name="state" id="state">
        @include('dashboard.partials.option-yes-not', ['val' => old('state',$post->state)])
    </select>
 </div>

 <div class="row center">
     <div class="col s6">
         <button class="btn btn-success btn-sm" type="submit">Publicar</button>
         <button class="btn btn-danger btn-sm">Cancelar</button>
     </div>

 </div>
