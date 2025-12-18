<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 40px;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.1);
            border: 1px solid #e0e0e0;
        }
        
        h1 {
            color: #5a4fcf;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        input:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-secondary {
            background: #888;
            color: white;
        }
        
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        
        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-plus" style="color: #667eea;"></i> Add New Product</h1>
        
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Product Name *</label>
                <input type="text" name="name" required>
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Price ($) *</label>
                <input type="number" name="price" step="0.01" min="0" required>
                @error('price')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Save Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>