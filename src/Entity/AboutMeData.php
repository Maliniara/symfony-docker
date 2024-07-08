<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AboutMeDataRepository;

#[ORM\Entity(repositoryClass: AboutMeDataRepository::class)]
class AboutMeData
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column(type: 'integer')]
private ?int $id = null;

#[ORM\Column(type: 'string', length: 255)]
private ?string $keyName = null;

#[ORM\Column(type: 'text')]
private ?string $value = null;

public function getId(): ?int
{
return $this->id;
}

public function getKeyName(): ?string
{
return $this->keyName;
}

public function setKeyName(string $keyName): self
{
$this->keyName = $keyName;

return $this;
}

public function getValue(): ?string
{
return $this->value;
}

public function setValue(string $value): self
{
$this->value = $value;

return $this;
}
}
