<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Fasilitas Kampus</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f0f0;
            padding: 30px;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            color: #800020;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        /* Grid 4 kolom */
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        /* Card */
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 6px solid #800020;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(128,0,32,0.2);
        }

        .card-title {
            color: #888;
            font-size: 13px;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .card-number {
            font-size: 36px;
            font-weight: bold;
            color: #800020;
            margin-bottom: 5px;
        }

        .card-sub {
            color: #999;
            font-size: 11px;
        }

        /* Ringkasan */
        .summary {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .summary h3 {
            color: #800020;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .progress-item {
            margin-bottom: 15px;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .progress-bar {
            background: #e0d6d6;
            height: 8px;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 8px;
            border-radius: 10px;
            background: #800020;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999;
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 800px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
            body {
                padding: 15px;
            }
        }

        @media (max-width: 500px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Dashboard Admin</h1>
            <p>Ringkasan laporan kerusakan fasilitas kampus</p>
        </div>

        <!-- 4 Card -->
        <div class="grid">
            <div class="card">
                <div class="card-title">TOTAL LAPORAN</div>
                <div class="card-number">124</div>
                <div class="card-sub">Semua laporan masuk</div>
            </div>
            <div class="card">
                <div class="card-title">PENDING</div>
                <div class="card-number">12</div>
                <div class="card-sub">Menunggu verifikasi</div>
            </div>
            <div class="card">
                <div class="card-title">DIPROSES</div>
                <div class="card-number">8</div>
                <div class="card-sub">Sedang dikerjakan</div>
            </div>
            <div class="card">
                <div class="card-title">SELESAI</div>
                <div class="card-number">104</div>
                <div class="card-sub">Telah selesai</div>
            </div>
        </div>

        <!-- Ringkasan -->
        <div class="summary">
            <h3>Ringkasan Status</h3>
            <div class="progress-item">
                <div class="progress-label">
                    <span>Selesai</span>
                    <span>84% (104)</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 84%"></div>
                </div>
            </div>
            <div class="progress-item">
                <div class="progress-label">
                    <span>Pending + Diproses</span>
                    <span>16% (20)</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 16%"></div>
                </div>
            </div>
        </div>

        <div class="footer">
            Sistem Informasi Fasilitas Kampus
        </div>
    </div>
</body>
</html>  