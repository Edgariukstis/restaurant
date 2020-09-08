@extends('layouts.app')
@section('content')
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Kaina Eur</th>
            <th>Porcijos svoris g</th>
            <th>Mėsos kiekis porcijoje g</th>
            <th>Aprašymas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($menus as $menu)
        <tr>
            <td>{{ $menu->title }}</td>
            <td>{{ $menu->price }}</td>
            <td>{{ $menu->weight }}</td>
            <td>{{ $menu->meat }}</td>
            <td>{!! $menu->about !!}</td>
            <td>
                <form action={{ route('menus.destroy', $menu->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('menus.edit', $menu->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('menus.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection