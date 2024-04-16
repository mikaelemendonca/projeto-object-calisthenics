<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Video\Video;
use DateTimeInterface;

class WatchedVideos implements \Countable
{
    private Map $videos;

    public function add(Video $video, \DateTimeImmutable $data): void
    {
        $this->videos->add($video, $data);
    }

    public function count(): int
    {
        return $this->videos->count();
    }

    public function dateOfFiristVideo(): \DateTimeImmutable
    {
        $this->videos->sort(fn (DateTimeInterface $dateA, DateTimeInterface $dateB) => $dateA <=> $dateB);
        return $this->videos->first()->value;
    }
}
