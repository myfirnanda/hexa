<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order #{{ $order->id }} — Hexavara Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: "Inter", sans-serif;
            background: #0f172a;
            color: #f1f5f9;
            min-height: 100vh;
        }

        /* ── Topbar ── */
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
        .admin-topbar-left { display: flex; align-items: center; gap: 16px; }
        .admin-topbar-left img { height: 40px; width: auto; }
        .admin-topbar-title { font-size: 18px; font-weight: 600; }
        .admin-topbar-right { display: flex; align-items: center; gap: 16px; }
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

        /* ── Content ── */
        .admin-content {
            max-width: 860px;
            margin: 0 auto;
            padding: 36px 24px;
        }

        /* ── Back Button ── */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 28px;
            padding: 8px 14px;
            border-radius: 8px;
            border: 1px solid #334155;
            transition: all 0.2s;
        }
        .back-btn:hover { background: #1e293b; color: #f1f5f9; border-color: #475569; }
        .back-btn .material-symbols-outlined { font-size: 18px; }

        /* ── Page Header ── */
        .detail-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 32px;
        }
        .detail-header-left h1 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .detail-header-left .order-meta {
            font-size: 13px;
            color: #64748b;
        }

        /* ── Badge ── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-transform: capitalize;
        }
        .badge::before {
            content: '';
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
        }
        .badge-pending     { background: rgba(234,179,8,0.12); color: #eab308; }
        .badge-in_progress { background: rgba(59,130,246,0.12); color: #60a5fa; }
        .badge-completed   { background: rgba(34,197,94,0.12); color: #22c55e; }
        .badge-rejected    { background: rgba(239,68,68,0.12); color: #ef4444; }

        /* ── Section Cards ── */
        .section-card {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 14px;
            padding: 28px;
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .section-title .material-symbols-outlined { font-size: 16px; color: #475569; }

        /* ── Info Grid ── */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .info-item { }
        .info-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .info-value {
            font-size: 15px;
            color: #f1f5f9;
            font-weight: 500;
            word-break: break-word;
        }
        .info-value.dimmed { color: #94a3b8; }

        /* ── Project Description ── */
        .project-desc {
            font-size: 15px;
            color: #cbd5e1;
            line-height: 1.75;
            white-space: pre-wrap;
            word-break: break-word;
        }
        .no-content {
            font-size: 14px;
            color: #475569;
            font-style: italic;
        }

        /* ── Categories ── */
        .cat-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .cat-chip {
            background: rgba(99,102,241,0.12);
            color: #818cf8;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
        }

        /* ── File Brief ── */
        .file-brief-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 16px 20px;
            background: #0f172a;
            border: 1px solid #334155;
            border-radius: 10px;
            flex-wrap: wrap;
        }
        .file-brief-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .file-icon {
            width: 42px;
            height: 42px;
            background: rgba(37,99,235,0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #60a5fa;
        }
        .file-icon .material-symbols-outlined { font-size: 22px; }
        .file-name {
            font-size: 14px;
            font-weight: 500;
            color: #f1f5f9;
            word-break: break-all;
        }
        .file-ext {
            font-size: 12px;
            color: #64748b;
            margin-top: 2px;
        }
        .download-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            padding: 9px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            transition: background 0.2s;
        }
        .download-btn:hover { background: #1d4ed8; }
        .download-btn .material-symbols-outlined { font-size: 16px; }

        /* ── Status Change Form ── */
        .status-update-form {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .status-select {
            background: #0f172a;
            border: 1px solid #334155;
            color: #cbd5e1;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            cursor: pointer;
            outline: none;
            flex: 1;
            min-width: 180px;
        }
        .status-select:focus { border-color: #2563eb; }
        .status-select option { background: #1e293b; }
        .save-status-btn {
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            white-space: nowrap;
        }
        .save-status-btn:hover { background: #1d4ed8; }

        /* ── Toast ── */
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
            0%   { opacity: 0; transform: translateY(-10px); }
            10%  { opacity: 1; transform: translateY(0); }
            80%  { opacity: 1; }
            100% { opacity: 0; }
        }

        @media (max-width: 768px) {
            .admin-topbar { padding: 12px 16px; flex-wrap: wrap; gap: 8px; }
            .admin-content { padding: 20px 14px; }
            .section-card { padding: 20px 16px; }
            .detail-header { margin-bottom: 20px; }
            .detail-header-left h1 { font-size: 20px; }
            .admin-topbar-title { font-size: 15px; }
        }
    </style>
</head>
<body>

    {{-- Topbar --}}
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

        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            <span class="material-symbols-outlined">arrow_back</span>
            Back to Dashboard
        </a>

        {{-- Header --}}
        <div class="detail-header">
            <div class="detail-header-left">
                <h1>Order #{{ $order->id }}</h1>
                <div class="order-meta">Submitted {{ $order->created_at->format('d F Y, H:i') }}</div>
            </div>
            <span class="badge badge-{{ $order->status }}">{{ str_replace('_', ' ', $order->status) }}</span>
        </div>

        {{-- Client Info --}}
        <div class="section-card">
            <div class="section-title">
                <span class="material-symbols-outlined">person</span>
                Client Information
            </div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Full Name</div>
                    <div class="info-value">{{ $order->name }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email</div>
                    <div class="info-value">
                        <a href="mailto:{{ $order->email }}" style="color:#60a5fa;text-decoration:none;">{{ $order->email }}</a>
                    </div>
                </div>
                @if($order->phone)
                <div class="info-item">
                    <div class="info-label">Phone</div>
                    <div class="info-value">{{ $order->phone }}</div>
                </div>
                @endif
                @if($order->company)
                <div class="info-item">
                    <div class="info-label">Company</div>
                    <div class="info-value">{{ $order->company }}</div>
                </div>
                @endif
            </div>
        </div>

        {{-- Project Details --}}
        <div class="section-card">
            <div class="section-title">
                <span class="material-symbols-outlined">assignment</span>
                Project Details
            </div>

            @if($order->categories)
            <div style="margin-bottom:20px;">
                <div class="info-label" style="margin-bottom:8px;">Categories</div>
                <div class="cat-list">
                    @foreach($order->categories as $cat)
                    <span class="cat-chip">{{ $cat }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            @if($order->budget)
            <div style="margin-bottom:20px;">
                <div class="info-label" style="margin-bottom:4px;">Budget</div>
                <div class="info-value">{{ $order->budget }}</div>
            </div>
            @endif

            <div>
                <div class="info-label" style="margin-bottom:8px;">Project Description</div>
                @if($order->project_description)
                <p class="project-desc">{{ $order->project_description }}</p>
                @else
                <p class="no-content">No description provided.</p>
                @endif
            </div>
        </div>

        {{-- Project Brief File --}}
        <div class="section-card">
            <div class="section-title">
                <span class="material-symbols-outlined">attach_file</span>
                Project Brief File
            </div>

            @if($order->file_path)
            @php
                $fileName = basename($order->file_path);
                $ext = strtoupper(pathinfo($fileName, PATHINFO_EXTENSION));
                $fileUrl = asset('storage/' . $order->file_path);
            @endphp
            <div class="file-brief-box">
                <div class="file-brief-info">
                    <div class="file-icon">
                        <span class="material-symbols-outlined">description</span>
                    </div>
                    <div>
                        <div class="file-name">{{ $fileName }}</div>
                        <div class="file-ext">{{ $ext }} file</div>
                    </div>
                </div>
                <a href="{{ $fileUrl }}" download class="download-btn" target="_blank">
                    <span class="material-symbols-outlined">download</span>
                    Download
                </a>
            </div>
            @else
            <p class="no-content">No file was attached to this order.</p>
            @endif
        </div>

        {{-- Change Status --}}
        <div class="section-card">
            <div class="section-title">
                <span class="material-symbols-outlined">tune</span>
                Update Status
            </div>
            <form method="POST" action="{{ url('/admin/orders/'.$order->id.'/status/pending') }}" class="status-update-form" id="status-form">
                @csrf
                @method('PATCH')
                <select name="status" class="status-select" id="status-select">
                    <option value="pending"     {{ $order->status === 'pending'     ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $order->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed"   {{ $order->status === 'completed'   ? 'selected' : '' }}>Completed</option>
                    <option value="rejected"    {{ $order->status === 'rejected'    ? 'selected' : '' }}>Rejected</option>
                </select>
                <button type="submit" class="save-status-btn">Save Status</button>
            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $('#status-form').on('submit', function () {
                var val = $('#status-select').val();
                $(this).attr('action', '{{ url("/admin/orders/".$order->id."/status") }}/' + val);
            });
        });
    </script>

</body>
</html>
