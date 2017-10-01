@extends('layouts.app')

@section('content')
    
<div class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">My Tasks</p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                            <span class="icon">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <tasks></tasks>
                        </div>
                    </div>
                    {{-- <footer class="card-footer ">
                        <a href="#" class="card-footer-item">dcyar - fullstack web development</a>
                    </footer> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
