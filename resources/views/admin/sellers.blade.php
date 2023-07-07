<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2>Sellers page</h2>
        </div>
        <div class="panel-body">
            <form method="POST" enctype="multipart/form-data" action="/sellers">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Product Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label>Product category</label>
                        <input type="text" name="category" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label>Product sub-category</label>
                        <input type="text" name="sub_category" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Product Discription</label>
                        <input type="text" name="discription" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Product Image</label>
                        <input type="file" name="gallery" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops! there are problems in uploading the image.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
<div>
    <a href="/home">Home</a>
</div>
