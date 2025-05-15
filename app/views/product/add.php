<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm</title>
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
                        <a class="nav-link" href="/project1/Product/list">Danh sách sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/project1/Product/add">Thêm sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Thêm sản phẩm mới</h1>
        </div>
        
        <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="POST" action="/project1/Product/add" onsubmit="return validateForm();" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="form-text">Tên sản phẩm phải có từ 10 đến 100 ký tự</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                            <span class="input-group-text">đ</span>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/project1/Product/list" class="btn btn-light me-md-2">
                            <i class="bi bi-arrow-left"></i> Quay lại
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i> Thêm sản phẩm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="mt-5 py-3 bg-light text-center">
        <div class="container">
            <p class="mb-0">Ứng dụng quản lý sản phẩm &copy; <?php echo date('Y'); ?></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function validateForm() {
        let name = document.getElementById('name').value;
        let price = document.getElementById('price').value;
        let errors = [];
        
        if (name.length < 10 || name.length > 100) {
            errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
        }
        
        if (price <= 0 || isNaN(price)) {
            errors.push('Giá phải là một số dương lớn hơn 0.');
        }
        
        if (errors.length > 0) {
            alert(errors.join('\n'));
            return false;
        }
        
        return true;
    }
    </script>
</body>
</html>