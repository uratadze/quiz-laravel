@extends('layouts.app')

@section('content')
<p>@lang('ჯამში გაცემული კითხვათა რაოდენობა'): {{ $voteSum }}</p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">@lang('კითხვა')</th>
        <th scope="col">@lang('პასუხი')</th>
        <th scope="col">@lang('გაცემული პასუხების რაოდენობა')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($statistics->get() as $statistic)
        <tr>
            <th scope="row">{{$statistic->option_id }}</th>
            <td>{{ $statistic->quizOptions->quiz->title }}</td>
            <td>{{ $statistic->quizOptions->option }}</td>
            <td>{{ $votes->getVoteCount($statistic->option_id) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
