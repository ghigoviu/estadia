@extends('layouts.app')

@section('template_title')
    {{ $query->name ?? 'Show Query' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Query</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('queries.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Queries:</strong>
                            {{ $query->queries }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $query->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
