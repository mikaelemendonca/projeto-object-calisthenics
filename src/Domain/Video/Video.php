<?php

namespace Alura\Calisthenics\Domain\Video;

class Video
{
    private const PUBLIC = 1;
    private const PRIVATE = 0;

    private bool $visible = false;
    private int $ageLimit;

    public function isPublic(): bool
    {
        return $this->visible;
    }

    public function getVisibility(): int
    {
        return $this->visible;
    }

    public function publish(): void
    {
        $this->visible = true;
    }

    public function checkIfVisibilityIsValidAndUpdateIt(int $visibility): void
    {
        if (!in_array($visibility, [self::PUBLIC, self::PRIVATE])) {
            throw new \InvalidArgumentException('Invalid visibility');
        }

        $this->visible = $visibility;
    }

    public function getAgeLimit(): int
    {
        return $this->ageLimit;
    }

    public function setAgeLimit(int $ageLimit): void
    {
        $this->ageLimit = $ageLimit;
    }
}
