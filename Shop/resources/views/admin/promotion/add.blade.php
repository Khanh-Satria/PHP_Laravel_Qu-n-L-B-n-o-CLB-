@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Advertising program</label>
                <input type="text" name="name" class="form-control"  placeholder="Enter the program name">
            </div>

            <div class="form-group">
                <label for="menu">Discount</label>
                <input type="number" name="number" class="form-control"  placeholder="Enter discount number">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create a discount</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
