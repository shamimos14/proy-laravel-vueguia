@csrf
<input type="number" name="user_id" id="user_id" value="{{ old('user_id', $user->id) }}" readonly hidden />
<div class="row">
    <div class="form-group">
        <label for="name">Articulo</label><input class="form-control" type="text" name="name" id="name"
            value="{{ old('name', $category->name) }}">
    </div>
</div>

<div class="row form-group">
    <label for="description">Contenido</label>
    <textarea class="form-control" name="description" id="description" rows="10" rows="10"
        >{{ old('description', $category->description) }}</textarea>
</div>

<div class="row center">
    <div class="col s6">
        <button class="btn btn-success btn-sm" type="submit">Publicar</button>
        <button class="btn btn-danger btn-sm">Cancelar</button>
    </div>

</div>
