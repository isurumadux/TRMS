<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Dashboard - Overall Summary</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* General resets */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }

        /* Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Professional Sidebar Styles */
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.05);
            pointer-events: none;
        }

        /* Brand/Logo Section */
        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
        }

        .brand-title {
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Navigation Menu */
        .sidebar-nav {
            flex: 1;
            padding: 20px 0;
            position: relative;
            z-index: 1;
        }

        .nav-item {
            margin-bottom: 5px;
            padding: 0 15px;
        }

        .sidebar-btn {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            font-size: 15px;
            position: relative;
            overflow: hidden;
            border: none;
            background: none;
            cursor: pointer;
            width: 100%;
        }

        .sidebar-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .sidebar-btn:hover::before {
            left: 100%;
        }

        .sidebar-btn:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-btn.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .sidebar-btn.active::after {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 4px;
            height: 60%;
            background-color: white;
            border-radius: 0 2px 2px 0;
            transform: translateY(-50%);
        }

        .nav-icon {
            margin-right: 15px;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .nav-text {
            flex: 1;
        }

        /* Logout Section */
        .sidebar-footer {
            padding: 20px 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 15px;
            background: none;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .logout-btn:hover {
            background-color: rgba(220, 53, 69, 0.2);
            color: #ff6b7a;
            transform: translateX(5px);
        }

        .logout-icon {
            margin-right: 15px;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        /* Main content */
        .main-content {
            flex: 1;
            padding: 40px;
            background-color: #f5f7fa;
        }

        /* Stats row */
        .stats-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #fff;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            flex: 1;
            min-width: 220px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .stat-card h3 {
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #2c3e50;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Filters */
        .filters-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            min-width: 220px;
            flex: 1;
        }

        .filter-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #2c3e50;
        }

        .custom-select {
            position: relative;
        }

        .custom-select select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e6ed;
            border-radius: 10px;
            appearance: none;
            background: white;
            font-size: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .custom-select select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .select-arrow {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #7f8c8d;
        }

        /* Filter Button */
        .filter-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            margin-top: 30px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        /* Progress Section Container */
        .progress-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            margin-top: 30px;
        }

        .progress-container h2 {
            color: #2c3e50;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f3f4;
        }

        /* List Wrapper */
        .progress-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Each Item Row */
        .progress-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 15px;
            background: #f8f9fc;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .progress-item:hover {
            background: #f1f3f8;
            transform: translateX(5px);
        }

        /* Tank Name */
        .location {
            flex: 1;
            font-weight: 600;
            font-size: 15px;
            min-width: 150px;
            color: #2c3e50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .location:hover {
            color: #667eea;
        }

        /* Progress Bar Background */
        .progress-bar-container {
            flex: 3;
            background-color: #e9ecef;
            height: 24px;
            border-radius: 12px;
            overflow: hidden;
            margin: 0 20px;
            min-width: 200px;
            position: relative;
        }

        /* Progress Fill with Animation */
        .progress-bar {
            height: 100%;
            border-radius: 12px;
            background: linear-gradient(90deg, #28a745, #20c997);
            transition: width 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .progress-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Percentage Text */
        .percentage {
            flex-basis: 60px;
            font-weight: 700;
            font-size: 15px;
            text-align: right;
            color: #2c3e50;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: visible;
            }

            .sidebar:hover {
                width: 280px;
            }

            .brand-title,
            .brand-subtitle,
            .nav-text {
                opacity: 0;
                transition: opacity 0.3s;
            }

            .sidebar:hover .brand-title,
            .sidebar:hover .brand-subtitle,
            .sidebar:hover .nav-text {
                opacity: 1;
            }

            .sidebar-btn {
                justify-content: center;
            }

            .sidebar:hover .sidebar-btn {
                justify-content: flex-start;
            }

            .stats-row, 
            .filters-row {
                flex-direction: column;
            }

            .main-content {
                padding: 20px;
            }

            .progress-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .progress-bar-container {
                width: 100%;
                margin: 0;
            }

            .percentage {
                text-align: left;
            }
        }

        /* Active state indicator animation */
        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
            }
        }

        .sidebar-btn.active::after {
            animation: slideIn 0.3s ease-out;
        }

        /* Loading state for progress bars */
        .progress-bar.loading {
            background: linear-gradient(90deg, #e9ecef, #f8f9fa, #e9ecef);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Professional Sidebar -->
        <div class="sidebar">
            <!-- Brand Header -->
            <div class="sidebar-header">
                <div class="brand-title">Tank Dashboard</div>
                <div class="brand-subtitle">Analytics Panel</div>
            </div>

            <!-- Navigation Menu -->
            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a class="sidebar-btn active" href="{{ route('newdash.index') }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <span class="nav-text">Overall Summary</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a class="sidebar-btn" href="{{ route('newdash2.index') }}">
                      <i class="nav-icon fa fa-file-text"></i>
                        <span class="nav-text">Individual Summary</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a class="sidebar-btn" href="{{ route('main.index') }}">
                        <i class="nav-icon fas fa-home"></i>
                        <span class="nav-text">Home</span>
                    </a>
                </div>
            </nav>

            <!-- Logout Section -->
            <div class="sidebar-footer">
                <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="logout-icon fas fa-sign-out-alt"></i>
                    <span class="nav-text">Logout</span>
                </button>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Stats Cards -->
            <div class="stats-row">
                <div class="stat-card">
                    <h3>Total Tank Count</h3>
                    <p class="stat-value">173</p>
                </div>
                <div class="stat-card">
                    <h3>Completed Tanks</h3>
                     <p class="stat-value">{{ $completedTankCount }}</p>
                </div>
                <div class="stat-card">
                    <h3>More Than 50% Completed</h3>
                    <p class="stat-value">{{ $moreThan50PercentCount }}</p>
                </div>
                <div class="stat-card">
                    <h3>Users Count</h3>
                    <p class="stat-value">{{ $userCount }}</p>
                </div>
            </div>

            <!-- Filters -->
            <form method="GET" action="{{ route('newdash.index') }}">
                <div class="filters-row">
                    <!-- Province Dropdown -->
                    <div class="filter-group">
                        <label for="province">Select Province</label>
                        <div class="custom-select">
                            <select id="province" name="province">
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province }}" {{ $province == $selectedProvince ? 'selected' : '' }}>
                                        {{ ucwords($province) }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="select-arrow">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>

                    <!-- District Dropdown -->
                    <div class="filter-group">
                        <label for="district">Select District</label>
                        <div class="custom-select">
                            <select id="district" name="district">
                                <option value="">Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district }}" {{ $district == $selectedDistrict ? 'selected' : '' }}>
                                        {{ ucwords($district) }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="select-arrow">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div style="display: flex; align-items: flex-end;">
                        <button type="submit" class="filter-btn">
                            <i class="fas fa-filter" style="margin-right: 8px;"></i>
                            Apply Filters
                        </button>
                    </div>
                </div>
            </form>
            
            <!-- Progress Container -->
            <div class="progress-container">
                <h2>
                    <i class="fas fa-tasks" style="margin-right: 10px; color: #667eea;"></i>
                    Tank Progress Overview
                </h2>
                <div class="progress-list">
                    @foreach ($tanks as $tank)
                        @if(!empty($tank['tank_name']))
                            <div class="progress-item">
                                <a class="location" href="{{ route('tank.details', ['tankName' => $tank['tank_name']]) }}">
                                    <i class="fas fa-water" style="margin-right: 8px; color: #667eea;"></i>
                                    {{ $tank['tank_name'] }}
                                </a>
                                <div class="progress-bar-container">
                                    <div class="progress-bar" style="width: {{ $tank['overall_percent'] }}%"></div>
                                </div>
                                <span class="percentage">{{ $tank['overall_percent'] }}%</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Province/District AJAX functionality
        $('#province').on('change', function () {
            var selectedProvince = $(this).val();
            $('#district').html('<option value="">Loading...</option>');

            if (selectedProvince) {
                $.ajax({
                    url: "{{ route('get.districts') }}",
                    type: "GET",
                    data: { province: selectedProvince },
                    success: function (data) {
                        let options = '<option value="">Select District</option>';
                        data.forEach(function (district) {
                            options += `<option value="${district}">${district.charAt(0).toUpperCase() + district.slice(1)}</option>`;
                        });
                        $('#district').html(options);
                    }
                });
            } else {
                $('#district').html('<option value="">Select District</option>');
            }
        });

        // Active state management for sidebar
        document.addEventListener('DOMContentLoaded', function() {
            // Get current page URL
            const currentUrl = window.location.href;
            const sidebarLinks = document.querySelectorAll('.sidebar-btn');
            
            // Remove active class from all links first
            sidebarLinks.forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active class to current page link
            sidebarLinks.forEach(link => {
                if (currentUrl.includes(link.getAttribute('href'))) {
                    link.classList.add('active');
                }
            });

            // Add click ripple effect
            document.querySelectorAll('.sidebar-btn, .logout-btn, .filter-btn').forEach(element => {
                element.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.3);
                        transform: scale(0);
                        animation: ripple 0.6s ease-out;
                        pointer-events: none;
                        z-index: 1000;
                    `;
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                });
            });

            // Animate progress bars on load
            setTimeout(() => {
                document.querySelectorAll('.progress-bar').forEach(bar => {
                    const width = bar.style.width;
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 100);
                });
            }, 500);
        });

        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>