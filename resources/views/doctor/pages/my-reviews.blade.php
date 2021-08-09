@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('patient.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Reviews</li>
        </ol>

        <div class="box_general">
            <div class="header_box">
                <h2 class="d-inline-block">Reviews</h2>
            </div>
            <div class="list_general reviews">
                <ul>
                    @foreach($comments as $comment)
                    <li>
                        {{-- <span>{{ Carbon\Carbon::parse($comment->user->created_at)->toDateString()}}</span> --}}
                        <span class="rating">
                            @for ($i = 0; $i < $comment->rate; $i++) <i class="fa fa-star" style="color:#ffc106"></i>
                                @endfor
                        </span>
                        {{-- <figure><img src="{{ url('/assets/attachments/users') }}/{{ $comment->user->image }}" alt=""></figure> --}}
                        {{-- <h4>{{$comment->user->first_name}} {{$comment->user->last_name}}</h4> --}}
                        <p>{{ $comment->review}} </p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <nav aria-label="...">
            {{-- {{ $comments->render() }} --}}
        </nav>
    </div>
</div>
@endsection

@section('css')

<style>
    .col-sm-9 {
        color: #333;
    }

    .booking_buttton {
        border-radius: 35px;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 3vw;
        color: #FFD600;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }

    .center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .glyphicon {
        margin-right: 5px;
    }

    .rating .glyphicon {
        font-size: 22px;
    }

    .rating-num {
        margin-top: 0px;
        font-size: 54px;
    }

    .progress {
        margin-bottom: 5px;
    }

    .progress-bar {
        text-align: left;
    }

    .rating-desc .col-md-3 {
        padding-right: 0px;
    }

    .sr-only {
        margin-left: 5px;
        overflow: visible;
        clip: auto;
    }

    .progress-bar {
        background-color: yellow;
        color: black;
    }

</style>

@endsection

