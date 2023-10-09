<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            color: #fff;
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container justify-content-between">
            <a class="navbar-brand" href="#">Nama Situs Anda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100 d-flex justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ trans('translations.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ trans('translations.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ trans('translations.products') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ trans('translations.contact') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if (app()->getLocale() == 'id')
                                🇮🇩 Indonesia
                            @elseif (app()->getLocale() == 'en')
                                🇺🇸 United States
                            @elseif (app()->getLocale() == 'pl')
                                🇵🇱 Poland
                            @else
                                {{ LaravelLocalization::getCurrentLocaleNative() }}
                            @endif
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <select class="form-select" name="language" id="pilihBahasa">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <option value="{{ $localeCode }}"
                                        {{ app()->getLocale() == $localeCode ? 'selected' : '' }}>
                                        @if ($localeCode == 'id')
                                            🇮🇩 Indonesia
                                        @elseif ($localeCode == 'en')
                                            🇺🇸 United States
                                        @elseif ($localeCode == 'pl')
                                            🇵🇱 Poland
                                        @else
                                            {{ $properties['native'] }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
      <div class="row">
          <div class="col-md-12">
              <h1>Edit Tabel Terjemahan</h1>
              @if(session('success'))
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
                          @foreach($translations as $translation)
                              <tr>
                                  <td>{{ $translation->key }}</td>
                                  <td>
                                      <input type="text" class="form-control" name="value_id[{{ $translation->id }}]" required value="{{ $translation->value_id }}">
                                  </td>
                                  <td>
                                      <input type="text" class="form-control" name="value_en[{{ $translation->id }}]" required value="{{ $translation->value_en }}">
                                  </td>
                                  <td>
                                      <input type="text" class="form-control" name="value_pl[{{ $translation->id }}]" required value="{{ $translation->value_pl }}">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pilihBahasa').change(function() {
                var selectedLocale = $(this).val();
                var currentPath = window.location.pathname;
                var filter = ['/id', '/en', '/pl'];

                var pathMatched = false;
                for (var i = 0; i < filter.length; i++) {
                    if (currentPath.includes(filter[i])) {
                        currentPath = currentPath.replace(filter[i], '/' + selectedLocale);
                        pathMatched = true;
                        break;
                    }
                }

                if (!pathMatched) {
                    currentPath = '/' + selectedLocale + currentPath;
                }

                window.location.href = currentPath;
            });

        });
    </script>
</body>

</html>
