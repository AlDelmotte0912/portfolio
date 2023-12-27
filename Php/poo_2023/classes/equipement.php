<?php
namespace classes;

class equipement
{
    public int $id;
    public string $name;
    public int $min;
    public int $max;
    public int $categorie ;

    private static array $categories = [self::CAT_OFFENSIVE, self::CAT_DEFENSIVE];

    const CAT_OFFENSIVE = 1;
    const CAT_DEFENSIVE = 2;


    /**
     * @param int $id
     * @param string $name
     * @param int $min
     * @param int $max
     */
    public function __construct(int $id, string $name, int $min, int $max , int $categorie = self::CAT_OFFENSIVE)
    {
        $this->id = $id;
        $this->name = $name;
        $this->min = $min;
        $this->max = $max;
        if (!in_array($categorie, self::$categories)) {
            $category = self::CAT_OFFENSIVE;
        }
        $this->categorie = $categorie;

    }





    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getMin(): int
    {
        return $this->min;
    }

    public function setMin(int $min): void
    {
        $this->min = $min;
    }

    public function getMax(): int
    {
        return $this->max;
    }

    public function setMax(int $max): void
    {
        $this->max = $max;
    }

    public function getCategorie(): string
    {
        return $this->categorie;
    }


    public function setCategorie(string $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function getDamage(): int
    {
        return rand($this->min, $this->max);
    }
}

