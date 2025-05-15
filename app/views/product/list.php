<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sản phẩm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/project1">Quản lý sản phẩm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/project1/Product/list">Danh sách sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/project1/Product/add">Thêm sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Danh sách sản phẩm</h1>
            <a href="/project1/Product/add" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Thêm sản phẩm mới
            </a>
        </div>

        <?php if (empty($products)): ?>
            <div class="alert alert-info">
                Chưa có sản phẩm nào. Hãy thêm sản phẩm mới!
            </div>
        <?php else: ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($products as $product): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="card-text">
                                <span class="badge bg-info text-dark">
                                    Giá: <?php echo number_format($product->getPrice(), 0, ',', '.'); ?> đ
                                </span>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <div class="d-flex justify-content-between">
                                <a href="/project1/Product/edit/<?php echo $product->getID(); ?>" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil"></i> Sửa
                                </a>
                                <a href="/project1/Product/delete/<?php echo $product->getID(); ?>" 
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" 
                                   class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <footer class="mt-5 py-3 bg-light text-center">
        <div class="container">
            <p class="mb-0">Ứng dụng quản lý sản phẩm &copy; <?php echo date('Y'); ?></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>