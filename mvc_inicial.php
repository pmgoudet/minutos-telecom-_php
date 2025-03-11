<?php

class User
{
  private int $id;
  private string $firstname;
  private string $lastname;
  private string $email;
  private string $password;

  public function __construct(string $firstname, string $lastname, string $email, string $password)
  {
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->email = $email;
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  public function getId(): int
  {
    return $this->id;
  }
  public function getFirstname(): string
  {
    return $this->firstname;
  }
  public function getLastname(): string
  {
    return $this->lastname;
  }
  public function getEmail(): string
  {
    return $this->email;
  }
  public function setPassword(string $password): void
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
}

class Admin extends User
{
  public function __construct(string $firstname, string $lastname, string $email, string $password)
  {
    parent::__construct($firstname, $lastname, $email, $password);
  }
}

class Client extends User
{
  private string $address;
  private string $phone;

  public function __construct(string $firstname, string $lastname, string $email, string $password, string $address, string $phone)
  {
    parent::__construct($firstname, $lastname, $email, $password);
    $this->address = $address;
    $this->phone = $phone;
  }

  public function getAddress(): string
  {
    return $this->address;
  }
  public function getPhone(): string
  {
    return $this->phone;
  }
  public function setAddress(string $address): void
  {
    $this->address = $address;
  }
  public function setPhone(string $phone): void
  {
    $this->phone = $phone;
  }
}

class Auth
{
  public static function login(string $email, string $password): ?User
  {
    // Verifica no banco de dados se o usuário existe e autentica
  }

  public static function logout(): void
  {
    session_destroy();
  }
}

class ClientManager
{
  public function createClient(Client $client): bool
  {
    // Insere um novo cliente no banco de dados
  }

  public function getClients(array $filters = []): array
  {
    // Retorna a lista de clientes com filtros opcionais
  }

  public function getClientById(int $id): ?Client
  {
    // Retorna um cliente específico
  }

  public function updateClient(Client $client): bool
  {
    // Atualiza os dados de um cliente
  }
}
