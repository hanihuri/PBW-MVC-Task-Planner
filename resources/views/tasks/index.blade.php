<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Planner</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="title">Task Planner</h1>
        <p class="text-muted">
            Kelola tugas kuliah dengan lebih teratur
        </p>
    </div>

    <div class="card shadow-sm border-0 main-card mb-4">
        <div class="card-body p-4">

            <h4 class="section-title mb-4">
                Tambah Mata Kuliah
            </h4>

            <form action="/categories" method="POST">
                @csrf

                <div class="d-flex gap-2">
                    <input type="text"
                        name="mata_kuliah"
                        class="form-control"
                        placeholder="Masukkan nama mata kuliah"
                        required>

                    <button type="submit"
                            class="btn btn-custom text-white">
                        Tambah
                    </button>
                </div>
            </form>

        </div>
    </div>

    <div class="card shadow-sm border-0 main-card mb-5">
        <div class="card-body p-4">

            <h4 class="section-title mb-4">
                Tambah Tugas
            </h4>

            <form action="/tasks" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mata Kuliah</label>

                        <select name="category_id" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->mata_kuliah }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Tugas</label>

                        <input type="text"
                               name="judul_tugas"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Deadline</label>

                        <input type="date"
                               name="deadline"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Status</label>

                        <select name="status" class="form-select">
                            <option value="belum">Belum</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                </div>

                <button type="submit"
                        class="btn btn-custom text-white w-100">
                    Tambah Tugas
                </button>

            </form>
        </div>
    </div>

    {{-- BELUM SELESAI --}}
    <div class="card shadow-sm border-0 table-card mb-5">
        <div class="card-body p-4">

            <h4 class="section-title mb-4">
                Tugas Belum Selesai
            </h4>

            <table class="table table-hover align-middle">

                <thead class="table-primary">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Judul Tugas</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($belumTasks as $task)

                        <tr> 
                            <td>{{ $task->category->mata_kuliah ?? '-' }}</td>

                            <td>{{ $task->judul_tugas }}</td>

                            <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</td>

                            <td>
                                <span class="badge bg-warning text-dark">
                                    Belum
                                </span>
                            </td>

                            <td>
                                <div class="action-buttons">

                                    <a href="/tasks/edit/{{ $task->id }}"
                                    class="btn btn-edit text-white">
                                    ✏️
                                    </a>

                                    <a href="/tasks/selesai/{{ $task->id }}"
                                    class="btn btn-done text-white">
                                    ✅
                                    </a>

                                    <a href="/tasks/delete/{{ $task->id }}"
                                    class="btn btn-delete text-red"
                                    onclick="return confirm('Yakin ingin menghapus tugas ini?')">
                                    🗑️
                                    </a>

                                </div>
                            </td>
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

    {{-- SUDAH SELESAI --}}
    <div class="card shadow-sm border-0 table-card">
        <div class="card-body p-4">

            <h4 class="section-title mb-4">
                Tugas Selesai
            </h4>

            <table class="table table-hover align-middle">

                <thead class="table-success">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Judul Tugas</th>
                        <th>Deadline</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($selesaiTasks as $task)

                        <tr>
                            <td>{{ $task->category->mata_kuliah ?? '-' }}</td>

                            <td>{{ $task->judul_tugas }}</td>

                            <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</td>

                            <td>
                                <span class="badge bg-success">
                                    Selesai
                                </span>
                            </td>
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>