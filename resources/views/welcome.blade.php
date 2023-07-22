@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <main class="container my-4">

        <!-- News Cards -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Sample News Card 1 -->
            <div class="col">
                <div class="card">
                    <img src="https://via.placeholder.com/400" class="card-img-top" alt="News Image">
                    <div class="card-body">
                        <h5 class="card-title">News Headline 1</h5>
                        <p class="card-text">A short description of the news article.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Sample News Card 2 -->
            <div class="col">
                <div class="card">
                    <img src="https://via.placeholder.com/400" class="card-img-top" alt="News Image">
                    <div class="card-body">
                        <h5 class="card-title">News Headline 2</h5>
                        <p class="card-text">A short description of the news article.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 News Website. All rights reserved.</p>
    </footer>
@endsection
