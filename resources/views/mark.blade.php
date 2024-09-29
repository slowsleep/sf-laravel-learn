@extends('layouts.app')

@section('content')
<table>
    <thead>
        <tr>
            <td>Предмет</td>
            <td>Оценка</td>
        </tr>
    </thead>
    <tbody>
        @foreach($marks as $mark)
            <tr>
                <td>{{ $mark['subject'] }}</td>
                <td>{{ $mark['mark'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
