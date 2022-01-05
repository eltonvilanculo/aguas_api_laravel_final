@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('link.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="agent">Agente</label>

                            <select id="agent"  class="form-control" name="agent">

                                @foreach ($users as $agent )
                                <option value="{{ $agent->utilizador_id }}"> {{ $agent->utilizador_id }}-{{ $agent->username }}</option>
                                @endforeach

                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="zone">Zona</label>

                            <select id="zone"  class="form-control" name="zone">

                                @foreach ($zones as $zone )
                                <option value="{{ $zone->zona_id }}"> {{ $zone->designacao }}</option>
                                @endforeach

                            </select
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Atribuir</button>
                      </form>
                </div>
            </div>
        </div>
    </div>





</div>

<div class="container">
<div class="row justify-content-center py-5">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">{{ __('Atribuições') }}</div>

            <div class="card-body">


                <table class="table">
                    <thead class="table-dark">
                      <td> ID</td>
                      <td> Agente </td>
                      <td> Zona</td>
                      <td> Período</td>
                      <td> Estado</td>
                    </thead>

                    <tbody>
                        @forelse ($links as $key=> $link )

                        <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $link->user->username??'sem nome no sistema' }}</td>
                        <td>{{  $link->zone->designacao}}</td>
                        <td>{{ $link->created_at }}</td>

                        @switch($link->status)
                            @case(0)

                            <td class="text-warning"> Pendente </td>
                                @break

                                @case(3)

                                <td class="text-danger"> Cancelado </td>
                                    @break

                                    @case(2)

                                    <td class="text-success"> Finalizado </td>
                                        @break

                            @default

                        @endswitch
                        </tr>

                        @empty

                        Nao tem links

                        @endforelse

                    </tbody>
                  </table>



                </div>
        </div>
    </div>
</div>

</div>
@endsection
