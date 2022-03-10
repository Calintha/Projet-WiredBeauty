<x-app-layout>
    <x-slot name="header">
        <div class="container-fluid">
            <div class="border border-3 my-5 bg-white rounded-3">
                <h2 class="text-center float-center mt-1 fw-bold">{{ __('My reports') }}<i class="fas fa-home float-end mx-3 mt-1"></i></h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-list-list" data-toggle="list" href="#list-list" role="tab" aria-controls="list">Liste</a>
                        <a class="list-group-item list-group-item-action" id="list-import-list" data-toggle="list" href="#list-import" role="tab" aria-controls="import">Import</a>
                        <a class="list-group-item list-group-item-action" id="list-export-list" data-toggle="list" href="#list-export" role="tab" aria-controls="export">Export</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-list" role="tabpanel" aria-labelledby="list-list-list">
                            list
                        </div>
                        <div class="tab-pane fade" id="list-import" role="tabpanel" aria-labelledby="list-import-list">
                            <form action="{{ route('members_importReport') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                    <div class="custom-file text-left">
                                        <input type="file" name="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choisir un fichier</label>
                                    </div>
                                </div>
                                <div class="
                                <button class="btn btn-primary">Importer</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="list-export" role="tabpanel" aria-labelledby="list-export-list">
                            <a class="btn btn-success" href="{{ route('members_exportReport') }}">Export data</a>
                            <a class="btn btn-success" href="{{ route('members_generateReport') }}">Generer</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>