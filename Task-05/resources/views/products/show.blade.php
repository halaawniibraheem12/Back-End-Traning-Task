<!DOCTYPE html>
<html>
<head>
    <title>View Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 40px;
        }
        
        .container {
            max-width: 600px;
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
        
        .product-card {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 25px;
        }
        
        .info-row {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .label {
            font-weight: bold;
            color: #555;
            width: 120px;
            display: inline-block;
        }
        
        .value {
            color: #333;
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
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-eye" style="color: #667eea;"></i> Product Details</h1>
        
        <div class="product-card">
            <div class="info-row">
                <span class="label">Product ID:</span>
                <span class="value">#{{ $product->id }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Name:</span>
                <span class="value">{{ $product->name }}</span>
            </div>

            <div class="info-row">
                <span class="label">Category:</span>
                <span class="value">{{ $product->category?->name }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Price:</span>
                <span class="value">${{ number_format($product->price, 2) }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Created:</span>
                <span class="value">{{ $product->created_at->format('Y-m-d') }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Updated:</span>
                <span class="value">{{ $product->updated_at->format('Y-m-d') }}</span>
            </div>
        </div>
        
        <div class="btn-group">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit Product</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>