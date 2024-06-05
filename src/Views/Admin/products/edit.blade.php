<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    @if (!empty($_SESSION['errors']))
        <div class="alert alert-warning">
            <ul>
                @foreach ($_SESSION['errors'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @php
            unset($_SESSION['errors']);
        @endphp
    @endif


    @if (!empty($_SESSION['status'])  && $_SESSION['status'])
        <div class="alert alert-warning">
            {{ $_SESSION['msg'] }}
        </div>
        @php
            unset($_SESSION['status']);
            unset($_SESSION['msg']);
        @endphp
        
    @endif
    
    <form action="{{ url("admin/products/{$product['id']}/update") }}" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="category_id" class="form-label">Category:</label>

                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($categoryPluck as $id => $name)
                                <option 
                                    @if ( $product['category_id'] == $id)  
                                        selected
                                    @endif 
                                    value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $product['name'] }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="img_thumbnail" class="form-label">Img Thumbnail:</label>
                    <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img_thumbnail"
                        name="img_thumbnail">
                    <img src="{{ asset($product['img_thumbnail']) }}" alt="">
                </div>
                <div class="mb-3 mt-3">
                    <label for="img_thumbnail" class="form-label">Price :</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter price "
                        name="price" value="{{ $product['price'] }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="overview" class="form-label">Overview:</label>
                    <textarea class="form-control" id="overview" placeholder="Enter overview"
                        name="overview" value="">{{ $product['overview'] }}</textarea>
                </div>

                <div class="mb-3 mt-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea class="form-control" id="content" rows="7" placeholder="Enter content"
                        name="content" value="">{{ $product['content'] }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-5">Submit</button>
        <a href="{{ url('admin/products/')}}" class="btn btn-primary mt-5">Danh sách</a>
    </form>
</body>

</html>