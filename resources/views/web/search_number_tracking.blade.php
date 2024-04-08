@extends('layouts.app_web')
@section('content')
<div class="container mt-2">
    <h2>Busqueda de numero tracking</h2>

    <form action="/search-number-tracking/search" method="POST">
    	@csrf
		<div class="form-group">
			<label for="trackings">Ingrese Numeros de Rastreo <em>Ingrese difitos sepaarados por comas, ej. 123456789, 987654321, 2244668800</em> </label>
			<textarea class="form-control" id="trackings" name="trackings" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Buscar</button>
    </form>

</div>
@endsection