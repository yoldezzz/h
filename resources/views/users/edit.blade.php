<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypD/RIlfNBGFS59G8H28cK3ZpjAIh6tmjNGM0wz5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .navbar-nav .nav-link { color: #fff !important; }
        .navbar-nav .nav-link:hover { color: #ddd !important; }
        .card { border-radius: 10px; overflow: hidden; }
        .card-body { padding: 20px; }
        .btn-primary { background-color: #007bff; border-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; border-color: #004085; }
        .form-label { font-weight: bold; }
        .form-control { margin-bottom: 10px; }
        .editable { cursor: pointer; color: #007bff; text-decoration: underline; }
        .editable:hover { color: #0056b3; }
        .hidden { display: none; }
        .avatar-img { width: 100px; height: 100px; object-fit: cover; border-radius: 50%; cursor: pointer; }
        .avatar-img-small { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; }
        .btn-follow { background-color: #007bff; color: #fff; border: none; padding: 5px 10px; border-radius: 5px; }
        .btn-follow:hover { background-color: #0056b3; }
        .icon-text { display: flex; align-items: center; gap: 5px; }
        .icon-text i { font-size: 1.2rem; color: #007bff; }
        .search-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            background: #f8f9fa;
        }
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
            <div class="col-md-3">
                <div class="card overflow-hidden mb-3">
                    <div class="card-body pt-3">
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Notifications</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Messages</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="editForm" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Profile Picture Upload -->
                            <div class="d-flex align-items-center mb-4">
                                <img id="image" class="avatar-img me-3" src="{{ $user->getImageUrl() }}" alt="{{ $user->name }} Avatar" onclick="document.getElementById('imageInput').click();">
                                <input type="file" id="imageInput" name="image" class="form-control hidden" onchange="previewImage()">
                            </div>

                            <!-- User Name -->
                            <div class="mb-4">
                                <h3 id="userName" class="card-title mb-0 editable" onclick="enableEditName()">{{ $user->name }}</h3>
                                <input type="text" id="nameInput" name="name" class="form-control hidden" value="{{ old('name', $user->name) }}">
                            </div>

                            <!-- Bio -->
                            <div class="mb-4">
                                <h5>About:</h5>
                                <p id="userBio" class="fs-6 fw-light editable" onclick="enableEditBio()">{{ $user->bio ?? 'This user has not provided a bio.' }}</p>
                                <textarea id="bioInput" name="bio" class="form-control hidden">{{ old('bio', $user->bio) }}</textarea>
                            </div>

                            <!-- Save Button -->
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>

                <!-- Posts Section -->
                <hr>
                <div class="mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Write a Post</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <textarea class="form-control" rows="3" placeholder="Write a post here..."></textarea>
                            </div>
                            <button class="btn btn-primary btn-sm">Post</button>
                            <hr>
                            <div class="d-flex align-items-start mt-3">
                                <img class="avatar-img-small me-2" src="https://via.placeholder.com/50?text=Author" alt="Post Author Avatar">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">Post Author</h6>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                    <p class="fs-6 mt-2">Sample post content here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Videos</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">No videos available.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Playlist</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">No playlists available.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card overflow-hidden mb-3">
                    <div class="card-body pt-3">
                        <div class="search-box">
                            <h5 class="mb-3">Search by Category</h5>
                            <form role="search">
                                <input class="form-control" type="search" placeholder="Search by category" aria-label="Search">
                                <select class="form-select mt-2">
                                    <option value="" disabled selected>Select category</option>
                                    <option value="jazz">Jazz</option>
                                    <option value="classic">Classic</option>
                                    <!-- Add more categories as needed -->
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        function enableEditName() {
            document.getElementById('userName').classList.add('hidden');
            document.getElementById('nameInput').classList.remove('hidden');
            document.getElementById('nameInput').focus();
        }

        function enableEditBio() {
            document.getElementById('userBio').classList.add('hidden');
            document.getElementById('bioInput').classList.remove('hidden');
            document.getElementById('bioInput').focus();
        }

        function previewImage() {
            const fileInput = document.getElementById('imageInput');
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                document.getElementById('image').src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>

