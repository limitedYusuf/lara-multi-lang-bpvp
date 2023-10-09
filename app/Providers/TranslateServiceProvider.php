<?php

namespace App\Providers;

use App\Models\Translate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TranslateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $translations = Translate::all();

        foreach (LaravelLocalization::getSupportedLocales() as $locale => $properties) {
            foreach ($translations as $translation) {
                $key = $translation->key;
                $value = $translation->{'value_' . $locale};
                $langDir = resource_path("lang/$locale");
                $langFile = "$langDir/translations.php";

                if (!is_dir($langDir)) {
                    mkdir($langDir, 0755, true);
                }

                $translationsArray = [$key => $value];
                $existingTranslations = is_file($langFile) ? include $langFile : [];
                $combinedTranslations = array_merge($existingTranslations, $translationsArray);
                file_put_contents($langFile, '<?php return ' . var_export($combinedTranslations, true) . ';');
            }
        }

        // Log::info('TranslateServiceProvider is running');
    }
}
