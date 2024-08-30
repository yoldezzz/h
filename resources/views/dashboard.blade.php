@extends('layout.layout')

@section('content')
    @include('layout.nav')

    <div class="container py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card overflow-hidden">
                    <div class="card-body pt-3">
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Explore</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Feed</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Terms</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Support</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-6">
                <!-- Success Alert -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Feed Card -->
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                            <div>
                                <h5 class="card-title mb-0"><a href="#">Mario</a></h5>
                            </div>
                        </div>
                        <p class="fs-6 fw-light text-muted">
                            Comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
                            of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of
                            ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum
                            dolor sit amet..", comes from a line in section 1.10.32.
                        </p>
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1"></span> 100 </a>
                            </div>
                            <div>
                                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"></span> 3-5-2023 </span>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <textarea class="fs-6 form-control" rows="1" placeholder="Write a comment..."></textarea>
                            </div>
                            <button class="btn btn-primary btn-sm">Post Comment</button>

                            <hr>
                            <div class="d-flex align-items-start mt-3">
                                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="">Luigi</h6>
                                        <small class="fs-6 fw-light text-muted">3 hours ago</small>
                                    </div>
                                    <p class="fs-6 mt-3 fw-light">
                                        and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                                        Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                                        very popular during the Renaissance.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-md-3">
                <!-- Search Card -->
                <div class="card mb-3">
                    <div class="card-header pb-0 border-0">
                        <h5 class="">Search</h5>
                    </div>
                    <div class="card-body">
                        <input placeholder="Search..." class="form-control w-100" type="text" id="search">
                        <button class="btn btn-dark mt-2 w-100">Search</button>
                    </div>
                </div>

                <!-- Who to Follow Card -->
                <div class="card">
                    <div class="card-header pb-0 border-0">
                        <h5 class="">Who to follow</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-2 mb-3">
                            <div class="avatar">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                            </div>
                            <div class="overflow-hidden">
                                <a class="h6 mb-0" href="#!">Mario Brother</a>
                                <p class="mb-0 small text-truncate">@Mario</p>
                            </div>
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                        <div class="hstack gap-2 mb-3">
                            <div class="avatar">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                            </div>
                            <div class="overflow-hidden">
                                <a class="h6 mb-0" href="#!">Mario Brother</a>
                                <p class="mb-0 small text-truncate">@Mario</p>
                            </div>
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                        <div class="d-grid mt-3">
                            <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
