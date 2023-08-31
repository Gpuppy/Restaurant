<?php

namespace App\Controller\Admin;

use App\Entity\Meal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

class MealCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Meal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextareaField::new('title');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
        yield AssociationField::new('product');
        //yield TextField::new('imageSize')->hideOnForm() ;
        yield ImageField::new('imageName')->setBasePath('meal/images')->hideOnForm();
        yield DateTimeField ::new('created_at');
        yield DateTimeField ::new('updated_at');
        yield MoneyField::new('price')->setCurrency('EUR');


    }


    /*public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Meal')
            ->setDateFormat('a DateTimeImmutable object)');
    }*/


}
