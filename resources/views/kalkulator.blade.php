<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kalkulator sederhana untuk operasi penjumlahan dan pengurangan.">
    <title>Kalkulator | Gudang Fix</title>
    <style>
        :root {
            color-scheme: light;
            --background: #f3f5f4;
            --surface: #ffffff;
            --surface-muted: #f7f8f7;
            --border: #dfe4e1;
            --text: #17201b;
            --muted: #69736d;
            --primary: #18794e;
            --primary-dark: #11663f;
            --accent: #f2b93b;
            --danger: #b42318;
            --shadow: 0 20px 55px rgba(26, 45, 35, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 32px 20px;
            color: var(--text);
            background:
                linear-gradient(135deg, rgba(24, 121, 78, 0.08), transparent 38%),
                var(--background);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .calculator {
            width: min(100%, 520px);
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface);
            box-shadow: var(--shadow);
        }

        .calculator__header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 24px 28px;
            border-bottom: 1px solid var(--border);
        }

        .calculator__mark {
            width: 44px;
            height: 44px;
            flex: 0 0 44px;
            display: grid;
            place-items: center;
            border-radius: 8px;
            color: #ffffff;
            background: var(--primary);
            font-size: 24px;
            font-weight: 700;
        }

        h1 {
            margin: 0;
            font-size: 22px;
            line-height: 1.25;
            letter-spacing: 0;
        }

        .subtitle {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.5;
        }

        form {
            padding: 28px;
        }

        .fields {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        label {
            display: grid;
            gap: 8px;
            color: #3e4943;
            font-size: 14px;
            font-weight: 650;
        }

        input {
            width: 100%;
            height: 48px;
            border: 1px solid #cbd3ce;
            border-radius: 6px;
            padding: 0 14px;
            color: var(--text);
            background: var(--surface);
            font: inherit;
            font-size: 16px;
            outline: none;
            transition: border-color 150ms ease, box-shadow 150ms ease;
        }

        input:hover {
            border-color: #9ca9a1;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(24, 121, 78, 0.14);
        }

        .operation-label {
            margin: 24px 0 10px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .operations {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .operation {
            height: 48px;
            border: 1px solid var(--primary);
            border-radius: 6px;
            color: var(--primary);
            background: #ffffff;
            cursor: pointer;
            font: inherit;
            font-size: 15px;
            font-weight: 700;
            transition: color 150ms ease, background-color 150ms ease, transform 100ms ease;
        }

        .operation:hover,
        .operation:focus-visible {
            color: #ffffff;
            background: var(--primary);
            outline: none;
        }

        .operation:active {
            transform: translateY(1px);
        }

        .operation__symbol {
            margin-right: 6px;
            font-size: 20px;
            line-height: 0;
            vertical-align: -1px;
        }

        .result {
            margin-top: 24px;
            padding: 20px;
            border-left: 4px solid var(--accent);
            border-radius: 4px;
            background: var(--surface-muted);
        }

        .result__top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .result__label {
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .clear {
            border: 0;
            padding: 4px;
            color: var(--danger);
            background: transparent;
            font: inherit;
            font-size: 13px;
            font-weight: 650;
            text-decoration: none;
        }

        .clear:hover,
        .clear:focus-visible {
            text-decoration: underline;
            outline: none;
        }

        output {
            display: block;
            min-height: 46px;
            margin-top: 8px;
            overflow-wrap: anywhere;
            color: var(--text);
            font-size: 34px;
            font-weight: 750;
            line-height: 1.35;
        }

        .result__empty {
            color: #98a19c;
            font-size: 22px;
            font-weight: 500;
        }

        @media (max-width: 520px) {
            body {
                place-items: start center;
                padding: 20px 14px;
            }

            .calculator__header,
            form {
                padding: 20px;
            }

            .fields {
                grid-template-columns: 1fr;
            }

            .operations {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @php
        $angka1 = request('a');
        $angka2 = request('b');
        $proses = request('proses');
        $hasil = '';

        if (is_numeric($angka1) && is_numeric($angka2)) {
            if ($proses === 'tambah') {
                $hasil = $angka1 + $angka2;
            } elseif ($proses === 'kurang') {
                $hasil = $angka1 - $angka2;
            }
        }
    @endphp

    <main class="calculator">
        <header class="calculator__header">
            <div class="calculator__mark" aria-hidden="true">=</div>
            <div>
                <h1>Kalkulator Sederhana</h1>
                <p class="subtitle">Hitung penjumlahan dan pengurangan dengan cepat.</p>
            </div>
        </header>

        <form action="{{ route('kalkulator') }}" method="get">
            <div class="fields">
                <label>
                    Angka pertama
                    <input
                        type="number"
                        step="any"
                        name="a"
                        value="{{ $angka1 }}"
                        placeholder="Contoh: 12"
                        inputmode="decimal"
                        autofocus
                        required
                    >
                </label>

                <label>
                    Angka kedua
                    <input
                        type="number"
                        step="any"
                        name="b"
                        value="{{ $angka2 }}"
                        placeholder="Contoh: 4"
                        inputmode="decimal"
                        required
                    >
                </label>
            </div>

            <p class="operation-label">Pilih operasi</p>
            <div class="operations">
                <button class="operation" type="submit" name="proses" value="tambah">
                    <span class="operation__symbol" aria-hidden="true">+</span>
                    Tambah
                </button>
                <button class="operation" type="submit" name="proses" value="kurang">
                    <span class="operation__symbol" aria-hidden="true">&minus;</span>
                    Kurang
                </button>
            </div>

            <section class="result" aria-live="polite">
                <div class="result__top">
                    <span class="result__label">Hasil perhitungan</span>
                    <a class="clear" href="{{ route('kalkulator') }}">Bersihkan</a>
                </div>
                <output>
                    @if ($hasil !== '')
                        {{ $hasil }}
                    @else
                        <span class="result__empty">Belum ada hasil</span>
                    @endif
                </output>
            </section>
        </form>
    </main>
</body>
</html>
