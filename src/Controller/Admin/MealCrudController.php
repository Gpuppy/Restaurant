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
use Doctrine\Tests\Models\DirectoryTree\File;

class MealCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Meal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextareaField::new('title');
        yield AssociationField::new('product');
        yield TextField::new('imageName')->setFormType(VichImageType::class)->hideOnIndex();
        yield ImageField::new('imageName')->setBasePath('Images')->setUploadDir('public/images')/*->hideOnForm()*/;
        //yield ImageField::new('imageFile')->setBasePath('meals/images')->setUploadDir('public/images');
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

