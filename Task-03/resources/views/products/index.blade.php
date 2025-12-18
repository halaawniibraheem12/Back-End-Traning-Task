<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 40px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.1);
            border: 1px solid #e0e0e0;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        h1 {
            color: #5a4fcf;
            margin: 0;
            font-size: 26px;
        }
        
        .btn-add {
            background: #667eea;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th {
            background: #f8f9fa;
            color: #5a4fcf;
            padding: 14px;
            text-align: left;
            border-bottom: 2px solid #667eea;
        }
        
        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            color: #333;
        }
        
        tr:hover {
            background-color: rgba(102, 126, 234, 0.05);
        }
        
        .price {
            color: #667eea;
            font-weight: 500;
        }
        
        .btn-action {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            margin-right: 5px;
            border: none;
            cursor: pointer;
        }
        
        .btn-view {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }
        
        .btn-edit {
            background: rgba(118, 75, 162, 0.1);
            color: #764ba2;
        }
        
        .btn-delete {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        
        .success {
            background: rgba(40, 167, 69, 0.1);
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
        }
        
        .no-products {
            text-align: center;
            padding: 40px;
            color: #888;
        }
        
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #888;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-boxes" style="color: #667eea;"></i> Product Management</h1>
            <a href="{{ route('products.create') }}" class="btn-add"><i class="fas fa-plus"></i> Add Product</a>
        </div>
        
        @if(session('success'))
        <div class="success"><i class="fas fa-check"></i> {{ session('success') }}</div>
        @endif
        
        @if($products->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td class="price">${{ number_format($product->price, 2) }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn-action btn-view"><i class="fas fa-eye"></i> View</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn-action btn-edit"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this product?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="footer">
            <p><i class="fas fa-database"></i> Total: {{ $products->count() }} products</p>
        </div>
        @else
        <div class="no-products">
            <i class="fas fa-box-open" style="font-size: 40px; color: #ccc;"></i>
            <h3>No products found</h3>
            <a href="{{ route('products.create') }}" class="btn-add">Add First Product</a>
        </div>
        @endif
    </div>
</body>
</html>