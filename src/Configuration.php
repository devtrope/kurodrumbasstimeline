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

    public function locale(): string
    {
        return $this->locale;
    }
}
