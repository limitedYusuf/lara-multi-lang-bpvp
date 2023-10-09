<nav class="navbar navbar-expand-lg navbar-dark">
   <div class="container justify-content-between">
       <a class="navbar-brand" href="#">Latihan Bahasa</a>
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