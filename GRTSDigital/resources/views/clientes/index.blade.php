@extends('template.index')

@section('conteudo')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Clientes</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="table_id" class="display">
                    <thead>
                      <th>
                        Name
                      </th>
                      <th>
                        Country
                      </th>
                      <th>
                        City
                      </th>
                      <th>
                        Salary
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Jon Porter
                        </td>
                        <td>
                          Portugal
                        </td>
                        <td>
                          Gloucester
                        </td>
                        <td>
                          $98,615
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection
