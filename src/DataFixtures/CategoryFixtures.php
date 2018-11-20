<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = ['Roman', 'SF', 'BD', 'Polar', 'Fantastique', 'Horreur'];

        foreach ($categories as $category) {
            $cat = new Category();
            $cat->setName($category);
            $manager->persist($cat);
            $this->addReference('category-' . strtolower($category), $cat);
        }
        $manager->flush();
    }
}
