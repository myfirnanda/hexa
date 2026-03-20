<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Hexavara</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL,GRAD,opsz@100..700,0,0,20..48" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: "Inter", sans-serif;
            background: #0f172a;
            color: #f1f5f9;
            min-height: 100vh;
        }
        .admin-topbar {
            background: #1e293b;
            border-bottom: 1px solid #334155;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .admin-topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .admin-topbar-left img { height: 40px; width: auto; }
        .admin-topbar-title { font-size: 18px; font-weight: 600; }
        .admin-topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .admin-user { font-size: 14px; color: #94a3b8; }
        .admin-logout {
            background: transparent;
            border: 1px solid #475569;
            color: #94a3b8;
            padding: 8px 16px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .admin-logout:hover { border-color: #ef4444; color: #ef4444; }
        .admin-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px 24px;
        }
        .admin-page-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 24px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: #1e293b;
            border-radius: 12px;
            padding: 24px;
            border: 1px solid #334155;
        }
        .stat-card-label {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 8px;
        }
        .stat-card-value {
            font-size: 32px;
            font-weight: 700;
        }
        .stat-card-value.blue   { color: #3b82f6; }
        .stat-card-value.yellow { color: #eab308; }
        .stat-card-value.green  { color: #22c55e; }
        .stat-card-value.indigo { color: #818cf8; }
        .orders-panel {
            background: #1e293b;
            border-radius: 12px;
            border: 1px solid #334155;
            overflow: hidden;
        }
        .orders-header {
            padding: 20px 24px;
            border-bottom: 1px solid #334155;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .orders-header h2 {
            font-size: 18px;
            font-weight: 600;
        }
        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }
        .orders-table th {
            text-align: left;
            padding: 12px 20px;
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #334155;
            white-space: nowrap;
        }
        .orders-table td {
            padding: 16px 20px;
            font-size: 14px;
            border-bottom: 1px solid rgba(51,65,85,0.5);
            vertical-align: top;
        }
        .orders-table tr:last-child td { border-bottom: none; }
        .orders-table tr:hover td { background: rgba(51,65,85,0.3); }
        .order-name { font-weight: 600; color: #f1f5f9; }
        .order-email { color: #94a3b8; font-size: 13px; }
        .order-desc {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #94a3b8;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }
        .badge-pending { background: rgba(234,179,8,0.15); color: #eab308; }
        .badge-in_progress { background: rgba(59,130,246,0.15); color: #3b82f6; }
        .badge-completed { background: rgba(34,197,94,0.15); color: #22c55e; }
        .badge-rejected { background: rgba(239,68,68,0.15); color: #ef4444; }
        .status-form {
            display: inline;
        }
        .status-select {
            background: #0f172a;
            border: 1px solid #334155;
            color: #cbd5e1;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-family: inherit;
            cursor: pointer;
            outline: none;
        }
        .status-select:focus { border-color: #2563eb; }
        .pagination-wrap {
            padding: 16px 24px;
            display: flex;
            justify-content: center;
        }
        .pagination-wrap nav { display: flex; gap: 4px; }
        .pagination-wrap a, .pagination-wrap span {
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            color: #94a3b8;
            border: 1px solid #334155;
        }
        .pagination-wrap span.current {
            background: #2563eb;
            color: #fff;
            border-color: #2563eb;
        }
        .pagination-wrap a:hover {
            background: #334155;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #64748b;
        }
        .empty-state .material-symbols-outlined {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.5;
        }
        .success-toast {
            position: fixed;
            top: 80px;
            right: 24px;
            background: #166534;
            color: #dcfce7;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            z-index: 200;
            animation: fadeInOut 3s ease forwards;
        }
        @keyframes fadeInOut {
            0% { opacity: 0; transform: translateY(-10px); }
            10% { opacity: 1; transform: translateY(0); }
            80% { opacity: 1; }
            100% { opacity: 0; }
        }
        .order-cats { color: #94a3b8; font-size: 13px; }
        .order-budget { color: #94a3b8; font-size: 13px; }
        .order-date { color: #64748b; font-size: 13px; white-space: nowrap; }
        .orders-table-wrap { overflow-x: auto; }
        .view-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 14px;
            background: rgba(37,99,235,0.12);
            color: #60a5fa;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid rgba(37,99,235,0.2);
            white-space: nowrap;
            transition: all 0.2s;
        }
        .view-btn:hover { background: rgba(37,99,235,0.25); border-color: #2563eb; }
        .view-btn .material-symbols-outlined { font-size: 15px; }
        .has-file {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            color: #22c55e;
            margin-top: 4px;
        }
        .has-file .material-symbols-outlined { font-size: 14px; }

        @media (max-width: 768px) {
            .admin-topbar { padding: 12px 16px; flex-wrap: wrap; gap: 8px; }
            .admin-content { padding: 20px 12px; }
            .stats-grid { grid-template-columns: 1fr 1fr; gap: 12px; }
            .stat-card { padding: 16px; }
            .stat-card-value { font-size: 24px; }
            .orders-table th, .orders-table td { padding: 10px 12px; font-size: 13px; }
            .admin-topbar-title { font-size: 15px; }
        }
        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .admin-topbar-right { gap: 8px; }
            .admin-user { display: none; }
        }
    </style>
</head>
<body>
    <div class="admin-topbar">
        <div class="admin-topbar-left">
            <img src="{{ asset('assets/img/ChatGPT Image 26 Feb 2026, 11.24.32.png') }}" alt="Hexavara" />
            <span class="admin-topbar-title">Admin Dashboard</span>
        </div>
        <div class="admin-topbar-right">
            <span class="admin-user">{{ Auth::user()->email }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" class="admin-logout">Logout</button>
            </form>
        </div>
    </div>

    @if(session('success'))
    <div class="success-toast">{{ session('success') }}</div>
    @endif

    <div class="admin-content">
        <h1 class="admin-page-title">Client Orders</h1>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-label">Total Orders</div>
                <div class="stat-card-value blue">{{ $totalOrders }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">Pending</div>
                <div class="stat-card-value yellow">{{ $pendingOrders }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">In Progress</div>
                <div class="stat-card-value indigo">{{ $inProgressOrders }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">Completed</div>
                <div class="stat-card-value green">{{ $completedOrders }}</div>
            </div>
        </div>

        <div class="orders-panel">
            <div class="orders-header">
                <h2>All Orders</h2>
            </div>

            @if($orders->count())
            <div class="orders-table-wrap">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Budget</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                <div class="order-name">{{ $order->name }}</div>
                                <div class="order-email">{{ $order->email }}</div>
                                @if($order->phone)<div class="order-email">{{ $order->phone }}</div>@endif
                                @if($order->company)<div class="order-email">{{ $order->company }}</div>@endif
                                @if($order->file_path)
                                <div class="has-file"><span class="material-symbols-outlined">attach_file</span> Brief attached</div>
                                @endif
                            </td>
                            <td><div class="order-budget">{{ $order->budget ?: '-' }}</div></td>
                            <td>
                                <span class="badge badge-{{ $order->status }}">{{ str_replace('_', ' ', $order->status) }}</span>
                                <form method="POST" action="{{ url('/admin/orders/'.$order->id.'/status/pending') }}" class="status-form" style="margin-top:8px;display:block">
                                    @csrf
                                    @method('PATCH')
                                    <select class="status-select" onchange="this.form.action='{{ url('/admin/orders/'.$order->id.'/status') }}/'+this.value;this.form.submit()">
                                        <option value="" disabled selected>Change...</option>
                                        <option value="pending">Pending</option>
                                        <option value="in_progress">In Progress</option>
                                        <option value="completed">Completed</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </form>
                            </td>
                            <td><div class="order-date">{{ $order->created_at->format('d M Y') }}<br><span style="color:#475569">{{ $order->created_at->format('H:i') }}</span></div></td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order) }}" class="view-btn">
                                    <span class="material-symbols-outlined">open_in_new</span>
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrap">
                {{ $orders->links() }}
            </div>
            @else
            <div class="empty-state">
                <span class="material-symbols-outlined">inbox</span>
                <p>No orders yet. Orders will appear here when clients submit the project form.</p>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
