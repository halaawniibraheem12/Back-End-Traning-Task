<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmetics Management | Beauty Products Dashboard</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #8a4af3;
            --primary-light: #a36ef5;
            --primary-dark: #6a2cd8;
            --secondary: #ff6b8b;
            --accent: #36d1dc;
            --light: #f9f5ff;
            --dark: #2a2d43;
            --gray: #8c8fa6;
            --gray-light: #f0edf7;
            --success: #4cd964;
            --warning: #ffcc00;
            --danger: #ff3b30;
            --shadow: 0 10px 30px rgba(138, 74, 243, 0.1);
            --border-radius: 16px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f9f5ff 0%, #f0edf7 100%);
            color: var(--dark);
            min-height: 100vh;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            border: 1px solid rgba(138, 74, 243, 0.1);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 30px 40px;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            position: relative;
            z-index: 2;
        }

        .brand {
            flex: 1;
            min-width: 300px;
        }

        .brand h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-icon {
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .tagline {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 10px;
        }

        .stats-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-top: 5px;
            backdrop-filter: blur(10px);
        }

        /* Actions Panel */
        .actions-panel {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: flex-end;
        }

        .quick-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            white-space: nowrap;
        }

        .btn-primary {
            background: white;
            color: var(--primary);
        }

        .btn-primary:hover {
            background: var(--light);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(138, 74, 243, 0.2);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
        }

        .btn-add {
            background: var(--secondary);
            color: white;
            padding: 14px 28px;
            font-size: 1rem;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(255, 107, 139, 0.3);
        }

        .btn-add:hover {
            background: #ff5773;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(255, 107, 139, 0.4);
        }

        /* Filter Section */
        .filter-section {
            padding: 25px 40px;
            background: var(--light);
            border-bottom: 1px solid rgba(138, 74, 243, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .filter-label {
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: '▼';
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            pointer-events: none;
            font-size: 0.8rem;
        }

        select {
            padding: 12px 20px;
            padding-right: 40px;
            border-radius: 12px;
            border: 2px solid rgba(138, 74, 243, 0.2);
            background: white;
            color: var(--dark);
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            cursor: pointer;
            min-width: 220px;
            transition: var(--transition);
            appearance: none;
            outline: none;
        }

        select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(138, 74, 243, 0.1);
        }

        /* Main Content */
        .main-content {
            padding: 30px 40px;
        }

        /* Alert Message */
        .alert {
            padding: 18px 24px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            animation: slideIn 0.5s ease;
            border-left: 5px solid;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .alert-success {
            background: rgba(76, 217, 100, 0.1);
            border-left-color: var(--success);
            color: #155724;
        }

        /* Products Table */
        .table-container {
            overflow-x: auto;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        thead {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            color: white;
        }

        th {
            padding: 20px 18px;
            text-align: left;
            font-weight: 600;
            font-size: 1rem;
            white-space: nowrap;
        }

        th:first-child {
            border-radius: 12px 0 0 0;
        }

        th:last-child {
            border-radius: 0 12px 0 0;
        }

        tbody tr {
            border-bottom: 1px solid rgba(138, 74, 243, 0.1);
            transition: var(--transition);
        }

        tbody tr:hover {
            background: rgba(138, 74, 243, 0.03);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        td {
            padding: 18px;
            vertical-align: top;
        }

        /* Product Name */
        .product-name {
            font-weight: 600;
            color: var(--dark);
            font-size: 1.05rem;
        }

        /* Owner Cell */
        .owner-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .owner-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .owner-details {
            display: flex;
            flex-direction: column;
        }

        .owner-name {
            font-weight: 600;
            color: var(--dark);
        }

        .owner-email {
            font-size: 0.85rem;
            color: var(--gray);
        }

        /* Category Badge */
        .category-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            background: rgba(138, 74, 243, 0.1);
            color: var(--primary);
            border: 1px solid rgba(138, 74, 243, 0.2);
        }

        /* Suppliers List */
        .suppliers-list {
            max-width: 250px;
        }

        .supplier-item {
            margin-bottom: 8px;
            padding-bottom: 8px;
            border-bottom: 1px dashed rgba(138, 74, 243, 0.1);
        }

        .supplier-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .supplier-name {
            font-weight: 500;
            color: var(--dark);
        }

        .supplier-details {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: var(--gray);
            margin-top: 3px;
        }

        .supplier-count {
            margin-top: 10px;
            padding: 6px 12px;
            background: rgba(54, 209, 220, 0.1);
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--accent);
            display: inline-block;
        }

        /* Price */
        .price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .price::before {
            content: '$';
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* Actions - UPDATED: Buttons in one line */
        .actions-cell {
            display: flex;
            gap: 10px;
            flex-wrap: nowrap; /* Changed from wrap to nowrap */
            align-items: center;
            justify-content: flex-start;
        }

        .action-btn {
            padding: 8px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            white-space: nowrap;
            min-width: 70px;
            justify-content: center;
        }

        /* Make sure delete button is inline with others */
        .delete-form {
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        .action-view {
            background: rgba(138, 74, 243, 0.1);
            color: var(--primary);
        }

        .action-view:hover {
            background: rgba(138, 74, 243, 0.2);
            transform: translateY(-2px);
        }

        .action-edit {
            background: rgba(255, 204, 0, 0.1);
            color: #b8860b;
        }

        .action-edit:hover {
            background: rgba(255, 204, 0, 0.2);
            transform: translateY(-2px);
        }

        .action-delete {
            background: rgba(255, 59, 48, 0.1);
            color: var(--danger);
        }

        .action-delete:hover {
            background: rgba(255, 59, 48, 0.2);
            transform: translateY(-2px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 40px;
            color: var(--gray);
        }

        .empty-icon {
            font-size: 4rem;
            color: rgba(138, 74, 243, 0.2);
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .empty-state p {
            max-width: 500px;
            margin: 0 auto 30px;
            line-height: 1.8;
        }

        /* Footer */
        .footer {
            background: var(--light);
            padding: 25px 40px;
            border-top: 1px solid rgba(138, 74, 243, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .stats {
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 600;
        }

        .stat-badge {
            background: white;
            padding: 10px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary);
        }

        .copyright {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Responsive Design - Updated for actions */
        @media (max-width: 1100px) {
            .header-content, .filter-section {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .actions-panel {
                width: 100%;
                align-items: flex-start;
            }
            
            .quick-actions {
                justify-content: flex-start;
            }
            
            /* Adjust actions for smaller screens */
            .actions-cell {
                flex-wrap: wrap;
                gap: 8px;
            }
            
            .action-btn {
                padding: 7px 12px;
                font-size: 0.8rem;
                min-width: 60px;
            }
        }

        @media (max-width: 768px) {
            .header, .main-content, .filter-section, .footer {
                padding: 25px 20px;
            }
            
            .brand h1 {
                font-size: 2.2rem;
            }
            
            .btn {
                padding: 10px 18px;
            }
            
            th, td {
                padding: 15px 12px;
            }
            
            /* Stack actions vertically on very small screens */
            .actions-cell {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            
            .action-btn {
                width: 100%;
                justify-content: flex-start;
            }
            
            .delete-form {
                width: 100%;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-light);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-light);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }
    </style>
</head>
<body>

<div class="container">
    
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="brand">
                <h1>
                    <span class="brand-icon">
                        <i class="fas fa-spray-can-sparkles"></i>
                    </span>
                    Cosmetics Management
                </h1>
                
                    
            </div>
            
            <div class="actions-panel">
                <div class="quick-actions">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-gauge-high"></i> Dashboard
                    </a>
                    
                    @auth
                    <a href="{{ route('profile.edit') }}" class="btn btn-secondary">
                        <i class="fas fa-user-circle"></i> Profile
                    </a>
                    @endauth
                </div>
                
                @auth
                <a href="{{ route('products.create') }}" class="btn btn-add">
                    <i class="fas fa-plus-circle"></i> Add New Product
                </a>
                @endauth
            </div>
        </div>
    </header>
    
    <!-- Filters -->
    <div class="filter-section">
        <div class="filter-group">
            <span class="filter-label">
                <i class="fas fa-filter"></i> Filter by:
            </span>
            
            <form method="GET" action="{{ route('products.index') }}" class="select-wrapper">
                <select name="category" id="category" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    
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
        
        <div class="filter-group">
            <span class="filter-label">
                <i class="fas fa-info-circle"></i> Showing: {{ $products->count() }} products
            </span>
        </div>
    </div>
    
    <!-- Main Content -->
    <main class="main-content">
        
        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <div>{{ session('success') }}</div>
        </div>
        @endif
        
        <!-- Products Table -->
        @if($products->count() > 0)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Owner</th>
                        <th>Category</th>
                        <th>Suppliers</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        
                        <td>
                            <div class="product-name">{{ $product->name }}</div>
                            @if($product->description)
                            <div style="font-size: 0.85rem; color: var(--gray); margin-top: 5px;">
                                {{ Str::limit($product->description, 50) }}
                            </div>
                            @endif
                        </td>
                        
                        <td>
                            @if($product->user)
                            <div class="owner-info">
                                <div class="owner-avatar">
                                    {{ strtoupper(substr($product->user->name, 0, 1)) }}
                                </div>
                                <div class="owner-details">
                                    <span class="owner-name">{{ $product->user->name }}</span>
                                    <span class="owner-email">{{ $product->user->email }}</span>
                                </div>
                            </div>
                            @else
                            <span style="color: var(--danger); font-weight: 600;">No Owner</span>
                            @endif
                        </td>
                        
                        <td>
                            @if($product->category)
                            <span class="category-badge">
                                <i class="fas fa-tag"></i> {{ $product->category->name }}
                            </span>
                            @else
                            <span style="color: var(--danger); font-weight: 600;">No Category</span>
                            @endif
                        </td>
                        
                        <td>
                            <div class="suppliers-list">
                                @if($product->suppliers && $product->suppliers->count() > 0)
                                    @foreach($product->suppliers->take(2) as $supplier)
                                    <div class="supplier-item">
                                        <div class="supplier-name">{{ $supplier->name }}</div>
                                        <div class="supplier-details">
                                            <span>Cost: ${{ number_format((float)$supplier->pivot->cost_price, 2) }}</span>
                                            <span>Lead: {{ (int)$supplier->pivot->lead_time_days }} days</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    @if($product->suppliers->count() > 2)
                                    <div class="supplier-count">
                                        +{{ $product->suppliers->count() - 2 }} more suppliers
                                    </div>
                                    @endif
                                @else
                                    <span style="color: var(--gray); font-style: italic;">No suppliers</span>
                                @endif
                            </div>
                        </td>
                        
                        <td>
                            <div class="price">{{ number_format((float)$product->price, 2) }}</div>
                            @if($product->stock)
                            <div style="font-size: 0.85rem; color: var(--gray);">
                                Stock: {{ $product->stock }}
                            </div>
                            @endif
                        </td>
                        
                        <!-- Actions Buttons in One Line -->
                        <td>
                            <div class="actions-cell">
                                <!-- View Button -->
                                <a href="{{ route('products.show', $product) }}" class="action-btn action-view">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                
                                <!-- Edit Button -->
                                @can('update', $product)
                                <a href="{{ route('products.edit', $product) }}" class="action-btn action-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @endcan
                                
                                <!-- Delete Button - Now inline with others -->
                                @can('delete', $product)
                                <form action="{{ route('products.destroy', $product) }}" method="POST" 
                                      class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn action-delete"
                                            data-product-name="{{ $product->name }}">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <h3>No cosmetic products found</h3>
            <p>Get started by adding your first beauty product to the inventory. Manage suppliers, track stock, and organize by category.</p>
            
            @auth
            <a href="{{ route('products.create') }}" class="btn btn-add">
                <i class="fas fa-plus-circle"></i> Add Your First Product
            </a>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Login to Add Products
            </a>
            @endauth
        </div>
        @endif
        
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="stats">
            <div class="stat-badge">
                <i class="fas fa-cubes"></i>
                <span>Total Products: {{ $products->count() }}</span>
            </div>
            
            @php
                $uniqueCategories = $products->pluck('category.name')->filter()->unique()->count();
            @endphp
            
            @if($uniqueCategories > 0)
            <div class="stat-badge">
                <i class="fas fa-tags"></i>
                <span>Categories: {{ $uniqueCategories }}</span>
            </div>
            @endif
        </div>
        
        <div class="copyright">
            <i class="fas fa-copyright"></i> {{ date('Y') }} Cosmetics Management System
        </div>
    </footer>
    
</div>

<!-- Delete Confirmation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete confirmation
    document.querySelectorAll('.delete-form button[type="submit"]').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');
            const productName = this.getAttribute('data-product-name') || 'this product';
            
            // SweetAlert-like confirmation (using browser's confirm for simplicity)
            const confirmed = confirm(`Are you sure you want to delete "${productName}"?\n\nThis action cannot be undone.`);
            
            if (confirmed) {
                form.submit();
            }
        });
    });
    
    // Add hover effects to table rows
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

</body>
</html>