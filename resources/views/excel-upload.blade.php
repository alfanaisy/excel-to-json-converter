<!-- resources/views/excel-upload.blade.php -->

<form action="{{ url('/import-excel') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".xlsx,.xls,.csv">
    <button type="submit">Upload Excel</button>
</form>
