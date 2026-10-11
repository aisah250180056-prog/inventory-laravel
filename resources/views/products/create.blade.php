<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nama Produk</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id">Kategori</label>
            <select id="category_id" name="category_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price">Harga</label>
            <input
                type="number"
                id="price"
                name="price"
                value="{{ old('price') }}"
                min="0"
                step="0.01"
                required
            >
            @error('price')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock">Stok</label>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock', 0) }}"
                min="0"
                required
            >
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Simpan Produk</button>
        <a href="{{ route('products.index') }}">Kembali</a>
    </form>
</body>
</html>
