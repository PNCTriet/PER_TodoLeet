@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="margin-top: 40px; margin-bottom: 40px;">
            {{-- <h1 align="center">LeetCode Stats ✨</h1>
            <p align="center">
                <a href="[https://github.com/KnlnKS/leetcode-stats](https://leetcode.com/trietnguyenpham/)">
                    <img alt="LeetCode Stat Card"
                        src="https://leetcode-stats-six.vercel.app/?username=trietnguyenpham&theme=dark" width="400" />
                </a>
            </p> --}}

            <h1 align="center">LeetCode Stats ✨</h1>
            <div align="center">
                <input type="text"  class="form-control mb-2 w-100" id="username" required>
                <button class = "btn  btn-primary btn-block mb-3" onclick="updateStats()">check it out</button>
            </div>
            <div class="stats-list-item" align="center" id="statsContainer">
            </div>
           

            {{-- <script>
                function updateStats() {
                    const username = document.getElementById('username').value;
                    const statsContainer = document.getElementById('statsContainer');
                    const leetCodeStatsUrl = `https://leetcode-stats-six.vercel.app/?username=${username}&theme=dark`;
                    const leetCodeStatshref = `https://leetcode.com/${username}/`;
                    // Clear previous stats
                    statsContainer.innerHTML = '';

                    // Create img element
                    const img = document.createElement('img');
                    img.src = leetCodeStatsUrl;
                    img.alt = 'LeetCode Stat Card';
                    img.width = '600';
                    statshere.href = leetCodeStatshref;

                    // Append img element to statsContainer
                    statsContainer.appendChild(img);
                }
            </script> --}}

            <script>
                function updateStats() {
                    const username = document.getElementById('username').value;
                    const statsContainer = document.getElementById('statsContainer');
                    const leetCodeStatsUrl = `https://leetcode-stats-six.vercel.app/?username=${username}&theme=dark`;
                    const leetCodeStatshref = `https://leetcode.com/${username}/`;
                    // Clear previous stats
                    statsContainer.innerHTML = '';
            
                    // Create a tag
                    const aTag = document.createElement('a');
                    aTag.href = leetCodeStatshref;
                    aTag.target = '_blank'; // Open link in a new tab
                    
            
                    // Create img element
                    const img = document.createElement('img');
                    img.src = leetCodeStatsUrl;
                    img.alt = 'LeetCode Stat Card';
                    img.width = '600';
                    img.classList.add('stats-list-item'); // Thêm class cho hình ảnh

            
                    // Append img element to a tag
                    aTag.appendChild(img);
            
                    // Append a tag to statsContainer
                    statsContainer.appendChild(aTag);
                }
            </script>

            <br>
            <h1>Task List</h1>
            @foreach ($tasks as $task)
                <div class="card @if ($task->isCompleted()) border-success @endif" style="margin-bottom: 20px;">
                    <div class="card-body">
                        <p>
                            {{ $task->description }}
                        </p>

                        @if (!$task->isCompleted())
                            <form action="/tasks/{{ $task->id }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <button class="btn  btn-primary btn-block" input="submit">Complete</button>
                            </form>
                        @else
                            <form action="/tasks/{{ $task->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-block" input="submit">Delete</button>
                            </form>
                        @endif
                        <br>
                        <!-- Thêm đồng hồ đếm thời gian -->
                        <small class="text-muted ">Created {{ $task->created_at->diffForHumans() }}</small>
                        <div id="clock"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container">
            <a href="/tasks/create" class="btn btn-primary btn-lg btn-block d-grid">New Task</a>
        </div>
        <script src="resources/js/clock.js"></script>

    </div>
@endsection
