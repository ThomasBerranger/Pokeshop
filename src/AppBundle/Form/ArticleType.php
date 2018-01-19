<?php


namespace AppBundle\Form;

use AppBundle\Entity\Article;
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
            ->add('number', ChoiceType::class, array(
                "attr" => array(
                    "class" => "form-control"
                ),
                "required" => true,
                'choices'   => array(
                    'Yes' => 1,
                    'No' => 2,
                    'Maybe' => 3
                ),
                'label' => false
            ))
            ->add('name', TextType::class, array(
                "attr" => array(
                    "class" => "form-control"
                )
            ))
            ->add('size', NumberType::class, array(
                "attr" => array(
                    "class" => "form-control"
                )
            ))
            ->add('weight', NumberType::class, array(
                "attr" => array(
                    "class" => "form-control"
                )
            ))
            ->add('description', TextareaType::class, array(
                "attr" => array(
                    "class" => "form-control basic-textarea"
                )
            ))
            ->add('picture', FileType::class, array(
                'label' => false,
                'required'=>false
            ))
            ->add('price', NumberType::class, array(
                "attr" => array(
                    "class" => "form-control"
                )
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