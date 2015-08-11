<?php
namespace Test\UserLikesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LikeType extends AbstractType
{
    private $class;

    public function __construct($class)
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
        $this->class = $class;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', "text");
        $builder->add('state', "checkbox",array('data' => false));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => $this->class,
                'allow_add' => true,
            ]
        );
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'like';
    }
}