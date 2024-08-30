<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}'s Profile</title>
    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .navbar-nav .nav-link { color: #fff !important; }
        .navbar-nav .nav-link:hover { color: #ddd !important; }
        .card { border-radius: 10px; overflow: hidden; }
        .card-body { padding: 20px; }
        .btn-primary { background-color: #003d6a; border-color: #003d6a; }
        .btn-primary:hover { background-color: #002a47; border-color: #002a47; }
        .btn-secondary { background-color: #003d6a; border-color: #003d6a; }
        .btn-secondary:hover { background-color: #002a47; border-color: #002a47; }
        .form-label { font-weight: bold; }
        .form-control { margin-bottom: 10px; }
        .editable { cursor: pointer; color: #003d6a; text-decoration: underline; }
        .editable:hover { color: #002a47; }
        .hidden { display: none; }
        .avatar-img { width: 100px; height: 100px; object-fit: cover; border-radius: 50%; }
        .avatar-img-small { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; }
        .btn-follow { background-color: #003d6a; color: #fff; border: none; padding: 5px 10px; border-radius: 5px; }
        .btn-follow:hover { background-color: #002a47; }
        .icon-text { display: flex; align-items: center; gap: 5px; }
        .icon-text i { font-size: 1.2rem; color: #003d6a; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark sticky-top" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"></span>Mouzika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome, {{ $user->name }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card overflow-hidden mb-3">
                    <div class="card-body pt-3">
                        <form class="mb-3" role="search">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Notifications</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Messages</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body d-flex align-items-center">
                        <!-- Profile Picture -->
                        <img id="profileImage" class="avatar-img me-3" src="{{ $user->getImageUrl() }}" alt="{{ $user->name }} Avatar" onclick="document.getElementById('pictureInput').click();">
                        <form id="profilePicForm" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" id="pictureInput" name="image" class="form-control hidden" onchange="document.getElementById('profilePicForm').submit();">
                        </form>
                        <div>
                            <h3 class="card-title mb-0">{{ $user->name }}</h3>
                            <span class="fs-6 text-muted">{{ $user->email }}</span>
                            <p class="fs-6 fw-light">{{ $user->bio ?? 'This user has not provided a bio.' }}</p>
                            <div class="d-flex gap-3 mb-3">
                                <div class="icon-text">
                                    <i class="fas fa-users"></i>
                                    <span>{{ $user->followers_count }} Followers</span>
                                </div>
                                <div class="icon-text">
                                    <i class="fas fa-pencil-alt"></i>
                                    <span>{{ $user->posts_count }} Posts</span>
                                </div>
                            </div>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary ms-3">Edit Profile</a>
                        </div>
                    </div>
                </div>

                <!-- User Posts -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Write a Post</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Write a post here..."></textarea>
                        </div>
                        <button class="btn btn-primary btn-sm">Post</button>
                    </div>
                </div>

                <!-- Sample Post -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <img class="avatar-img-small me-2" src="{{ $user->getImageUrl() }}" alt="Post Author Avatar">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">{{ $user->name }}</h6>
                                    <small class="text-muted">2 hours ago</small>
                                </div>
                                <p class="fs-6 mt-2">Sample post content here.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- No videos and playlists available sections -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Videos</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">No videos available.</p>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Playlist</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">No playlists available.</p>
                    </div>
                </div>
            </div>

            <!-- Who to Follow -->
            <div class="col-md-3">
                <div class="card overflow-hidden mb-3">
                    <div class="card-body pt-3">
                        <h5 class="mb-3">Who to Follow</h5>
                        @forelse ($usersToFollow as $userToFollow)
                            <div class="hstack gap-2 mb-3">
                                <div class="avatar">
                                    <a href="#"><img class="avatar-img-small rounded-circle" src="{{ $userToFollow->getImageUrl() }}" alt="{{ $userToFollow->name }} Avatar"></a>
                                </div>
                                <div class="overflow-hidden">
                                    <a class="h6 mb-0" href="#">{{ $userToFollow->name }}</a>
                                    <p class="mb-0 small text-truncate">{{ $userToFollow->user_type }}</p>
                                    @if(auth()->user()->isFollowing($userToFollow->id))
                                        <form method="POST" action="{{ route('users.unfollow', $userToFollow->id) }}">
                                            @csrf
                                            <button type="submit" class="btn-follow">Unfollow</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('users.follow', $userToFollow->id) }}">
                                            @csrf
                                            <button type="submit" class="btn-follow">Follow</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p>No users to follow.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
