@extends('layouts.app')

@section('template_title')
    Astro Crawler
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">日期</th>
            <th scope="col">星座</th>
            <th scope="col">整體運勢</th>
            <th scope="col">整體運勢解析</th>
            <th scope="col">愛情運勢指數</th>
            <th scope="col">愛情運勢解析</th>
            <th scope="col">事業運勢指數</th>
            <th scope="col">事業運勢解析</th>
            <th scope="col">財運運勢指數</th>
            <th scope="col">財運運勢解析</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td>{{$row['date']}}</td>
            <td>{{$row['name']}}</td>
            <td>{{$row['overall_score']}}</td>
            <td>{{$row['overall_description']}}</td>
            <td>{{$row['romance_score']}}</td>
            <td>{{$row['romance_description']}}</td>
            <td>{{$row['career_score']}}</td>
            <td>{{$row['career_description']}}</td>
            <td>{{$row['wealth_score']}}</td>
            <td>{{$row['wealth_description']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection