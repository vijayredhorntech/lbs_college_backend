<form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="file">Upload Excel file:</label>
        <input type="file" name="file" id="file" required>
    </div>
    <div>
        <button type="submit">Upload</button>
    </div>
</form>
