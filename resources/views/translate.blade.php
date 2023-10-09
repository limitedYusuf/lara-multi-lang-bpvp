@extends('layouts.app')

@section('slot')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Tabel Terjemahan</h1>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('translate.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Key</th>
                                <th>Value (ID)</th>
                                <th>Value (EN)</th>
                                <th>Value (PL)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($translations as $translation)
                                <tr>
                                    <td>{{ $translation->key }}</td>
                                    <td>
                                        <input type="text" class="form-control" name="value_id[{{ $translation->id }}]"
                                            required value="{{ $translation->value_id }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="value_en[{{ $translation->id }}]"
                                            required value="{{ $translation->value_en }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="value_pl[{{ $translation->id }}]"
                                            required value="{{ $translation->value_pl }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
