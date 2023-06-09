<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Plat;

class Datafixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
            $categorie1 = new Categorie();
                    
            $categorie1->setlibelle("Pizza");
            $categorie1->setimage("pizza_cat.jpg");
            $categorie1->setactive("true");

            $manager->persist($categorie1);
            


            $categorie2 = new Categorie();   

            $categorie2->setlibelle("Burger");
            $categorie2->setimage("burger_cat.jpg");
            $categorie2->setactive("true");
                
            $manager->persist($categorie2);
            
                

            $categorie3 = new Categorie();

            $categorie3->setlibelle("Wraps");
            $categorie3->setimage("wrap_cat.jpg");
            $categorie3->setactive("true");

            $manager->persist($categorie3);
                



            $categorie4 = new Categorie();
                
            $categorie4->setlibelle("Pasta");
            $categorie4->setimage("pasta_cat.jpg");
            $categorie4->setactive("true");

            $manager->persist($categorie4);
            
                    

            $categorie5 = new Categorie();

            $categorie5->setlibelle("Sandwich");
            $categorie5->setimage("sandwich_cat.jpg");
            $categorie5->setactive("true");
                            
            $manager->persist($categorie5);
            


            $categorie6 = new Categorie();
                
            $categorie6->setlibelle("Asian Food");
            $categorie6->setimage("asian_food_cat.jpg");
            $categorie6->setactive("No");

            $manager->persist($categorie6);
            


            $categorie7 = new Categorie();
                
            $categorie7->setlibelle("Salade");
            $categorie7->setimage("salade_cat.jpg");
            $categorie7->setactive("true");

            $manager->persist($categorie7);
            


            $categorie8 = new Categorie();
                
            $categorie8->setlibelle("Veggie");
            $categorie8->setimage("veggie_cat.jpg");
            $categorie8->setactive("true");

            $manager->persist($categorie8);
            



            $plat1 = new Plat();
                    
            $plat1->setlibelle("District Burger");
            $plat1->setdescription("Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), 
            de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits. .");
            $plat1->setprix("8.0");
            $plat1->setimage("hamburger.jpg");
            $plat1->setactive("true");
            $plat1->setCategorie($categorie2);

            $manager->persist($plat1);
            


            $plat2 = new Plat();
                    
            $plat2->setlibelle("Pizza Bianca");
            $plat2->setdescription("Une pizza fine et croustillante garnie de crème mascarpone légèrement 
            citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.");
            $plat2->setprix("14.0");
            $plat2->setimage("pizza-salmon.png");
            $plat2->setactive("true");
            $plat2->setCategorie($categorie1);

            $manager->persist($plat2);
            


            $plat3 = new Plat();
                    
            $plat3->setlibelle("Buffalo Chicken Wrap");
            $plat3->setdescription("Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.");
            $plat3->setprix("5.0");
            $plat3->setimage("buffalo-chicken.webp");
            $plat3->setactive("true");
            $plat3->setCategorie($categorie3);

            $manager->persist($plat3);
            


            $plat4 = new Plat();
                    
            $plat4->setlibelle("Cheeseburger");
            $plat4->setdescription("Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles,
             oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.");
            $plat4->setprix("8.0");
            $plat4->setimage("cheesburger.jpg");
            $plat4->setactive("true");
            $plat4->setCategorie($categorie2);

            $manager->persist($plat4);
            


            $plat5 = new Plat();
                    
            $plat5->setlibelle("Spaghetti aux légumes");
            $plat5->setDescription("Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide");
            $plat5->setprix("10.5");
            $plat5->setimage("spaghetti-legumes.jpg");
            $plat5->setactive("false");
            $plat5->setCategorie($categorie4);

            $manager->persist($plat5);
            


            $plat6 = new Plat();
                    
            $plat6->setlibelle("Salade César");
            $plat6->setdescription("Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine,
             de croutons à l'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.");
            $plat6->setprix("7.0");
            $plat6->setimage("cesar_salad.jpg");
            $plat6->setactive("true");
            $plat6->setCategorie($categorie7);

            $manager->persist($plat6);
            


            $plat7 = new Plat();
                    
            $plat7->setlibelle("Pizza Margherita");
            $plat7->setdescription("Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison,
             une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...");
            $plat7->setprix("14.0");
            $plat7->setimage("pizza-marguerita.jpg");
            $plat7->setactive(true);
            $plat7->setCategorie($categorie1);

            $manager->persist($plat7);
            

            $plat8 = new Plat();
                    
            $plat8->setlibelle("Courgettes farcies au quinoa et duxelles de champignons");
            $plat8->setdescription("Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!");
            $plat8->setprix("8.0");
            $plat8->setimage("courgettes_farcies.jpg");
            $plat8->setactive("true");
            $plat8->setCategorie($categorie8);

            $manager->persist($plat8);
            

            $plat9 = new Plat();
                    
            $plat9->setlibelle("Lasagnes");
            $plat9->setdescription("Découvrez notre recette des lasagnes, l'une des spécialités italiennes que tout le monde aime avec sa viande hachée
             et gratinée à l'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.");
            $plat9->setprix("12.0");
            $plat9->setimage("lasagnes_viande.jpg");
            $plat9->setactive("true");
            $plat9->setCategorie($categorie4);

            $manager->persist($plat9);
            

            $plat10 = new Plat();
                    
            $plat10->setlibelle("Tagliatelles au saumon");
            $plat10->setdescription("Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal!");
            $plat10->setprix("12.0");
            $plat10->setimage("tagliatelles_saumon.webp");
            $plat10->setactive("true");
            $plat10->setCategorie($categorie4);

            $manager->persist($plat10);
            

            $plat11 = new Plat();
                    
            $plat11->setlibelle("Scampi Piccante");
            $plat11->setdescription("Crevettes, oignons, courgettes, piments, citron, tomates cerises, sauce crémeuse au pesto.");
            $plat11->setprix("10.0");
            $plat11->setimage("scampi_piccante.jpg");
            $plat11->setactive("true");
            $plat11->setCategorie($categorie7);

            $manager->persist($plat11);
            

            $plat12 = new Plat();
                    
            $plat12->setlibelle("Carbonara Salmone");
            $plat12->setdescription("Saumon, oignons, sauce crémeuse, œuf, fromage italien, persil.");
            $plat12->setprix("15.0");
            $plat12->setimage("Pasta_carbonaraSalmone.jpg");
            $plat12->setactive("true");
            $plat12->setCategorie($categorie4);

            $manager->persist($plat12);
            

            $plat13 = new Plat();
                    
            $plat13->setlibelle("Calzone");
            $plat13->setdescription("Pepperoni, jambon italien, thym, romarin, champignons, sauce tomate, mozzarella.");
            $plat13->setprix("10.0");
            $plat13->setimage("Pizza_Calzone.jpg");
            $plat13->setactive("true");
            $plat13->setCategorie($categorie1);

            $manager->persist($plat13);
            


            $plat14 = new Plat();
                    
            $plat14->setlibelle("BBQ Chicken");
            $plat14->setdescription("Poulet, sauce tomate barbecue, tomates marinées à l’huile d’olive, ail, scamorza, oignons rouges.");
            $plat14->setprix("10.0");
            $plat14->setimage("BBQ_chicken.jpg");
            $plat14->setactive("true");
            $plat14->setCategorie($categorie2);

            $manager->persist($plat14);
            


            $plat15 = new Plat();
                    
            $plat15->setlibelle("Veggie BBQ Buffalo");
            $plat15->setdescription("Pavé de soja cuit dans de la sauce BBQ pimentée, faux-mage, sauce BBQ, pickles, oignons frits, salade de chou, ciboulette");
            $plat15->setprix("14.0");
            $plat15->setimage("veggie_burger.png");
            $plat15->setactive("true");
            $plat15->setCategorie($categorie8);

            $manager->persist($plat15);
            


            $plat16 = new Plat();
                    
            $plat16->setlibelle("Croq'fromage");
            $plat16->setdescription("Sandwich composé d'un pain grillé d'emmental français et de cheddar anglais fondant.");
            $plat16->setprix("5.0");
            $plat16->setimage("croq-fromage.jpg");
            $plat16->setactive("true");
            $plat16->setCategorie($categorie5);

            $manager->persist($plat16);
            $manager->flush();
        }
    }