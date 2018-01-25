<?php


namespace AppBundle\Form;

use AppBundle\Entity\Article;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pokemon', EntityType::class, array(
                'class' => 'AppBundle\Entity\Pokemon',
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false,
                "attr" => array(
                    "class" => "form-control",
                ),
                "label" => false
            ))
            ->add('size', NumberType::class, array(
                "attr" => array(
                    "class" => "form-control"
                ),
                "label" => "Size in Meters"
            ))
            ->add('weight', NumberType::class, array(
                "attr" => array(
                    "class" => "form-control"
                ),
                "label" => "Weight in Kg"
            ))
            ->add('description', TextareaType::class, array(
                "attr" => array(
                    "class" => "form-control basic-textarea"
                ),
                'required' => false,
                "label" => "Speak about your pokemon"
            ))
            ->add('picture', FileType::class, array(
                'label' => false,
                'required'=>false
            ))
            ->add('price', NumberType::class, array(
                "attr" => array(
                    "class" => "form-control"
                ),
                "label" => "Price in $"
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Article::class,
        ));
    }
}