<!-- 
|/*
|--------------------------------------------------------------------------
| Vista de queries
|--------------------------------------------------------------------------
|
| Esta es la vista principal de queries que se ejecutarán en 
| la base de datos para ir mostrando información en dashboards.
|
|*/ -->

@extends('layouts.admin')

@section('template_title')
    Query
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Query') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('queries.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Queries</th>
										<th>Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($queries as $query)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $query->queries }}</td>
											<td>{{ $query->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('queries.destroy',$query->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('queries.show',$query->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('queries.edit',$query->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $queries->links() !!}
            </div>
        </div>
    </div>
@endsection
