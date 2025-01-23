<?php

declare(strict_types=1);

namespace App\Mercure;

use Symfony\Component\Mercure\Jwt\TokenProviderInterface;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;

final class MyTokenProvider implements TokenProviderInterface
{
    private $secret;

    public function __construct(string $mercureJwtSecret)
    {
        $this->secret = $mercureJwtSecret;
    }

    public function getJwt(): string
    {
        $config = Configuration::forSymmetricSigner(new Sha256(), InMemory::plainText($this->secret));

        $now = new \DateTimeImmutable();

        $token = $config->builder()
            ->issuedBy('ticketing-system') // Configures the issuer (iss claim)
            ->issuedAt($now) // Configures the time that the token was issued (iat claim)
            ->withClaim('mercure', ['publish' => ['*'], 'subscribe' => ['*']]) // Configures a new claim, called "mercure"
            ->getToken($config->signer(), $config->signingKey());

        return $token->toString();
    }
}
