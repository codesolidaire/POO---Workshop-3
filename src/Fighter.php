<?php

namespace App;

use App\Shield;
use App\Weapon;

class Fighter
{
    public const MAX_LIFE = 100;

    protected string $name;

    protected int $strength;
    protected int $dexterity;
    private string $image = 'fighter.svg';

    protected int $life = self::MAX_LIFE;

    protected ?Weapon $weapon = null;
    protected ?Shield $shield = null;

    public function __construct(
        string $name,
        int $strength = 10,
        int $dexterity = 5,
        string $image = 'fighter.svg'
    ) {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->image = $image;
    }

    
    public function getDamage(Fighter $defender)
    {
        // Calculez les dommages
        // Dommages = nombre aléatoire compris entre 1 et la force de l'attaquant – défense du défenseur
        $damage = rand(1, $this->strength) - $defender->dexterity;
        // Sans **jamais aller en dessous de zéro**
        $damage = max(0,$damage);
    }

    public function getDefense(): int
    {
        return $this->getDexterity();
    }

     /**
     * Get the value of weapon
     */ 
    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    /**
     * Set the value of weapon
     *
     */ 
    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    /**
     * Get the value of shield
     */ 
    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    /**
     * Set the value of shield
     *
     */ 
    public function setShield(?Shield $shield): void
    {
        $this->shield = $shield;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of image
     */
    public function getImage(): string
    {
        return 'assets/images/' . $this->image;
    }


    public function fight(Fighter $defender): Fighter
    {
        $damage = rand(1, $this->getDamage()) - $defender->getDefense();
        $damage = max(0, $damage);
        $defender->setLife($defender->getLife() - $damage);
    }

    /**
     * Get the value of life
     */
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * Set the value of life
     *
     */
    public function setLife(int $life)
    {
        if ($life < 0) {
            $life = 0;
        }
        $this->life = $life;
    }

    public function isAlive(): bool
    {
        return $this->getLife() > 0;
    }

    /**
     * Get the value of strength
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * Set the value of strength
     *
     */
    public function setStrength($strength): void
    {
        $this->strength = $strength;
    }

    /**
     * Get the value of dexterity
     */
    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    /**
     * Set the value of dexterity
     *
     */
    public function setDexterity($dexterity): void
    {
        $this->dexterity = $dexterity;
    }
}
