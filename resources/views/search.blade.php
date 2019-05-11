@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-dark float-left" href="{{ url('/home') }}">
                    <b>Go Back</b>
                </a>
            </div>
            &nbsp
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">

                        <div class="card-body">

                            <div class="card-deck">
                                @forelse($questions as $question)
                                    <div class="col-sm-6 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Updated: {{ $question->created_at->diffForHumans() }},
                                                    Answers: {{ $question->answers()->count() }}
                                                    <br>
                                                    @if (\App\Profile::find ($question->user_id))
                                                        Posted by: {{ \App\Profile::find ($question->user_id)->fname }}
                                                    @else
                                                        Posted by: {{ \App\User::find($question->user_id)->email }}
                                                    @endif

                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$question->body}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">

                                                    <a class="btn btn-primary float-right" href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                        View
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    There are no questions to view, please type in your question before searching.
                                @endforelse

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection