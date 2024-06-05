<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Chi tiết sản phẩm</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Category Name</td>
                <td>Name</td>
                <td>Image</td>
                <td>Price</td>
                <td>created_at</td>
                <td>updated_at</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['c_name'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><img src="{{ asset($pro['img_thumbnail']) }}" alt=""  width="100px"></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['overview'] ?></td>
                    <td><?= $product['content'] ?></td>
                    <td><?= $product['created_at'] ?></td>
                    <td><?= $product['updated_at'] ?></td>
                    <td>
                        <a href="{{ url("admin/products/") }}" class="btn btn-info">Danh sách</a>
                    </td>
                </tr>
        </tbody>
    </table>
</body>

</html>