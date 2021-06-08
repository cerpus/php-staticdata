<?php
namespace Cerpus\StaticData;


class StaticData
{
    public function getGradeLevels(string $language): array
    {
        $locale = $this->normalizeLocale($language);
        $path = realpath(__DIR__."/../data/levels/{$locale}.json");

        return json_decode(file_get_contents($path));
    }

    public function getCountries(string $language): array
    {
        $locale = $this->normalizeLocale($language);
        $path = realpath(__DIR__."/../data/countries/{$locale}.json");

        return json_decode(file_get_contents($path));
    }

    public function getLanguages(string $language): array
    {
        $locale = $this->normalizeLocale($language);
        $path = realpath(__DIR__."/../data/languages/{$locale}.json");

        return json_decode(file_get_contents($path));
    }

    /**
     * Attempts to normalize a language string.
     * @param  string  $language
     *
     * @return string
     */
    protected function normalizeLocale(string $language): string
    {
        $language = strtolower($language);
        $language = str_replace("_", "-", $language);

        switch ($language) {
            case "nb-no":
            case "no-nb":
            case "nn-no":
            case "no-no":
            case "no":
                $locale = "nb-no";
                break;

            case "en-gb":
            case "en-us":
            case "en":
                $locale = "en-gb";
                break;

            default:
                $locale = "en-gb";
                break;
        }

        return $locale;
    }

}
