<?php

namespace KuroDrumbassTimeline;

class Configuration
{
    private string $locale = 'fr_FR';

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    public function getLocale(): string
    {
        if (strlen($this->locale) > 2) {
            $this->locale = substr($this->locale, 0, 2);
        }
        return $this->locale;
    }
}
