<?php 

class Utilisateur
{
    private ?int $id;
    private string $email;
    private string $password;
    private string $surname;
    private string $firstname;
    private string $passwordC;
    private string $genre;
    private string $age;
    private string $function;
    private int $status;
    private string $code;
    private ?DateTime $blocked_until; // Nouvel attribut pour gérer la date de blocage

    public function __construct(?int $id = null, string $surname, string $firstname, string $password, string $passwordC, string $genre, string $email, string $age, string $function,  int $status, string $code, ?DateTime $blocked_until = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->surname = $surname;
        $this->firstname = $firstname;
        $this->passwordC = $passwordC;
        $this->genre = $genre;
        $this->age = $age;
        $this->function = $function;
        $this->status = $status;
        $this->code = $code;
        $this->blocked_until = $blocked_until; // Initialisation de l'attribut blocked_until
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getPasswordC(): string
    {
        return $this->passwordC;
    }

    public function setPasswordC(string $passwordC): void
    {
        $this->passwordC = $passwordC;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getFunction(): string
    {
        return $this->function;
    }

    public function setFunction(string $function): void
    {
        $this->function = $function;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getBlockedUntil(): ?DateTime
    {
        return $this->blocked_until;
    }

    public function setBlockedUntil(?DateTime $blocked_until): void
    {
        $this->blocked_until = $blocked_until;
    }
}


?>


