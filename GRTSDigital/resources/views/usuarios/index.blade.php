@extends('template.index')

@section('conteudo')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Usuários</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="table_id" >
                    <thead>
                      <th>
                        Nome
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Ações
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach($usuarios as $usuario)
                            <td>{{$usuario->nome}}</td>
                            <td>{{$usuario->email}}</td>
                            <td><a href=""><i class="nc-icon nc-alert-circle-i"></i></a></td>
                        @endforeach
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

</script>
@endsection
