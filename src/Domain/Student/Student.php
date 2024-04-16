<?php

namespace Alura\Calisthenics\Domain\Student;

use DateTimeInterface;
use Alura\Calisthenics\Domain\Email\Email;
use Alura\Calisthenics\Domain\Address;
use Alura\Calisthenics\Domain\FullName;
use Alura\Calisthenics\Domain\Video\Video;

class Student
{
    private Email $email;
    private DateTimeInterface $birthDate;
    private WatchedVideos $watchedVideos;
    private FullName $nome;
    private Address $endereco;

    public function __construct(Email $email, DateTimeInterface $birthDate, FullName $nome, Address $endereco)
    {
        $this->watchedVideos = new WatchedVideos();
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->nome = $nome;
        $this->endereco = $endereco;
    }

    public function fullName(): string
    {
        return $this->nome;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function birthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
        $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if ($this->watchedVideos->count() === 0) {
            return true;
        }
        
        $firstDate = $this->watchedVideos->dateOfFiristVideo();
        $today = new \DateTimeImmutable();

        return $firstDate->diff($today)->days < 90;
    }

    public function age(): int
    {
        $today = new \DateTimeImmutable();
        $dateInterval = $this->birthDate->diff($today);

        return $dateInterval->y;
    }
}
