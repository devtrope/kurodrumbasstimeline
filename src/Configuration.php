<?php

namespace KuroDrumbassTimeline;

class Configuration
{
    private string $locale = 'fr_FR';
    private bool $isAmerican = false;

    public function setLocale(string $locale): self
    {
        if ($locale === 'en_US') {
            $this->setIsAmerican(true);
        }
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

    public function setIsAmerican(bool $isAmerican): self
    {
        $this->isAmerican = $isAmerican;
        return $this;
    }

    public function getIsAmerican(): bool
    {
        return $this->isAmerican;
    }
}
