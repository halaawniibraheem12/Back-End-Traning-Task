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
            max-width: 700px;
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

        h3 {
            margin-top: 30px;
            color: #444;
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

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .supplier-box {
            border: 1px solid #eee;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            background: #fafafa;
        }

        .supplier-fields {
            margin-top: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
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
    <h1>Add New Product</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <!-- Product Name -->
        <div class="form-group">
            <label>Product Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <!-- Category -->
        <div class="form-group">
            <label>Category *</label>
            <select name="category_id" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Price -->
        <div class="form-group">
            <label>Price ($) *</label>
            <input type="number" name="price" step="0.01" min="0"
                   value="{{ old('price') }}" required>
        </div>

        <!-- Suppliers Section -->
        <h3>Suppliers</h3>

        @foreach ($suppliers as $supplier)
            <div class="supplier-box">
                <label>
                    <input type="checkbox"
                           name="suppliers[{{ $supplier->id }}][selected]"
                           value="1">
                    {{ $supplier->name }} ({{ $supplier->email }})
                </label>

                <div class="supplier-fields">
                    <div>
                        <label>Cost Price</label>
                        <input type="number" step="0.01" min="0"
                               name="suppliers[{{ $supplier->id }}][cost_price]">
                    </div>

                    <div>
                        <label>Lead Time (days)</label>
                        <input type="number" min="0"
                               name="suppliers[{{ $supplier->id }}][lead_time_days]">
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Buttons -->
        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Save Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>

    </form>
</div>

</body>
</html>