@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $plan->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="price">Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $plan->price ?? old('price') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" class="form-control">{{ $plan->name ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>