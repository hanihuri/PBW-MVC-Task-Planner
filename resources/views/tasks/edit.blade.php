<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container py-5">

    <div class="card shadow-sm border-0 main-card edit-card">
        <div class="card-body p-4">

            <h4 class="section-title mb-4">
                Edit Tugas
            </h4>

            <form action="/tasks/update/{{ $task->id }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>

                    <select name="category_id" class="form-select" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $task->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->mata_kuliah }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul Tugas</label>

                    <input type="text"
                           name="judul_tugas"
                           class="form-control"
                           value="{{ $task->judul_tugas }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deadline</label>

                    <input type="date"
                           name="deadline"
                           class="form-control"
                           value="{{ $task->deadline }}"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select" required>
                        <option value="belum" {{ $task->status == 'belum' ? 'selected' : '' }}>
                            Belum
                        </option>
                        <option value="selesai" {{ $task->status == 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-custom text-white w-100">
                    Simpan Perubahan
                </button>

                <a href="/" class="btn btn-secondary w-100 mt-2">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>