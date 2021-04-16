<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<style>
    .quiz{
        width: 25%;
        margin: 2%;
        display: inline-block;
    }
</style>
<div class="messages">
    @if ($errors->any())
        <div class="row  mt-3">
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 font-w400">Error!</h3>
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
@extends('layouts.app')

@section('content')
@foreach (['danger', 'warning', 'success', 'info'] as $key)
    @if(Session::has($key))
        <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
    @endif
@endforeach

@auth()
<a href="{{ route('statistic') }}" style="margin: 2%">statistic</a>
@endauth

@foreach($quizzes as $quiz)
    <div class="quiz">
        <form action="{{ route('quiz.store') }}" method="post">
            @csrf
            <div class="form-group">
                <img style="width: 300px; height: 200px" src='{{ $quiz->picture_path }}'>
            </div>

            <div class="form-group">
                <p>{{ $quiz->title }}</p>
            </div>

            <div class="form-group">
                <label for="cars">{{ $quiz->description }}:</label>
            </div>
            <div class="form-group">
                <p>@lang('creator: '){{ $quiz->creator }}</p>
            </div>

            <div class="form-group">
                @foreach($quiz->options as $option)
                    <label class="radio">
                        <input type="radio"
                                @if($option->quiz->multi_select)
                                    name="quiz[{{$option->id}}]" value="{{ $quiz->id }}"
                                @else
                                    name="quiz_one[{{ $quiz->id }}]" value="{{ $option->id }}"
                                @endif>
                        {{ $option->option }}
                        {{ round($option->getVotedOptionsCount($option, $quiz),2) }}%
                    </label>
                @endforeach
            </div>
            <button type="submit"> @lang('Submit') </button>
        </form>
    </div>
@endforeach
@endsection
