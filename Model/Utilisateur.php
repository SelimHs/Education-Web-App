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
    private string $tel;
    private string $function;

    public function __construct(?int $id = null, string $surname, string $firstname, string $password, string $passwordC, string $genre, string $email, string $tel, string $function)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->surname = $surname;
        $this->firstname = $firstname;
        $this->passwordC = $passwordC;
        $this->genre = $genre;
        $this->tel = $tel;
        $this->function = $function;
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

    public function getTel(): string
    {
        return $this->tel;
    }

    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    public function getFunction(): string
    {
        return $this->function;
    }

    public function setFunction(string $function): void
    {
        $this->function = $function;
    }
}

?>


