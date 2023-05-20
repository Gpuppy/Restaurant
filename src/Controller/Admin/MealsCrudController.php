<?php

namespace App\Controller\Admin;

use App\Entity\Meals;
use App\Form\Type\MealImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

class MealsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Meals::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');

        yield TextField::new('imageFile') /*->setFormType(VichImageType::class)->hideOnIndex();*/ ;

        yield TextField::new('imageSize') /*->hideOnForm() */;
        yield ImageField::new('imageName') /*->setBasePath('/images/meals')->hideOnForm()*/;
        yield DateTimeField::new('createdAt');
        yield MoneyField::new('price')->setCurrency('EUR');
        //yield ImageField::new('imageFile')->setUploadDir('meals');

    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Meals')
            ->setDateFormat('a DateTimeImmutable object)');
    }

}
