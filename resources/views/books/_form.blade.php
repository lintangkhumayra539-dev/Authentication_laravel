<div class="mb-3">
    <label for="title" class="form-label">Judul buku</label>
    <input id="title" name="title" value="{{ old('title', $book->title) }}" class="form-control @error('title') is-invalid @enderror" required maxlength="255">
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="author" class="form-label">Penulis</label>
        <input id="author" name="author" value="{{ old('author', $book->author) }}" class="form-control @error('author') is-invalid @enderror" required maxlength="255">
        @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="publisher" class="form-label">Penerbit</label>
        <input id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="form-control @error('publisher') is-invalid @enderror" required maxlength="255">
        @error('publisher') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="published_year" class="form-label">Tahun terbit</label>
        <input id="published_year" name="published_year" type="number" min="1000" max="{{ now()->year }}" value="{{ old('published_year', $book->published_year) }}" class="form-control @error('published_year') is-invalid @enderror" required>
        @error('published_year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input id="stock" name="stock" type="number" min="0" value="{{ old('stock', $book->stock ?? 0) }}" class="form-control @error('stock') is-invalid @enderror" required>
        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
