<x-app-layout>
    <x-slot name="header">
        <div class="container-fluid">
            <div class="border border-3 my-5 bg-white rounded-3">
                <h2 class="text-center float-center mt-1 fw-bold">{{ __('My reports') }}<i class="fas fa-file float-end mx-3 mt-1"></i></h2>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-list-list" data-toggle="list" href="#list-list" role="tab" aria-controls="list">List</a>
                            <a class="list-group-item list-group-item-action" id="list-generate-list" data-toggle="list" href="#list-generate" role="tab" aria-controls="generate">Generate</a>
                            <a class="list-group-item list-group-item-action" id="list-import-list" data-toggle="list" href="#list-import" role="tab" aria-controls="import">Import</a>
                            <a class="list-group-item list-group-item-action" id="list-export-list" data-toggle="list" href="#list-export" role="tab" aria-controls="export">Export</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-list" role="tabpanel" aria-labelledby="list-list-list">
                                <div class="row justify-content-center align-items-center">
                                    @foreach($files as $file)
                                    <div class="col-4 text-center">
                                        <a href=""></a><i class="fas fa-file-alt fa-8x"></i></a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="border border-2 mt-5 py-2 rounded">
                                    <form action="{{ route('members_importReport') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="vstack gap-2 col-md-5 mx-auto">
                                            <div class="form-group mb-4">
                                                <div class="custom-file text-left">
                                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose a report</label>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-dark">Import</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-generate" role="tabpanel" aria-labelledby="list-generate-list">
                                <form action="{{ route('members_generateReport') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="container row d-flex justify-content-center align-items-center">
                                        <div class="col-12">
                                            <p class="text-center">
                                                <button class="btn btn-block btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseScore1" aria-expanded="false" aria-controls="collapseScore1">
                                                    Generate a score 1 moisturizing graph
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseScore1">
                                                <div class="card card-body">
                                                    <div class="form-group mb-4">
                                                        <label for="title1" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title1" name="title1">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <select class="form-select" aria-label="Default select example" name="graph1">
                                                            <option disabled selected value>Select one graph</option>
                                                            <option value="1">Line</option>
                                                            <option value="2">Point</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="comment1" class="form-label">Write a comment</label>
                                                        <textarea class="form-control" name="comment1" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-center">
                                                <button class="btn btn-block btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseScore2" aria-expanded="false" aria-controls="collapseScore2">
                                                    Generate a score 2 antioxidant
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseScore2">
                                                <div class="card card-body">
                                                    <div class="form-group mb-4">
                                                        <label for="title2" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title2" name="title2">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <select class="form-select" aria-label="Default select example" name="graph2">
                                                            <option disabled selected value>Select one graph</option>
                                                            <option value="1">Line</option>
                                                            <option value="2">Point</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="comment1" class="form-label">Write a comment</label>
                                                        <textarea class="form-control" name="comment2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-center">
                                                <button class="btn btn-block btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseScore3" aria-expanded="false" aria-controls="collapseScore3">
                                                    Generate a score 3 skin fence
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseScore3">
                                                <div class="card card-body">
                                                    <div class="form-group mb-4">
                                                        <label for="title3" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title3" name="title3">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <select class="form-select" aria-label="Default select example" name="graph3">
                                                            <option disabled selected value>Select one graph</option>
                                                            <option value="1">Line</option>
                                                            <option value="2">Point</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="comment1" class="form-label">Write a comment</label>
                                                        <textarea class="form-control" name="comment3" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-center">
                                                <button class="btn btn-block btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseScore4" aria-expanded="false" aria-controls="collapseScore4">
                                                    Generate a score 4 untreated skin
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseScore4">
                                                <div class="card card-body">
                                                    <div class="form-group mb-4">
                                                        <label for="title4" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title4" name="title4">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <select class="form-select" aria-label="Default select example" name="graph4">
                                                            <option disabled selected value>Select one graph</option>
                                                            <option value="1">Line</option>
                                                            <option value="2">Point</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-dark" type="submit">Generate</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="list-import" role="tabpanel" aria-labelledby="list-import-list">
                                <form action="{{ route('members_importFile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="vstack gap-2 col-md-5 mx-auto">
                                        <div class="form-group mb-4">
                                            <div class="custom-file text-left">
                                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose a csv file</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-dark">Import</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="list-export" role="tabpanel" aria-labelledby="list-export-list">
                                <a class="btn btn-dark" href="{{ route('members_exportReport') }}">Export</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>