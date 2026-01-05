<!DOCTYPE html>
<html>
<head>
    <title>Cosmetics Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.10);
            border: 1px solid #e0e0e0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .header-left h1 {
            color: #5a4fcf;
            margin: 0;
            font-size: 26px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .subtitle {
            margin-top: 8px;
            color: #6c757d;
            font-size: 14px;
        }

        .header-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
        }

        .btn-add {
            background: #667eea;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .filters {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            align-items: center;
        }

        .filters label {
            color: #5a4fcf;
            font-weight: 600;
            font-size: 13px;
            white-space: nowrap;
        }

        .filters select {
            padding: 9px 12px;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            outline: none;
            min-width: 220px;
            background: #fff;
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
            vertical-align: top;
        }

        tr:hover {
            background-color: rgba(102, 126, 234, 0.05);
        }

        .category-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            background: rgba(118, 75, 162, 0.10);
            color: #764ba2;
        }

        .price {
            color: #667eea;
            font-weight: 700;
        }

        .supplier-item {
            margin-bottom: 6px;
            font-size: 13px;
            line-height: 1.4;
        }

        .supplier-count {
            display: inline-block;
            margin-top: 6px;
            font-size: 12px;
            font-weight: 700;
            color: #667eea;
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            margin-right: 5px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-view {
            background: rgba(102, 126, 234, 0.10);
            color: #667eea;
        }

        .btn-edit {
            background: rgba(118, 75, 162, 0.10);
            color: #764ba2;
        }

        .btn-delete {
            background: rgba(220, 53, 69, 0.10);
            color: #dc3545;
        }

        .success {
            background: rgba(40, 167, 69, 0.10);
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

        .hint {
            margin-top: 6px;
            color: #888;
            font-size: 12px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container">

    <div class="header">
        <div class="header-left">
            <h1>
                <i class="fas fa-spray-can-sparkles" style="color: #667eea;"></i>
                Cosmetics Management
            </h1>
            <div class="subtitle">
                Manage makeup, skincare, fragrance, accessories, and bags products.
            </div>
            <div class="hint">
                Tip: Use the category filter to view cosmetics items only.
            </div>
        </div>

        <div class="header-actions">
            <a href="{{ route('products.create') }}" class="btn-add">
                <i class="fas fa-plus"></i> Add Cosmetic Product
            </a>

            <form class="filters" method="GET" action="{{ route('products.index') }}">
                <label for="category">Category</label>
                <select name="category" id="category" onchange="this.form.submit()">
                    <option value="">All Cosmetics</option>

                    @php
                        $cosmeticCategories = ['Makeup','Skincare','Fragrance','Accessories','Bags'];
                        $selected = request('category');
                    @endphp

                    @foreach($cosmeticCategories as $cat)
                        <option value="{{ $cat }}" {{ $selected === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="success"><i class="fas fa-check"></i> {{ session('success') }}</div>
    @endif

    @if($products->count() > 0)
        <table>
            <thead>
            <tr>
                <th>No</th>
                <th>Cosmetic Product</th>
                <th>Cosmetic Category</th>
                <th>Suppliers</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>

                    <td>
                        @if($product->category)
                            <span class="category-badge">{{ $product->category->name }}</span>
                        @else
                            <span style="color:#dc3545; font-weight:600;">No Category</span>
                        @endif
                    </td>

                    <td>
                        @if($product->suppliers && $product->suppliers->count() > 0)
                            @foreach($product->suppliers as $s)
                                <div class="supplier-item">
                                    {{ $s->name }}
                                    (cost: {{ number_format((float)$s->pivot->cost_price, 2) }},
                                    lead: {{ (int)$s->pivot->lead_time_days }} days)
                                </div>
                            @endforeach

                            @if(isset($product->suppliers_count))
                                <div class="supplier-count">
                                    Suppliers: {{ $product->suppliers_count }}
                                </div>
                            @endif
                        @else
                            <span style="color:#888;">No suppliers</span>
                        @endif
                    </td>

                    <td class="price">${{ number_format((float)$product->price, 2) }}</td>

                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn-action btn-view">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('products.edit', $product) }}" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>
                <i class="fas fa-database"></i>
                Total: {{ $products->count() }} products
            </p>
        </div>
    @else
        <div class="no-products">
            <i class="fas fa-box-open" style="font-size: 40px; color: #ccc;"></i>
            <h3>No cosmetic products found</h3>
            <a href="{{ route('products.create') }}" class="btn-add">
                <i class="fas fa-plus"></i> Add First Cosmetic Product
            </a>
        </div>
    @endif

</div>
</body>
</html>