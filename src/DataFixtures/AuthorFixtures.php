<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $authors = [
            ['lastname' => "Rowling",
                'firstname' => "J.K."],
            ['lastname' => "Goscinny",
                'firstname' => "René"],
            ['lastname' => "Flaubert",
                'firstname' => "Gustave"],
            ['lastname' => "Zola",
                'firstname' => "Emile"]
        ];
        foreach ($authors as $author) {
            $aut = new Author();
            $aut->setLastname($author['lastname']);
            $aut->setFirstname($author['firstname']);
            $manager->persist($aut);
            $this->addReference('author-' . strtolower($author['lastname']), $aut);
        }
        $manager->flush();
    }
}
