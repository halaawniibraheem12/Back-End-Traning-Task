<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product | Cosmetics Management</title>
    
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
            max-width: 1200px;
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
            padding: 25px 35px;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 180px;
            height: 180px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            position: relative;
            z-index: 2;
        }

        .brand {
            flex: 1;
            min-width: 250px;
        }

        .brand h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            font-weight: 600;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            background: rgba(255, 255, 255, 0.2);
            padding: 12px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .tagline {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        /* Navigation Buttons */
        .nav-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        /* Main Content */
        .main-content {
            padding: 35px;
        }

        /* Form Header */
        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-subtitle {
            color: var(--gray);
            font-size: 1rem;
            margin-top: 5px;
        }

        .back-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .back-link:hover {
            color: var(--primary-dark);
            gap: 12px;
        }

        /* Form Container */
        .form-container {
            background: var(--light);
            border-radius: var(--border-radius);
            padding: 35px;
            border: 1px solid rgba(138, 74, 243, 0.1);
        }

        /* Form Sections */
        .form-section {
            margin-bottom: 35px;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(138, 74, 243, 0.1);
        }

        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .section-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--dark);
        }

        .section-description {
            color: var(--gray);
            font-size: 0.95rem;
            margin-top: 5px;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.95rem;
        }

        .form-label .required {
            color: var(--danger);
            margin-left: 3px;
        }

        .form-hint {
            display: block;
            margin-top: 6px;
            font-size: 0.85rem;
            color: var(--gray);
        }

        /* Form Controls */
        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid rgba(138, 74, 243, 0.2);
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            color: var(--dark);
            background: white;
            transition: var(--transition);
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(138, 74, 243, 0.1);
        }

        .form-control::placeholder {
            color: #b8b8c5;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            line-height: 1.5;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%238a4af3' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 18px center;
            padding-right: 45px;
        }

        /* Suppliers Section */
        .suppliers-section {
            background: rgba(138, 74, 243, 0.03);
            border-radius: 12px;
            padding: 25px;
            margin-top: 20px;
        }

        .supplier-item {
            background: white;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid rgba(138, 74, 243, 0.1);
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .supplier-item:hover {
            border-color: var(--primary-light);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .supplier-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .supplier-title {
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remove-supplier {
            background: rgba(255, 59, 48, 0.1);
            color: var(--danger);
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .remove-supplier:hover {
            background: rgba(255, 59, 48, 0.2);
        }

        .add-supplier-btn {
            background: rgba(138, 74, 243, 0.1);
            color: var(--primary);
            border: 2px dashed rgba(138, 74, 243, 0.3);
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 15px;
        }

        .add-supplier-btn:hover {
            background: rgba(138, 74, 243, 0.15);
            border-color: var(--primary);
        }

        /* Checkbox Styling */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-weight: 500;
        }

        .custom-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(138, 74, 243, 0.3);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .checkbox-label input:checked + .custom-checkbox {
            background: var(--primary);
            border-color: var(--primary);
        }

        .checkbox-label input:checked + .custom-checkbox::after {
            content: '✓';
            color: white;
            font-size: 12px;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid rgba(138, 74, 243, 0.1);
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 14px 32px;
            font-size: 1rem;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(138, 74, 243, 0.3);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid rgba(138, 74, 243, 0.3);
            padding: 12px 28px;
            font-weight: 600;
        }

        .btn-outline:hover {
            background: rgba(138, 74, 243, 0.05);
            border-color: var(--primary);
        }

        .cancel-link {
            color: var(--gray);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .cancel-link:hover {
            color: var(--dark);
        }

        /* Footer */
        .footer {
            background: var(--light);
            padding: 20px 35px;
            border-top: 1px solid rgba(138, 74, 243, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .footer-info {
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 600;
        }

        .footer-badge {
            background: white;
            padding: 8px 16px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            font-size: 0.85rem;
        }

        .copyright {
            color: var(--gray);
            font-size: 0.85rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header, .main-content, .footer {
                padding: 20px;
            }
            
            .brand h1 {
                font-size: 2rem;
            }
            
            .form-container {
                padding: 25px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn-primary, .btn-outline {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .container {
                border-radius: 12px;
            }
            
            .header {
                padding: 15px;
            }
            
            .brand h1 {
                font-size: 1.8rem;
            }
            
            .nav-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .form-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-light);
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-light);
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }

        /* Validation Styles */
        .error {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .is-invalid {
            border-color: var(--danger) !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(255, 59, 48, 0.1) !important;
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
                        <i class="fas fa-plus-circle"></i>
                    </span>
                    Add New Product
                </h1>
                <p class="tagline">Create and add new cosmetic products to your inventory</p>
            </div>
            
            <div class="nav-buttons">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-gauge-high"></i> Dashboard
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-boxes-stacked"></i> All Products
                </a>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        
        <!-- Form Header -->
        <div class="form-header">
            <div>
                <h2 class="form-title">Product Information</h2>
                <p class="form-subtitle">Fill in the details below to add a new cosmetic product</p>
            </div>
            <a href="{{ route('products.index') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Back to Products
            </a>
        </div>
        
        <!-- Form Container -->
        <form action="{{ route('products.store') }}" method="POST" class="form-container">
            @csrf
            
            <!-- Basic Information Section -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div>
                        <h3 class="section-title">Basic Information</h3>
                        <p class="section-description">Enter the basic details of your cosmetic product</p>
                    </div>
                </div>
                
                <div class="form-grid">
                    <!-- Product Name -->
                    <div class="form-group">
                        <label for="name" class="form-label">
                            Product Name <span class="required">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="form-control" 
                               placeholder="Enter product name (e.g., Matte Lipstick, Moisturizing Cream)"
                               value="{{ old('name') }}"
                               required>
                        <span class="form-hint">Enter a descriptive name for your cosmetic product</span>
                        @error('name')
                            <div class="error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <!-- Category -->
                    <div class="form-group">
                        <label for="category_id" class="form-label">
                            Category <span class="required">*</span>
                        </label>
                        <select id="category_id" name="category_id" class="form-control" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="form-hint">Choose the appropriate category for your product</span>
                        @error('category_id')
                            <div class="error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                
                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="form-label">
                        Product Description
                    </label>
                    <textarea id="description" 
                              name="description" 
                              class="form-control" 
                              placeholder="Describe your product features, benefits, and usage instructions..."
                              rows="4">{{ old('description') }}</textarea>
                    <span class="form-hint">Provide detailed information about your product (optional)</span>
                    @error('description')
                        <div class="error">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <!-- Pricing & Stock Section -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <div>
                        <h3 class="section-title">Pricing & Stock</h3>
                        <p class="section-description">Set pricing and inventory details</p>
                    </div>
                </div>
                
                <div class="form-row">
                    <!-- Price -->
                    <div class="form-group">
                        <label for="price" class="form-label">
                            Price ($) <span class="required">*</span>
                        </label>
                        <input type="number" 
                               id="price" 
                               name="price" 
                               class="form-control" 
                               placeholder="0.00"
                               step="0.01"
                               min="0"
                               value="{{ old('price') }}"
                               required>
                        <span class="form-hint">Enter the selling price in USD</span>
                        @error('price')
                            <div class="error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <!-- Stock -->
                    <div class="form-group">
                        <label for="stock" class="form-label">
                            Stock Quantity
                        </label>
                        <input type="number" 
                               id="stock" 
                               name="stock" 
                               class="form-control" 
                               placeholder="0"
                               min="0"
                               value="{{ old('stock') }}">
                        <span class="form-hint">Current inventory count (optional)</span>
                        @error('stock')
                            <div class="error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Suppliers Section -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div>
                        <h3 class="section-title">Suppliers</h3>
                        <p class="section-description">Add supplier information for this product</p>
                    </div>
                </div>
                
                <div class="suppliers-section">
                    <!-- Existing Suppliers (if any) -->
                    <div id="suppliers-container">
                        <!-- Supplier item template will be added here by JavaScript -->
                    </div>
                    
                    <!-- Add Supplier Button -->
                    <button type="button" id="add-supplier-btn" class="add-supplier-btn">
                        <i class="fas fa-plus"></i> Add Supplier
                    </button>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="form-actions">
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check-circle"></i> Create Product
                    </button>
                    <button type="reset" class="btn btn-outline">
                        <i class="fas fa-redo"></i> Reset Form
                    </button>
                </div>
                <a href="{{ route('products.index') }}" class="cancel-link">
                    Cancel and return to products
                </a>
            </div>
        </form>
        
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-info">
            <div class="footer-badge">
                <i class="fas fa-shield-check"></i>
                <span>Secure Form Submission</span>
            </div>
            <div class="footer-badge">
                <i class="fas fa-info-circle"></i>
                <span>All fields marked with * are required</span>
            </div>
        </div>
        
        <div class="copyright">
            <i class="fas fa-copyright"></i> {{ date('Y') }} Cosmetics Management System
        </div>
    </footer>
    
</div>

<!-- JavaScript for Dynamic Supplier Addition -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    let supplierCount = 0;
    
    // Function to add a new supplier field
    function addSupplierField() {
        supplierCount++;
        const container = document.getElementById('suppliers-container');
        
        const supplierHtml = `
            <div class="supplier-item" id="supplier-${supplierCount}">
                <div class="supplier-header">
                    <div class="supplier-title">
                        <i class="fas fa-truck"></i>
                        Supplier #${supplierCount}
                    </div>
                    <button type="button" class="remove-supplier" onclick="removeSupplier(${supplierCount})">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="suppliers[${supplierCount}][supplier_id]" class="form-label">
                            Supplier <span class="required">*</span>
                        </label>
                        <select name="suppliers[${supplierCount}][supplier_id]" class="form-control" required>
                            <option value="">Select supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="suppliers[${supplierCount}][cost_price]" class="form-label">
                            Cost Price ($)
                        </label>
                        <input type="number" 
                               name="suppliers[${supplierCount}][cost_price]" 
                               class="form-control" 
                               placeholder="0.00"
                               step="0.01"
                               min="0">
                    </div>
                    <div class="form-group">
                        <label for="suppliers[${supplierCount}][lead_time_days]" class="form-label">
                            Lead Time (Days)
                        </label>
                        <input type="number" 
                               name="suppliers[${supplierCount}][lead_time_days]" 
                               class="form-control" 
                               placeholder="0"
                               min="0">
                    </div>
                </div>
            </div>
        `;
        
        container.insertAdjacentHTML('beforeend', supplierHtml);
    }
    
    // Function to remove a supplier field
    window.removeSupplier = function(id) {
        const supplierElement = document.getElementById(`supplier-${id}`);
        if (supplierElement) {
            supplierElement.remove();
        }
    };
    
    // Add initial supplier field
    addSupplierField();
    
    // Add event listener to the "Add Supplier" button
    document.getElementById('add-supplier-btn').addEventListener('click', addSupplierField);
    
    // Form validation and enhancement
    const form = document.querySelector('form');
    const requiredFields = form.querySelectorAll('[required]');
    
    // Add real-time validation
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    });
    
    // Price input formatting
    const priceInput = document.getElementById('price');
    if (priceInput) {
        priceInput.addEventListener('input', function() {
            let value = parseFloat(this.value);
            if (!isNaN(value) && value >= 0) {
                this.value = value.toFixed(2);
            }
        });
    }
    
    // Add focus effect to form controls
    const formControls = document.querySelectorAll('.form-control');
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        control.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
    
    // Smooth scroll to error messages
    const errorMessages = document.querySelectorAll('.error');
    if (errorMessages.length > 0) {
        errorMessages[0].scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }
});
</script>

</body>
</html>