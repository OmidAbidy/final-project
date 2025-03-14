<center>
    <h1><i class="fas fa-tasks" style="color:rgb(89, 196, 176); font-size: 40px; margin-right: 15px;"></i> Projects</h1>
</center>
<br>
<div class="container my-5">
    <div class="row">
        @php
            $projects = [
                ['title' => 'Automation', 'desc' => 'Automation Project', 'image' => 'images/a1.jfif'],
                ['title' => 'Web Development', 'desc' => 'A Simple Web Development project', 'image' => 'images/a2.jfif'],
                ['title' => 'Cyber Security', 'desc' => 'Some of the Top Cyber Security Jobs', 'image' => 'images/a3.jfif'],
                ['title' => 'Software Engineer', 'desc' => 'Computer Science Test', 'image' => 'images/a4.jfif'],
                ['title' => 'IT', 'desc' => 'Computer Science Test', 'image' => 'images/a5.jfif'],
                ['title' => 'Information System', 'desc' => 'Computer Science Test', 'image' => 'images/a6.jfif'],
                ['title' => 'Database Administration', 'desc' => 'Computer Science Test', 'image' => 'images/A7.jpg'],
                ['title' => 'Office', 'desc' => 'Computer Science Test', 'image' => 'images/A8.webp'],
            ];
        @endphp

        @foreach($projects as $project)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project['title'] }}</h5>
                        <p class="card-text">{{ $project['desc'] }}</p>
                    </div>
                    <img src="{{ asset($project['image']) }}" class="card-img-top" alt="Project Image">
                </div>
            </div>
        @endforeach
    </div>
</div>
