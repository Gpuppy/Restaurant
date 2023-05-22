<?php

namespace App\Controller\Admin;

use App\Entity\Meals;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
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
        yield TextField::new('title');

        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
        yield TextField::new('imageSize')->hideOnForm() ;
        yield ImageField::new('imageName')->setBasePath('meals/images')->hideOnForm();
        yield DateTimeField::new('createdAt');
        yield MoneyField::new('price')->setCurrency('EUR');


    }


    /*public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Meals')
            ->setDateFormat('a DateTimeImmutable object)');
    }*/


}
