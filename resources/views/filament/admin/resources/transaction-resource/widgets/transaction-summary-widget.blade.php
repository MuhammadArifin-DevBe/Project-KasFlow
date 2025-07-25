<div class="w-full flex justify-start mb-1">
    <div class="bg-stone-600 text-white p-4 rounded shadow w-fit text-left">
        <div><strong>Total Pemasukan:</strong> Rp {{ number_format($pemasukan, 0, ',', '.') }}</div>
        <div><strong>Total Pengeluaran:</strong> Rp {{ number_format($pengeluaran, 0, ',', '.') }}</div>
        <div><strong>Saldo Akhir:</strong> Rp {{ number_format($saldo, 0, ',', '.') }}</div>
    </div>
</div>
