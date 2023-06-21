@extends('layaout.master')
@section('content')
<form method="post" action="guardarXML" enctype="multipart/form-data">
<div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" name="archivo" type="file" id="formFile">
  <input type="submit" value="Cargar" class="btn btn-primary btn-lg">
</div>

</form>
<table class="table table-stripred">
  <thead>
    <tr>
      <th>Fecha</th>
      <th>RFC</th>
      <th>Nombre de la empresa</th>
      <th>Producto</th>
      <th>Importe</th>

    </tr>
  </thead>
  <tbody>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  </tbody>
</table>
@endsection
@section('scripts')

@endsection