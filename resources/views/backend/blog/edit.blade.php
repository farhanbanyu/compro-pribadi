<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Edit Artikel</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Artikel</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Edit Artikel</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ url('blog/update') }}" class="_form" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="form-group ">
                            <label>Kategori</label>
                            <select name="category_id" class="form-control" >
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}" @selected($category->id == $item->category_id)>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" required
                                value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="overview">Preview Deskripsi</label>
                            <textarea name="overview" id="overview" class="form-control summernote" required>{{ $item->overview }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control summernote" required>{{ $item->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <textarea name="tags" class="form-control summernote" required>{{ $item->tags }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta Deskripsi</label>
                            <textarea name="meta_description" class="form-control summernote" required>{{ $item->meta_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control summernote" required>{{ $item->meta_keyword }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" name="photo" class="form-control">
                            <img src="{{ asset($item->photo) }}" alt="" width="100" style="width: 100px;">
                        </div>
                        <div class="form-group">
                            <label>Jadwal Posting</label>
                            <input type="datetime-local" name="date" class="form-control" required
                                value="{{ $item->date }}">
                        </div>
                        <div class="form-group">
                            <label class="fancy-checkbox">
                                <input type="checkbox" {{ $item->visible == 'yes' ? 'checked' : '' }} name="visible"
                                    data-parsley-errors-container="#error-checkbox">
                                <span>Publish ?</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/summernote/dist/summernote.css') }}" />
        <script src="{{ asset('backend/assets/vendor/summernote/dist/summernote.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/system/crud/post.js') }}"></script>
    </x-slot>
</x-backend.layouts>
