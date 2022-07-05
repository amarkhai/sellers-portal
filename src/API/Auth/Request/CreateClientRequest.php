<?php

declare(strict_types=1);

namespace App\API\Auth\Request;

use Symfony\Component\Validator\Constraints as Assert;

class CreateClientRequest
{
    #[Assert\Email(message: 'Значение {{ value }} должно быть корректным адресом электронной почты',)]
    #[Assert\NotBlank(message: 'Поле email обязательно к заполнению')]
    public string $email;

    #[Assert\Length(
        min: 8,
        minMessage: 'Минимальная длина пароля - 8 символов'
    )]
    #[Assert\NotBlank(message: 'Поле password обязательно к заполнению')]
    public string $password;
}