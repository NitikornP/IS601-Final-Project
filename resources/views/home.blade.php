@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="container align-content-xl-between">
                <div class="float-left">
                    <form class="form-inline my-2 my-lg-0 role="form id="search-form" class="search-form" method="get" action="{{ url('/home/search') }}">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="name" placeholder="search for questions">
                        </div>
                        &nbsp
                        <div>
                            <button class="btn btn-outline-success" type="submit" id="search-form">Search</button>
                        </div>
                    </form>
                </div>
                <div>
                    <a class="btn btn-outline-primary float-right" href="{{ route('questions.create') }}">
                        Create a Question
                    </a>
                </div>
{{--                <div>--}}
{{--                    <a class="btn btn-outline-primary infofloat-right" style="margin:5px" href="{{ url('/home/find') }}">--}}
{{--                        My Questions--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>

            <div class="col-md-12"><br>
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="card-deck">
                                @forelse($questions as $question)
                                    <div class="col-sm-6 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header" style="background-color:midnightblue">
                                                <h5>
                                                <small class="text-white">
                                                    Updated: {{ $question->created_at->diffForHumans() }},
                                                    Answers: {{ $question->answers()->count() }}
                                                    <br>
                                                    @if (\App\Profile::find ($question->user_id))
                                                        Posted by: {{ \App\Profile::find ($question->user_id)->fname }}
                                                    @else
                                                        Posted by: {{ \App\User::find($question->user_id)->email }}
                                                    @endif
                                                        <a class="btn btn-outline-info float-right"
                                                           href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                            View
                                                        </a>
                                                </small>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$question->body}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    There are no questions to view, you can  create a question.
                                @endforelse
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $questions->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
