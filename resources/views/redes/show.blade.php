@extends('adminlte::page')

@section('content_header')
  <h1>Rede: {{ $rede->nome }} </h1>
@stop

@section('content')
    @include('messages.flash')
    @include('messages.errors')

<div>
    <a href="{{action('RedeController@edit', $rede->id)}}" class="btn btn-success">Editar</a>
</div>
<br>

<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Rede</b>: {{ $rede->iprede }}/{{ $rede->cidr }}</li>
        <li class="list-group-item"><b>Gateway</b>: {{ $rede->gateway }}</li>
        <li class="list-group-item"><b>DNS</b>: {{ $rede->dns }}</li>
        <li class="list-group-item"><b>VLAN</b>: {{ $rede->vlan }}</li>
        <li class="list-group-item"><b>Domain Active Directory</b>: {{ $rede->ad_domain }}</li>
        <li class="list-group-item"><b>NTP</b>: {{ $rede->ntp }}</li>
        <li class="list-group-item"><b>Netbios</b>: {{ $rede->netbios }}</li>
    <li class="list-group-item"><b>Responsável</b>: {{ $rede->user->name }}</li>
    <li class="list-group-item"><b>Cadastrado em:</b> {{ \Carbon\Carbon::CreateFromFormat('Y-m-d H:i:s', $rede->created_at)->format('d/m/Y - H:i:s') }}</li>
    <li class="list-group-item"><b>Modificado em: </b> {{ \Carbon\Carbon::CreateFromFormat('Y-m-d H:i:s', $rede->updated_at)->format('d/m/Y - H:i:s') }}</li>
        <li class="list-group-item"><b>Grupos com permissão nessa rede:</b>
            <ul>
                @foreach ( $rede->roles()->get() as $role)        
                    <li><a href="/roles/{{ $role->id }}"> {{ $role->nome }} </a></li>
                @endforeach
            </ul>
         </li>
    </ul>
</div>
<h4> Equipamentos alocados nesta rede: </h4>

<table class="table">
  <thead>
    <tr>
      <th scope="col">MacAddress</th>
      <th scope="col">IP</th>
    </tr>
  </thead>
  <tbody>
  @foreach($rede->equipamentos as $equipamento)
    <tr>
      <th><a href="/equipamentos/{{ $equipamento->id }}"> {{ $equipamento->macaddress}}</a></th>
      <th>{{ $equipamento->ip}}</th>
    </tr>
    @endforeach
  </tdoby>
</table>

@stop


