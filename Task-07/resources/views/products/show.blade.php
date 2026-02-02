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

        .section-title {
            margin-top: 25px;
            margin-bottom: 12px;
            color: #444;
            font-size: 18px;
            font-weight: 700;
        }

        .supplier-box {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 12px 14px;
            background: #fff;
            margin-bottom: 10px;
        }

        .supplier-name {
            font-weight: 700;
            color: #5a4fcf;
            margin-bottom: 6px;
        }

        .supplier-meta {
            color: #555;
            font-size: 14px;
            line-height: 1.5;
        }

        .pill {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: rgba(102, 126, 234, 0.12);
            color: #667eea;
            margin-right: 6px;
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
            <span class="value">${{ number_format((float)$product->price, 2) }}</span>
        </div>

        <div class="info-row">
            <span class="label">Created:</span>
            <span class="value">{{ $product->created_at?->format('Y-m-d') }}</span>
        </div>

        <div class="info-row" style="border-bottom:none;">
            <span class="label">Updated:</span>
            <span class="value">{{ $product->updated_at?->format('Y-m-d') }}</span>
        </div>

        <!-- Suppliers Section -->
        <div class="section-title">Suppliers</div>

        @if($product->suppliers && $product->suppliers->count() > 0)
            @foreach($product->suppliers as $s)
                <div class="supplier-box">
                    <div class="supplier-name">
                        {{ $s->name }} <span style="color:#777; font-weight:500;">({{ $s->email }})</span>
                    </div>

                    <div class="supplier-meta">
                        <span class="pill">Cost</span>
                        ${{ number_format((float)$s->pivot->cost_price, 2) }}

                        <span class="pill" style="margin-left:10px;">Lead</span>
                        {{ (int)$s->pivot->lead_time_days }} days
                    </div>
                </div>
            @endforeach
        @else
            <div style="color:#888;">No suppliers assigned to this product.</div>
        @endif
    </div>

    <div class="btn-group">
        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit Product</a>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>