<style>
    @font-face {
        font-family: 'Noto Sans CJK';
        font-style: normal;
        font-weight: normal;
        src: url('{{ storage_path('fonts/NotoSansCJKsc-Regular.ttf') }}') format('truetype');
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'DejaVu Sans', 'Noto Sans CJK', sans-serif;
        font-size: 11pt;
        color: #333;
        line-height: 1.6;
        padding: 40px;
    }

    /* Header */
    .header {
        margin-bottom: 30px;
        border-bottom: 1px solid #333;
        padding-bottom: 20px;
    }
    .header-top {
        display: table;
        width: 100%;
    }
    .header-left, .header-right {
        display: table-cell;
        vertical-align: top;
    }
    .header-right {
        text-align: right;
    }
    .company-name {
        font-size: 16pt;
        font-weight: bold;
        margin-bottom: 3px;
    }
    .report-title {
        font-size: 20pt;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .report-period {
        font-size: 14pt;
        color: #666;
    }
    .report-date {
        font-size: 8pt;
        color: #999;
        margin-top: 5px;
    }

    /* Summary */
    .summary {
        margin-bottom: 30px;
    }
    .summary-title {
        font-size: 10pt;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 15px;
        color: #333;
    }
    .summary-grid {
        display: table;
        width: 100%;
        border: 1px solid #ddd;
    }
    .summary-row {
        display: table-row;
    }
    .summary-cell {
        display: table-cell;
        padding: 12px 15px;
        border-right: 1px solid #ddd;
        text-align: center;
        width: 25%;
    }
    .summary-cell:last-child {
        border-right: none;
    }
    .summary-label {
        font-size: 8pt;
        text-transform: uppercase;
        color: #666;
        margin-bottom: 5px;
    }
    .summary-value {
        font-size: 14pt;
        font-weight: bold;
    }
    .summary-note {
        font-size: 7pt;
        color: #999;
        margin-top: 4px;
    }
    .positive { color: #16a34a; }
    .negative { color: #dc2626; }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    th, td {
        padding: 10px 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        font-size: 8pt;
        text-transform: uppercase;
        font-weight: bold;
        color: #666;
        border-bottom: 2px solid #333;
    }
    td {
        font-size: 10pt;
    }
    .text-right { text-align: right; }
    .text-center { text-align: center; }
    tfoot td {
        font-weight: bold;
        border-top: 2px solid #333;
        border-bottom: none;
    }

    /* Footer */
    .footer {
        position: fixed;
        bottom: 30px;
        left: 40px;
        right: 40px;
        text-align: center;
        font-size: 8pt;
        color: #666;
        border-top: 1px solid #ddd;
        padding-top: 10px;
    }
</style>
