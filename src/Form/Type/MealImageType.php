<?php

namespace App\Form\Type;

use App\Entity\Meals;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Handler\UploadHandler;
use Vich\UploaderBundle\Mapping\PropertyMappingFactory;
use Vich\UploaderBundle\Storage\StorageInterface;


class MealImageType extends AbstractController
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('imageFile',VichImageType::class,[
            'label' => 'Image',
            'required' => 'false',
            'allow_delete' => 'true',
            'delete_label' => 'Remove Image',
            'download_label' => 'true',
            'download_uri' => 'true',
            'image_uri' => 'true',
            'imagine_pattern' => 'true',
            'property_path' => 'meals',

        ]);

    }

     public function configureOptions(OptionsResolver $resolver) : void
     {
         $resolver->setDefaults([
             'data_class' => Meals::class,
         ]);
     }
    }